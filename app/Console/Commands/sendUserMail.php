<?php

namespace App\Console\Commands;

use App\Models\SendEmailDetail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class sendUserMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-user-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public const SEND_BATCH_LIMIT = 5;

    public function handle()
    {
        $this->deliverQueuedEmails();
    }
    /**
     * @return array{sent: int, failed: int}
     */
    private function deliverQueuedEmails(): array
    {
        
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
                Mail::send('admin.mails.enquiry', $mailData, function ($message) use ($detail) {
                    $message->to($detail->email);
                    $message->subject('Welcome to MLM Software');
                });

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

}
