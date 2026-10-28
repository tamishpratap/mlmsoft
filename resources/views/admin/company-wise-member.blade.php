@extends('admin.layouts.main')
@section('title', 'Company Wise Members')
@section('content')

    @push('head')
        <style>
            .company-member-toolbar,
            .company-member-card {
                border: 1px solid #e5eaf1;
                border-radius: 10px;
                box-shadow: 0 10px 26px rgba(15, 23, 42, 0.05);
            }

            .company-member-toolbar {
                padding: 18px;
                background: #fbfcfe;
            }

            .company-member-kicker {
                margin-bottom: 5px;
                color: #2563eb;
                font-size: 0.72rem;
                font-weight: 800;
                letter-spacing: 0.12em;
                text-transform: uppercase;
            }

            .company-member-summary {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }

            .company-member-pill {
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

            .company-member-card .card-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 16px;
                border-bottom: 1px solid #edf1f5;
                background: #fbfcfe;
            }

            .company-member-table {
                margin-bottom: 0;
            }

            .company-member-table th {
                border-top: 0;
                color: #64748b;
                font-size: 0.72rem;
                letter-spacing: 0.06em;
                text-transform: uppercase;
                white-space: nowrap;
            }

            .company-member-table td {
                color: #3b485a;
                font-size: 0.86rem;
                vertical-align: middle;
            }

            .company-member-table tbody tr:hover {
                background: #f8fbff;
            }

            .company-member-id {
                color: #1d4ed8;
                font-weight: 800;
            }

            .company-member-status {
                display: inline-flex;
                align-items: center;
                padding: 4px 8px;
                border-radius: 999px;
                font-size: 0.74rem;
                font-weight: 800;
            }

            .company-member-status--success {
                color: #19704a;
                background: #e9f8f0;
            }

            .company-member-status--warning {
                color: #9b6610;
                background: #fff4dc;
            }

            .company-member-status--danger {
                color: #b42318;
                background: #fff0ed;
            }

            .company-member-status--muted {
                color: #64748b;
                background: #eef2f6;
            }

            .company-member-empty {
                padding: 54px 20px;
                color: #64748b;
                text-align: center;
            }

            .company-member-empty i {
                display: block;
                margin-bottom: 12px;
                color: #94a3b8;
                font-size: 32px;
            }

            @media (max-width: 767.98px) {
                .company-member-card .card-header {
                    align-items: flex-start;
                    flex-direction: column;
                }
            }
        </style>
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Company Wise Members') }}</h5>
                            <span>{{ __('Browse members by company with focused registration details.') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Company Wise Members') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="company-member-toolbar mb-4">
            <form method="GET" action="{{ route('admin.company-wise-member') }}">
                <div class="row align-items-end">
                    <div class="col-lg-5 col-md-6 mb-3 mb-lg-0">
                        <label for="company" class="font-weight-bold">{{ __('Company') }}</label>
                        <select name="company" id="company" class="form-control" onchange="this.form.search.value = ''; this.form.submit();">
                            @forelse ($companies as $company)
                                <option value="{{ $company->company_name }}" @selected($selectedCompany === $company->company_name)>
                                    {{ $company->company_name }} ({{ number_format($company->member_count) }})
                                </option>
                            @empty
                                <option value="">{{ __('No companies available') }}</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-5 col-md-6 mb-3 mb-lg-0">
                        <label for="search" class="font-weight-bold">{{ __('Search Member') }}</label>
                        <input
                            type="search"
                            name="search"
                            id="search"
                            class="form-control"
                            value="{{ $search }}"
                            placeholder="{{ __('Search by member ID or name') }}"
                        >
                    </div>
                    <div class="col-lg-2">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary mr-2">
                                <i class="ik ik-search"></i> {{ __('Search') }}
                            </button>
                            <a href="{{ route('admin.company-wise-member') }}" class="btn btn-secondary">
                                {{ __('Reset') }}
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="card company-member-card">
            <div class="card-header">
                <div>
                    <div class="company-member-kicker">{{ __('Selected Company') }}</div>
                    <h3 class="mb-1">{{ $selectedCompany ?: __('No company selected') }}</h3>
                    <p class="mb-0 text-muted">{{ __('Only members registered under this company are listed below.') }}</p>
                </div>
                <div class="company-member-summary">
                    <span class="company-member-pill">
                        <i class="ik ik-users"></i>
                        {{ __('Members: :count', ['count' => number_format($members->count())]) }}
                    </span>
                    <span class="company-member-pill">
                        <i class="ik ik-git-branch"></i>
                        {{ __('Total downline: :count', ['count' => number_format(optional($selectedCompanySummary)->downline_count ?? 0)]) }}
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table company-member-table">
                    <thead>
                        <tr>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Member ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Downline') }}</th>
                            <th>{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $member)
                            @php
                                $emailStatus = (int) $member->email_status;
                                $statusClass = $emailStatus === 1 ? 'company-member-status--success' : 'company-member-status--danger';
                                $statusText = $emailStatus === 1 ? __('Sent') : __('Not Send');
                            @endphp
                            <tr>
                                <td>{{ $member->created_at?->format('d M Y') ?? '--' }}</td>
                                <td><span class="company-member-id">{{ $member->memberid }}</span></td>
                                <td>{{ $member->name ?: '--' }}</td>
                                <td>{{ number_format((int) $member->downline) }}</td>
                                <td>
                                    <span class="company-member-status {{ $statusClass }}">
                                        {{ $statusText }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="company-member-empty">
                                        <i class="ik ik-user-x"></i>
                                        <strong>{{ __('No members found for this company.') }}</strong>
                                        @if ($search !== '')
                                            <div class="mt-1">{{ __('Try a different member ID or name.') }}</div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
