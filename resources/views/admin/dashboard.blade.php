@extends('admin.layouts.main')
@section('title', 'MLM Dashboard')
@section('content')

    @push('head')
        <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adm_assets/assets/plugins/chartist/dist/chartist.min.css') }}">

        <style>
            .dashboard-stat-card {
                --plan-accent: #2563eb;
                --plan-accent-deep: #1d4ed8;
                --plan-accent-soft: #eef5ff;
                --plan-border: #d8e7ff;
                --plan-badge-bg: #eaf2ff;
                position: relative;
                min-height: 178px;
                overflow: hidden;
                border: 1px solid var(--plan-border);
                border-radius: 8px;
                background: linear-gradient(145deg, #fbfdff 0%, var(--plan-accent-soft) 100%);
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
                transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
                animation: dashboardCardIn 0.35s ease both;
            }

            .dashboard-stat-card::before {
                content: "";
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--plan-accent) 0%, var(--plan-accent-deep) 100%);
            }

            .dashboard-stat-card--unilevel {
                --plan-accent: #ef6f5e;
                --plan-accent-deep: #c94b3f;
                --plan-accent-soft: #fff1ed;
                --plan-border: #ffd7cd;
                --plan-badge-bg: #fff4f0;
            }

            .dashboard-stat-card--single-leg {
                --plan-accent: #14a7a2;
                --plan-accent-deep: #087b78;
                --plan-accent-soft: #eefcfb;
                --plan-border: #c7f0ec;
                --plan-badge-bg: #e9faf8;
            }

            .dashboard-stat-card--binary {
                --plan-accent: #2f9d69;
                --plan-accent-deep: #19704a;
                --plan-accent-soft: #eefaf4;
                --plan-border: #c8efd8;
                --plan-badge-bg: #e9f8f0;
            }

            .dashboard-stat-card--matrix {
                --plan-accent: #7c5ccf;
                --plan-accent-deep: #5a3dab;
                --plan-accent-soft: #f4f1ff;
                --plan-border: #dcd3ff;
                --plan-badge-bg: #f2eeff;
            }

            .dashboard-stat-card--board {
                --plan-accent: #d69321;
                --plan-accent-deep: #9b6610;
                --plan-accent-soft: #fff7e7;
                --plan-border: #f3ddb5;
                --plan-badge-bg: #fff4dc;
            }

            .dashboard-stat-card--crypto {
                --plan-accent: #2f80ed;
                --plan-accent-deep: #1c5bb8;
                --plan-accent-soft: #eef6ff;
                --plan-border: #cfe3ff;
                --plan-badge-bg: #eaf4ff;
            }

            .dashboard-stat-card--other {
                --plan-accent: #c54b76;
                --plan-accent-deep: #923357;
                --plan-accent-soft: #fff0f5;
                --plan-border: #f5cddd;
                --plan-badge-bg: #fff3f7;
            }

            @supports (color: oklch(0.62 0.16 252)) {
                .dashboard-stat-card {
                    --plan-accent: oklch(0.62 0.16 252);
                    --plan-accent-deep: oklch(0.49 0.15 252);
                    --plan-accent-soft: oklch(0.97 0.025 252);
                    --plan-border: oklch(0.9 0.045 252);
                    --plan-badge-bg: oklch(0.96 0.032 252);
                }

                .dashboard-stat-card--unilevel {
                    --plan-accent: oklch(0.66 0.16 31);
                    --plan-accent-deep: oklch(0.53 0.15 31);
                    --plan-accent-soft: oklch(0.97 0.032 31);
                    --plan-border: oklch(0.9 0.06 31);
                    --plan-badge-bg: oklch(0.96 0.04 31);
                }

                .dashboard-stat-card--single-leg {
                    --plan-accent: oklch(0.65 0.12 190);
                    --plan-accent-deep: oklch(0.48 0.1 190);
                    --plan-accent-soft: oklch(0.97 0.026 190);
                    --plan-border: oklch(0.9 0.05 190);
                    --plan-badge-bg: oklch(0.96 0.032 190);
                }

                .dashboard-stat-card--binary {
                    --plan-accent: oklch(0.62 0.14 150);
                    --plan-accent-deep: oklch(0.47 0.12 150);
                    --plan-accent-soft: oklch(0.97 0.03 150);
                    --plan-border: oklch(0.9 0.055 150);
                    --plan-badge-bg: oklch(0.96 0.035 150);
                }

                .dashboard-stat-card--matrix {
                    --plan-accent: oklch(0.58 0.16 292);
                    --plan-accent-deep: oklch(0.45 0.15 292);
                    --plan-accent-soft: oklch(0.96 0.035 292);
                    --plan-border: oklch(0.89 0.06 292);
                    --plan-badge-bg: oklch(0.95 0.045 292);
                }

                .dashboard-stat-card--board {
                    --plan-accent: oklch(0.7 0.14 76);
                    --plan-accent-deep: oklch(0.52 0.12 76);
                    --plan-accent-soft: oklch(0.97 0.04 76);
                    --plan-border: oklch(0.89 0.065 76);
                    --plan-badge-bg: oklch(0.96 0.045 76);
                }

                .dashboard-stat-card--crypto {
                    --plan-accent: oklch(0.61 0.16 245);
                    --plan-accent-deep: oklch(0.47 0.14 245);
                    --plan-accent-soft: oklch(0.97 0.027 245);
                    --plan-border: oklch(0.9 0.052 245);
                    --plan-badge-bg: oklch(0.96 0.034 245);
                }

                .dashboard-stat-card--other {
                    --plan-accent: oklch(0.58 0.14 350);
                    --plan-accent-deep: oklch(0.45 0.12 350);
                    --plan-accent-soft: oklch(0.97 0.032 350);
                    --plan-border: oklch(0.9 0.055 350);
                    --plan-badge-bg: oklch(0.96 0.04 350);
                }
            }

            .dashboard-stat-card:hover {
                transform: translateY(-4px);
                border-color: var(--plan-accent);
                box-shadow: 0 8px 0 0 rgba(15, 23, 42, 0.01), 0 20px 42px 0 rgba(15, 23, 42, 0.11);
            }

            .dashboard-stat-card .card-body {
                min-height: 178px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                position: relative;
            }

            .dashboard-stat-card--wide,
            .dashboard-stat-card--wide .card-body {
                min-height: 156px;
            }

            .dashboard-stat-head {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 15px;
                margin-bottom: 22px;
            }

            .dashboard-stat-icon {
                width: 44px;
                height: 44px;
                border-radius: 5px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                flex: 0 0 44px;
                color: #f8fbff;
                font-size: 22px;
                background: linear-gradient(135deg, var(--plan-accent) 0%, var(--plan-accent-deep) 100%);
                box-shadow: 0 10px 24px -14px var(--plan-accent-deep);
                transition: transform 0.3s ease;
            }

            .dashboard-stat-card:hover .dashboard-stat-icon {
                transform: scale(1.05);
            }

            .request-overview-grid {
                margin-bottom: 24px;
            }

            .request-summary-card {
                overflow: hidden;
                border-radius: 22px;
                min-height: 220px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                padding: 20px;
                color: #fff;
                box-shadow: 0 24px 60px rgba(15, 23, 42, 0.08);
                transition: transform 0.25s ease, box-shadow 0.25s ease;
            }

            .request-summary-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 28px 72px rgba(15, 23, 42, 0.12);
            }

            .request-summary-top {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 16px;
                margin-bottom: 22px;
            }

            .request-summary-value {
                display: block;
                font-size: 2.9rem;
                font-weight: 800;
                line-height: 1;
            }

            .request-summary-label {
                margin: 10px 0 0;
                color: rgba(255, 255, 255, 0.92);
                font-size: 0.98rem;
                font-weight: 600;
            }

            .request-summary-icon {
                width: 44px;
                height: 44px;
                border-radius: 14px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                background: rgba(255, 255, 255, 0.2);
            }

            .request-summary-sparkline {
                display: grid;
                grid-template-columns: repeat(7, minmax(0, 1fr));
                gap: 6px;
                align-items: end;
                min-height: 64px;
                margin-top: 8px;
                opacity: 0.95;
            }

            .request-summary-sparkline span {
                display: block;
                width: 100%;
                background: rgba(255, 255, 255, 0.18);
                border-radius: 999px;
            }

            .request-summary-card--peach {
                background: linear-gradient(135deg, #ff7a7a 0%, #ffb36b 100%);
            }

            .request-summary-card--indigo {
                background: linear-gradient(135deg, #5b65f2 0%, #7a8dff 100%);
            }

            .request-summary-card--green {
                background: linear-gradient(135deg, #15bd7b 0%, #37d37f 100%);
            }

            .request-summary-card--pink {
                background: linear-gradient(135deg, #f7499f 0%, #ff7fb7 100%);
            }

            @media (max-width: 1199.98px) {
                .request-overview-grid {
                    margin-bottom: 18px;
                }
            }

            @media (max-width: 767.98px) {
                .request-summary-card {
                    min-height: 200px;
                }
            }

            .dashboard-stat-badge {
                display: inline-flex;
                align-items: center;
                gap: 6px;
                padding: 6px 10px;
                border: 1px solid var(--plan-border);
                border-radius: 999px;
                background: var(--plan-badge-bg);
                color: var(--plan-accent-deep);
                font-size: 12px;
                font-weight: 700;
                line-height: 1;
            }

            .dashboard-stat-badge i {
                font-size: 13px;
            }

            .dashboard-stat-title {
                color: #64748b;
                font-size: 13px;
                font-weight: 700;
                letter-spacing: 0.4px;
                margin-bottom: 8px;
                text-transform: uppercase;
            }

            .dashboard-stat-value {
                color: #172033;
                font-size: 34px;
                font-weight: 700;
                line-height: 1;
                margin-bottom: 10px;
            }

            .dashboard-stat-description {
                color: #6b7280;
                font-size: 14px;
                line-height: 1.5;
                margin: 0;
            }

            .dashboard-stat-card--wide .dashboard-stat-description {
                max-width: 68ch;
            }

            .row>[class*='col-']:nth-child(2) .dashboard-stat-card {
                animation-delay: 0.08s;
            }

            @keyframes dashboardCardIn {
                from {
                    opacity: 0;
                    transform: translateY(8px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 575.98px) {
                .dashboard-stat-head {
                    margin-bottom: 18px;
                }

                .dashboard-stat-card,
                .dashboard-stat-card .card-body {
                    min-height: 165px;
                }

                .dashboard-stat-value {
                    font-size: 30px;
                }

                .dashboard-stat-badge {
                    padding: 5px 8px;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .dashboard-stat-card,
                .dashboard-stat-icon {
                    animation: none;
                    transition: none;
                }
            }
        </style>
    @endpush

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-bar-chart-2 bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Dashboard') }}</h5>
                            <span>{{ __('Project requests and blog content overview') }}</span>
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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row request-overview-grid">
            <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                <div class="card request-summary-card request-summary-card--peach">
                    <div class="request-summary-top">
                        <div>
                            <span class="request-summary-value">{{ number_format(totalProjectRequestCount()) }}</span>
                            <p class="request-summary-label">{{ __('Total Project Request') }}</p>
                        </div>
                        <span class="request-summary-icon"><i class="ik ik-inbox"></i></span>
                    </div>
                    <div class="request-summary-sparkline">
                        <span style="height: 34%;"></span>
                        <span style="height: 55%;"></span>
                        <span style="height: 42%;"></span>
                        <span style="height: 68%;"></span>
                        <span style="height: 52%;"></span>
                        <span style="height: 58%;"></span>
                        <span style="height: 43%;"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                <div class="card request-summary-card request-summary-card--indigo">
                    <div class="request-summary-top">
                        <div>
                            <span class="request-summary-value">{{ number_format(attendedProjectRequestCount()) }}</span>
                            <p class="request-summary-label">{{ __('Attended Project Request') }}</p>
                        </div>
                        <span class="request-summary-icon"><i class="ik ik-check-circle"></i></span>
                    </div>
                    <div class="request-summary-sparkline">
                        <span style="height: 38%;"></span>
                        <span style="height: 61%;"></span>
                        <span style="height: 47%;"></span>
                        <span style="height: 54%;"></span>
                        <span style="height: 39%;"></span>
                        <span style="height: 64%;"></span>
                        <span style="height: 50%;"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                <div class="card request-summary-card request-summary-card--green">
                    <div class="request-summary-top">
                        <div>
                            <span class="request-summary-value">{{ number_format(pendingProjectRequestCount()) }}</span>
                            <p class="request-summary-label">{{ __('Unattended Project Request') }}</p>
                        </div>
                        <span class="request-summary-icon"><i class="ik ik-clock"></i></span>
                    </div>
                    <div class="request-summary-sparkline">
                        <span style="height: 45%;"></span>
                        <span style="height: 68%;"></span>
                        <span style="height: 40%;"></span>
                        <span style="height: 55%;"></span>
                        <span style="height: 48%;"></span>
                        <span style="height: 63%;"></span>
                        <span style="height: 52%;"></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                <div class="card request-summary-card request-summary-card--pink">
                    <div class="request-summary-top">
                        <div>
                            <span class="request-summary-value">{{ number_format(blogCount()) }}</span>
                            <p class="request-summary-label">{{ __('Total Blog Posts') }}</p>
                        </div>
                        <span class="request-summary-icon"><i class="ik ik-x-circle"></i></span>
                    </div>
                    <div class="request-summary-sparkline">
                        <span style="height: 52%;"></span>
                        <span style="height: 60%;"></span>
                        <span style="height: 33%;"></span>
                        <span style="height: 58%;"></span>
                        <span style="height: 45%;"></span>
                        <span style="height: 61%;"></span>
                        <span style="height: 36%;"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card dashboard-stat-card dashboard-stat-card--unilevel">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-layers"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __("Unilevel Plan") }}</div>
                            <div class="dashboard-stat-value">{{ number_format(unilevelPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Unilevel plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card dashboard-stat-card dashboard-stat-card--single-leg">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-activity"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __("Single Leg Plan") }}</div>
                            <div class="dashboard-stat-value">{{ number_format(singleLegPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Single leg plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card dashboard-stat-card dashboard-stat-card--binary">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-pie-chart"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __('Binary Plan') }}</div>
                            <div class="dashboard-stat-value">{{ number_format(binaryPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Binary plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card dashboard-stat-card dashboard-stat-card--matrix">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-grid"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __('Matrix Plan') }}</div>
                            <div class="dashboard-stat-value">{{ number_format(matrixPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Matrix plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card dashboard-stat-card dashboard-stat-card--board">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-box"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __('Board Plan') }}</div>
                            <div class="dashboard-stat-value">{{ number_format(boardPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Board plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card dashboard-stat-card dashboard-stat-card--crypto">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-briefcase"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __('Crypto Plan') }}</div>
                            <div class="dashboard-stat-value">{{ number_format(cryptoPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Crypto plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card dashboard-stat-card dashboard-stat-card--other dashboard-stat-card--wide">
                    <div class="card-body">
                        <div class="dashboard-stat-head">
                            <span class="dashboard-stat-icon">
                                <i class="ik ik-more-horizontal"></i>
                            </span>
                            <span class="dashboard-stat-badge">
                                <i class="ik ik-activity"></i>
                                {{ __('Live') }}
                            </span>
                        </div>
                        <div>
                            <div class="dashboard-stat-title">{{ __('Other Plan') }}</div>
                            <div class="dashboard-stat-value">{{ number_format(otherPlanCount()) }}</div>
                            <p class="dashboard-stat-description">
                                {{ __('Other plan options available for selection.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('adm_assets/assets/plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('adm_assets/assets/js/dashboard-charts.js') }}"></script>
    @endpush
@endsection
