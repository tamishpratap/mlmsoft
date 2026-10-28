<?php

namespace App\Http\Controllers;

use App\Models\SendEmailDetail;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class TempController extends Controller
{
    public const QUEUE_BATCH_LIMIT = 1000;

    public const COMPANY_BATCH_LIMIT = 20;

    public const SEND_BATCH_LIMIT = 50;

    public function setEmailDetail()
    {
        $insertedCount = $this->queueEmailDetails();

        session()->flash(
            'succMsg',
            $insertedCount > 0
                ? "{$insertedCount} users have been added to the mail queue."
                : 'No eligible users were available to add to the mail queue.'
        );

        return redirect()->route('admin.settings');
    }

    public function sendUserMail()
    {
        $result = $this->deliverQueuedEmails();

        $this->flashDeliveryResult($result);

        return redirect()->route('admin.settings');
    }

    public function runMailProcess()
    {
        $queuedUsers = SendEmailDetail::whereNotNull('email')
            ->where('email', '!=', '')
            ->count();

        $insertedCount = $queuedUsers === 0 ? $this->queueEmailDetails() : 0;
        $result = $this->deliverQueuedEmails();

        if ($insertedCount > 0) {
            session()->flash('succMsg', "{$insertedCount} users were queued. {$result['sent']} emails were sent successfully.");
        } else {
            $this->flashDeliveryResult($result);
        }

        if ($result['failed'] > 0) {
            session()->flash('errMsg', "{$result['failed']} emails could not be sent and remain in the queue for retry.");
        }

        return redirect()->route('admin.settings');
    }

    public function queueEmailDetails(): int
    {
        $insertedCount = 0;

        $companies = User::where('email_status', 0)
            ->whereNotNull('company_name')
            ->where('company_name', '!=', '')
            ->groupBy('company_name')
            ->pluck('company_name');

        foreach ($companies as $companyName) {
            if ($insertedCount >= self::QUEUE_BATCH_LIMIT) {
                break;
            }

            $remainingLimit = self::QUEUE_BATCH_LIMIT - $insertedCount;

            $members = User::where('email_status', 0)
                ->where('company_name', $companyName)
                ->limit(min(self::COMPANY_BATCH_LIMIT, $remainingLimit))
                ->get();

            foreach ($members as $value) {
                $insert = new SendEmailDetail();
                $insert->name = $value->name;
                $insert->memberid = $value->memberid;
                $insert->mobile = $value->mobile;
                $insert->email = $value->email;
                $insert->company_name = $value->company_name;
                $insert->save();

                User::where('id', $value->id)->update([
                    'email_status' => 1,
                ]);

                $insertedCount++;
            }
        }

        return $insertedCount;
    
    }

    /**
     * @return array{sent: int, failed: int}
     */
    private function deliverQueuedEmails(): array
    {
        ini_set('max_execution_time', 1200);
        $emailDetails = SendEmailDetail::whereNotNull('email')
            ->where('email', '!=', '')
            ->limit(self::SEND_BATCH_LIMIT)
            ->get();

        $sentCount = 0;
        $failedCount = 0;

        foreach ($emailDetails as $detail) {
            $mailData = [
                'email' => $detail->email,
                'name' => $detail->name,
                'mobile' => $detail->mobile,
            ];

            try {
                // Mail::send('admin.mails.enquiry', $mailData, function ($message) use ($detail) {
                //     $message->to($detail->email);
                //     $message->subject('Welcome to MLM Software');
                // });

                $detail->delete();
                $sentCount++;
            } catch (Throwable $exception) {
                $failedCount++;

                Log::error('Queued user email could not be sent.', [
                    'send_email_detail_id' => $detail->id,
                    'email' => $detail->email,
                    'exception' => $exception->getMessage(),
                ]);
            }
        }

        return [
            'sent' => $sentCount,
            'failed' => $failedCount,
        ];
    }

    /**
     * @param array{sent: int, failed: int} $result
     */
    private function flashDeliveryResult(array $result): void
    {
        session()->flash(
            'succMsg',
            $result['sent'] > 0
                ? "{$result['sent']} emails were sent successfully."
                : 'No pending emails were available to send.'
        );

        if ($result['failed'] > 0) {
            session()->flash('errMsg', "{$result['failed']} emails could not be sent and remain in the queue for retry.");
        }
    }
}
