@extends('admin.layouts.main')
@section('title', 'Email Marketing')
@section('content')

    @push('head')
        <style>
            .mail-overview-card,
            .mail-company-card {
                border: 1px solid #e5eaf1;
                border-radius: 10px;
                box-shadow: 0 10px 26px rgba(15, 23, 42, 0.05);
            }

            .mail-overview-card .card-header,
            .mail-company-card .card-header {
                border-bottom: 1px solid #edf1f5;
                background: #fbfcfe;
            }

            .mail-section-kicker {
                margin-bottom: 5px;
                color: #2563eb;
                font-size: 0.72rem;
                font-weight: 800;
                letter-spacing: 0.12em;
                text-transform: uppercase;
            }

            .mail-section-description {
                max-width: 68ch;
                margin-bottom: 0;
                color: #64748b;
                font-size: 0.88rem;
            }

            .mail-primary-stats {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                border: 1px solid #e8eef5;
                border-radius: 8px;
                background: #f8fbff;
            }

            .mail-primary-stat {
                padding: 18px;
            }

            .mail-primary-stat+.mail-primary-stat {
                border-left: 1px solid #e8eef5;
            }

            .mail-stat-label {
                display: block;
                margin-bottom: 8px;
                color: #64748b;
                font-size: 0.76rem;
                font-weight: 800;
                letter-spacing: 0.06em;
                text-transform: uppercase;
            }

            .mail-stat-value {
                display: block;
                color: #172033;
                font-size: 1.85rem;
                font-weight: 800;
                line-height: 1;
            }

            .mail-stat-hint {
                display: block;
                margin-top: 9px;
                color: #8491a3;
                font-size: 0.77rem;
            }

            .mail-detail-list {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1px;
                margin: 18px 0 0;
                overflow: hidden;
                border: 1px solid #edf1f5;
                border-radius: 8px;
                background: #edf1f5;
            }

            .mail-detail-item {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 18px;
                margin: 0;
                padding: 13px 15px;
                background: #fcfdff;
            }

            .mail-detail-item dt,
            .mail-detail-item dd {
                margin: 0;
            }

            .mail-detail-item dt {
                color: #526175;
                font-size: 0.83rem;
                font-weight: 700;
            }

            .mail-detail-item dd {
                color: #172033;
                font-size: 0.95rem;
                font-weight: 800;
                text-align: right;
            }

            .mail-untracked {
                color: #9a6a12;
                font-size: 0.76rem;
                font-weight: 800;
                letter-spacing: 0.04em;
                text-transform: uppercase;
            }

            .mail-rule-strip {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
                margin-top: 18px;
            }

            .mail-rule-pill {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 9px;
                border: 1px solid #dce6f2;
                border-radius: 999px;
                color: #526175;
                background: #f8fbff;
                font-size: 0.76rem;
                font-weight: 700;
            }

            .mail-company-scroll {
                max-height: 348px;
                overflow-y: auto;
            }

            .mail-company-table {
                margin-bottom: 0;
            }

            .mail-company-table th {
                border-top: 0;
                color: #64748b;
                font-size: 0.72rem;
                letter-spacing: 0.06em;
                text-transform: uppercase;
            }

            .mail-company-table td {
                color: #3b485a;
                font-size: 0.84rem;
                vertical-align: middle;
            }

            .mail-count-badge {
                min-width: 34px;
                padding: 4px 7px;
                border-radius: 999px;
                color: #1d4ed8;
                background: #eaf2ff;
                font-size: 0.76rem;
                font-weight: 800;
                text-align: center;
            }

            @media (max-width: 767.98px) {

                .mail-primary-stats,
                .mail-detail-list {
                    grid-template-columns: 1fr;
                }

                .mail-primary-stat+.mail-primary-stat {
                    border-top: 1px solid #e8eef5;
                    border-left: 0;
                }
            }
        </style>
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-mail bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Email Marketing') }}</h5>
                            <span>{{ __('Manage your email marketing') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Email Marketing') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (session()->has('successMsg') || session()->has('succMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('successMsg') ?? session('succMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('errorMsg') || session()->has('errMsg'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('errorMsg') ?? session('errMsg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Mail Queue Overview -->
        <div class="row">
            <div class="col-xl-8 mb-4">
                <div class="card mail-overview-card h-100">
                    <div class="card-header">
                        <div>
                            <div class="mail-section-kicker">{{ __('Email Operations') }}</div>
                            <h3 class="mb-1">{{ __('Mail Queue Overview') }}</h3>
                            <p class="mail-section-description">
                                {{ __('Live counts from the user selection state and the active email queue.') }}
                            </p>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('setEmailDetail') }}">
                                    <button type="button" class="btn btn-primary btn-lg btn-block"
                                        >
                                        <i class="ik ik-send"></i> {{ __('Create Queue Users') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mail-primary-stats">
                            <div class="mail-primary-stat">
                                <span class="mail-stat-label">{{ __('Selected Users') }}</span>
                                <span class="mail-stat-value">{{ number_format($mailStats['selected_users']) }}</span>
                                <span class="mail-stat-hint">{{ __('users.email_status = 1') }}</span>
                            </div>
                            <div class="mail-primary-stat">
                                <span class="mail-stat-label">{{ __('Pending Mail Users') }}</span>
                                <span class="mail-stat-value">{{ number_format($mailStats['pending_users']) }}</span>
                                <span class="mail-stat-hint">{{ __('Queued users with an email address') }}</span>
                            </div>
                            <div class="mail-primary-stat">
                                <span class="mail-stat-label">{{ __('Total Queue Users') }}</span>
                                <span class="mail-stat-value">{{ number_format($mailStats['total_queue_users']) }}</span>
                                <span class="mail-stat-hint">{{ __('All active queue records') }}</span>
                            </div>
                        </div>

                        <dl class="mail-detail-list">
                            <div class="mail-detail-item">
                                <dt>{{ __('Mail Sent Users') }}</dt>
                                <dd>
                                    @if (is_null($mailStats['sent_users']))
                                        <span class="mail-untracked">{{ __('Not tracked') }}</span>
                                    @else
                                        {{ number_format($mailStats['sent_users']) }}
                                    @endif
                                </dd>
                            </div>
                            <div class="mail-detail-item">
                                <dt>{{ __('Today Sent Mail') }}</dt>
                                <dd>
                                    @if (is_null($mailStats['today_sent']))
                                        <span class="mail-untracked">{{ __('Not tracked') }}</span>
                                    @else
                                        {{ number_format($mailStats['today_sent']) }}
                                    @endif
                                </dd>
                            </div>
                            <div class="mail-detail-item">
                                <dt>{{ __('Remaining Mail') }}</dt>
                                <dd>{{ number_format($mailStats['remaining_mail_users']) }}</dd>
                            </div>
                            <div class="mail-detail-item">
                                <dt>{{ __('Failed Mail') }}</dt>
                                <dd>
                                    @if (is_null($mailStats['failed_users']))
                                        <span class="mail-untracked">{{ __('Not tracked') }}</span>
                                    @else
                                        {{ number_format($mailStats['failed_users']) }}
                                    @endif
                                </dd>
                            </div>
                        </dl>

                        @if ($mailStats['invalid_email_users'] > 0)
                            <div class="alert alert-warning mt-3 mb-0" role="alert">
                                {{ trans_choice(
                                    ':count queue record has no email address and cannot be sent.|:count queue records have no email address and cannot be sent.',
                                    $mailStats['invalid_email_users'],
                                    ['count' => number_format($mailStats['invalid_email_users'])],
                                ) }}
                            </div>
                        @endif

                        <div class="mail-rule-strip" aria-label="{{ __('Email batch rules') }}">
                            <span class="mail-rule-pill">
                                <i class="ik ik-inbox"></i>
                                {{ __('Queue load: :count', ['count' => number_format($mailStats['queue_batch_limit'])]) }}
                            </span>
                            <span class="mail-rule-pill">
                                <i class="ik ik-briefcase"></i>
                                {{ __('Per company: :count', ['count' => number_format($mailStats['company_batch_limit'])]) }}
                            </span>
                            <span class="mail-rule-pill">
                                <i class="ik ik-send"></i>
                                {{ __('Per send run: :count', ['count' => number_format($mailStats['send_batch_limit'])]) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mb-4">
                <div class="card mail-company-card h-100">
                    <div class="card-header">
                        <div>
                            <div class="mail-section-kicker">{{ __('Queue Distribution') }}</div>
                            <h3 class="mb-1">{{ __('Company-wise Email Count') }}</h3>
                            <p class="mail-section-description">{{ __('Sendable pending users grouped by company.') }}</p>
                        </div>
                    </div>
                    <div class="mail-company-scroll">
                        <table class="table mail-company-table">
                            <thead>
                                <tr>
                                    <th>{{ __('Company') }}</th>
                                    <th class="text-right">{{ __('Pending') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companyMailCounts as $companyMailCount)
                                    <tr>
                                        <td>{{ $companyMailCount->company_name }}</td>
                                        <td class="text-right">
                                            <span
                                                class="mail-count-badge">{{ number_format($companyMailCount->pending_count) }}</span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="py-4 text-center text-muted">
                                            {{ __('No sendable users are currently queued.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Cards -->
        {{-- <div class="row">
            <!-- Mail Configuration Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="ik ik-mail" style="font-size: 2.5rem; color: #2563eb;"></i>
                        </div>
                        <h5 class="card-title">{{ __('Mail Configuration') }}</h5>
                        <p class="card-text text-muted">{{ __('Configure email settings') }}</p>
                    </div>
                </div>
            </div>

            <!-- Send Test Mail Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="ik ik-send" style="font-size: 2.5rem; color: #14a7a2;"></i>
                        </div>
                        <h5 class="card-title">{{ __('Send Test Mail') }}</h5>
                        <p class="card-text text-muted">{{ __('Send a test email') }}</p>
                    </div>
                </div>
            </div>

            <!-- System Settings Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="ik ik-tool" style="font-size: 2.5rem; color: #ef6f5e;"></i>
                        </div>
                        <h5 class="card-title">{{ __('System Settings') }}</h5>
                        <p class="card-text text-muted">{{ __('Update system preferences') }}</p>
                    </div>
                </div>
            </div>

            <!-- Security Settings Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <i class="ik ik-lock" style="font-size: 2.5rem; color: #7c3aed;"></i>
                        </div>
                        <h5 class="card-title">{{ __('Security Settings') }}</h5>
                        <p class="card-text text-muted">{{ __('Manage security options') }}</p>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Action Buttons -->
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ __('Email Actions') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal"
                                    data-target="#sendMailModal">
                                    <i class="ik ik-send"></i> {{ __('Send Mail') }}
                                </button>
                            </div> --}}
                            <div class="col-md-12">
                                <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal"
                                    data-target="#resetMailModal">
                                    <i class="ik ik-refresh-cw"></i> {{ __('Reset Mail') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Mail Modal -->
    <div class="modal fade" id="sendMailModal" tabindex="-1" role="dialog" aria-labelledby="sendMailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sendMailModalLabel">{{ __('Send Mail') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="sendMailForm" action="{{ route('admin.mail.send') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-info" role="alert">
                            <strong>{{ __('Batch send') }}</strong>
                            {{ __('This will send up to :count pending emails.', ['count' => number_format($mailStats['send_batch_limit'])]) }}
                        </div>
                        <p class="mb-0">
                            {{ __('If the active queue is empty, up to :count eligible users will be added first. Continue?', ['count' => number_format($mailStats['queue_batch_limit'])]) }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="ik ik-send"></i> {{ __('Send Pending Mail') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Reset Mail Modal -->
    <div class="modal fade" id="resetMailModal" tabindex="-1" role="dialog" aria-labelledby="resetMailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resetMailModalLabel">{{ __('Reset Mail Settings') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="resetMailForm" action="{{ route('admin.mail.reset-status') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert">
                            <strong>{{ __('Warning!') }}</strong>
                            {{ __('This action will reset selected user email statuses.') }}
                        </div>
                        <p class="mb-0">
                            {{ __('Are you sure you want to make the selected users eligible for queue selection again?') }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit" class="btn btn-warning">{{ __('Reset') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('adm_assets/assets/plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    @endpush

@endsection
