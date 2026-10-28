@extends('frontend.layouts.app')

@section('title', 'MLM Platform Suite | Admin, Distributor, Wallet, AI Insights')
@section('description', 'Explore our MLM platform suite with admin console, distributor dashboard, wallet and payout engine, genealogy tracking, AI insights, security controls, reports, and mobile app connectivity.')

@php
    $platformModules = [
        ['icon' => 'admin', 'title' => 'Admin Console', 'text' => 'Manage users, plans, ranks, wallets, payouts, content, support, products, and reports from one control center.'],
        ['icon' => 'users', 'title' => 'Distributor Dashboard', 'text' => 'Give members clear access to profile, referrals, downline, income, wallet, rank, orders, and announcements.'],
        ['icon' => 'wallet', 'title' => 'Wallet and Payout Engine', 'text' => 'Run commission calculation, payout previews, withdrawal approvals, ledgers, and finance exports.'],
        ['icon' => 'sitemap', 'title' => 'Genealogy and Team Tracking', 'text' => 'Visualize sponsor trees, placement structures, rank progress, team volume, and network activity.'],
        ['icon' => 'ai', 'title' => 'AI Insights Layer', 'text' => 'Add smart business insights for admins, support signals, lead quality, and payout anomaly review.'],
        ['icon' => 'bot', 'title' => 'AI Support Assistant', 'text' => 'Offer AI-powered support and automation as a custom module inside the platform and mobile app.'],
        ['icon' => 'shield', 'title' => 'Security and Audit Controls', 'text' => 'Role access, secure sessions, payout locks, transaction history, audit logs, and approval workflows.'],
        ['icon' => 'chart', 'title' => 'Real-Time Reports', 'text' => 'Monitor sales, income, team growth, payout liability, wallet movement, product activity, and business trends.'],
        ['icon' => 'mobile', 'title' => 'Mobile App Connectivity', 'text' => 'Connect Android and iOS app screens to wallet, income, referrals, support, and notifications.'],
        ['icon' => 'sliders', 'title' => 'Custom MLM Logic Engine', 'text' => 'Configure binary, matrix, unilevel, board, generation, single leg, investment, crypto, or hybrid rules.'],
    ];

    $securityFeatures = [
        ['icon' => 'lock', 'title' => 'Role and permission control', 'text' => 'Limit finance, support, admin, and regional access by responsibility and approval level.'],
        ['icon' => 'shield', 'title' => 'Payout locks and audit logs', 'text' => 'Freeze payout cycles, trace wallet changes, and keep a reviewable history of sensitive actions.'],
        ['icon' => 'database', 'title' => 'Ledger-first records', 'text' => 'Track balances and commissions through structured records designed for reporting and reconciliation.'],
    ];
@endphp

@section('content')
    <section class="hero" aria-labelledby="platformHeroTitle">
        <div class="container hero-grid">
            <div class="reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'admin']) Platform suite</span>
                <h1 id="platformHeroTitle" class="page-headline">A premium MLM operating system for admins, distributors, wallets, payouts, and AI insights.</h1>
                <p class="lead">
                    Build a connected platform where compensation logic, genealogy, wallets, real-time reports, mobile
                    app connectivity, and AI-ready workflows work together cleanly.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Schedule Product Tour
                    </a>
                    <a href="{{ route('frontend.services') }}" class="btn btn-secondary">
                        @include('frontend.partials.icon', ['name' => 'grid'])
                        View Services
                    </a>
                </div>
            </div>

            <div class="visual-shell reveal">
                <img src="{{ asset('frontendassets/images/platform-suite.svg') }}" alt="MLM platform suite dashboard illustration">
            </div>
        </div>
    </section>

    <section class="section section-white" aria-labelledby="modulesTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'puzzle']) Platform modules</span>
                <h2 id="modulesTitle">Everything needed to manage MLM operations in one place.</h2>
                <p>Each module is designed to work with the others, so sign-up, wallet, genealogy, orders, support, and payout workflows stay connected.</p>
            </div>

            <div class="platform-grid">
                @foreach ($platformModules as $module)
                    <article class="platform-card reveal">
                        <span class="icon-box">@include('frontend.partials.icon', ['name' => $module['icon']])</span>
                        <h3>{{ $module['title'] }}</h3>
                        <p>{{ $module['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-soft" aria-labelledby="workflowTitle">
        <div class="container platform-showcase">
            <div class="content-copy reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'automation']) Workflow engine</span>
                <h2 id="workflowTitle">From distributor onboarding to payout approval, the platform keeps work moving.</h2>
                <p>
                    Your team can manage registration, KYC or profile checks, product purchases, wallet credits,
                    commission calculations, payout approvals, support requests, and mobile notifications from a
                    connected architecture.
                </p>
                <ul class="feature-list two">
                    <li>@include('frontend.partials.icon', ['name' => 'check']) AI support assistant available as custom module</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Smart payout anomaly review prompts</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Real-time admin and distributor reporting</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Mobile app access for daily field activity</li>
                </ul>
            </div>
            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">Live operations</span>
                        <h3>Connected platform flow</h3>
                    </div>
                    <span class="status-pill">Active</span>
                </div>
                <div class="mini-flow flow-stack">
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'users'])</span>
                        <div><strong>Distributor joins</strong><span>Profile, sponsor, plan, and placement captured</span></div>
                        <span class="status-pill">User</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'sitemap'])</span>
                        <div><strong>Tree updated</strong><span>Genealogy, team volume, and rank path refreshed</span></div>
                        <span class="status-pill">Tree</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'wallet'])</span>
                        <div><strong>Payout calculated</strong><span>Commission, wallet, audit, and approval records saved</span></div>
                        <span class="status-pill">Payout</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'ai'])</span>
                        <div><strong>AI insights surfaced</strong><span>Support, anomaly, and growth signals shown to admins</span></div>
                        <span class="status-pill">AI</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="security" class="section section-white" aria-labelledby="securityTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'shield']) Security and audit controls</span>
                <h2 id="securityTitle">Built for sensitive wallets, ledgers, distributor data, and finance workflows.</h2>
                <p>Security is not only login protection. It is permissions, approvals, logs, payout locks, and clear recovery workflows.</p>
            </div>

            <div class="contact-methods">
                @foreach ($securityFeatures as $feature)
                    <article class="contact-method reveal">
                        <span class="icon-box green">@include('frontend.partials.icon', ['name' => $feature['icon']])</span>
                        <div>
                            <h3>{{ $feature['title'] }}</h3>
                            <p>{{ $feature['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partials.cta')
@endsection
