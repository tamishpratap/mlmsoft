@extends('frontend.layouts.app')

@section('title', 'MLM Mobile App Development | Android, iOS & AI Support')
@section('description', 'Launch Android and iOS MLM mobile apps with distributor wallet, income tracking, referral sharing, team tracking, push notifications, secure login, and AI support assistant.')
@section('image', asset('uploads/P1778754169.jpg'))

@php
    $appPlatforms = [
        ['icon' => 'mobile', 'image' => 'uploads/mobile.png', 'title' => 'Android MLM App', 'text' => 'Fast Android distributor apps with genealogy, wallet, income reports, referral tools, team tracking, and push notifications.', 'meta' => 'Android ready'],
        ['icon' => 'shield', 'image' => 'uploads/P1778754169.jpg', 'title' => 'iOS MLM App', 'text' => 'Premium iPhone app experiences with secure login, polished dashboards, real-time alerts, and clean navigation.', 'meta' => 'iOS ready'],
    ];

    $appFeatures = [
        ['icon' => 'wallet', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Distributor Wallet', 'text' => 'View balance, transactions, withdrawals, bonus credits, and payout history from mobile.'],
        ['icon' => 'chart', 'image' => 'uploads/P1778757841.jpg', 'title' => 'Income Tracking', 'text' => 'Track binary income, level income, referral income, ROI, rank rewards, and team volume instantly.'],
        ['icon' => 'seedling', 'image' => 'uploads/10.png', 'title' => 'Referral Sharing', 'text' => 'Share referral links, invite prospects, monitor new joins, and follow conversion activity.'],
        ['icon' => 'users', 'image' => 'uploads/8.png', 'title' => 'Team Tracking', 'text' => 'View sponsor teams, genealogy, placement, rank progress, downline activity, and member growth.'],
        ['icon' => 'bell', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Push Notifications', 'text' => 'Send instant alerts for payouts, referrals, rank updates, offers, support, and admin announcements.'],
        ['icon' => 'bot', 'image' => 'uploads/P1778757788.jpg', 'title' => 'AI Support Assistant', 'text' => 'Add an AI-powered support assistant inside the mobile app for common questions and onboarding help.'],
        ['icon' => 'support', 'image' => 'uploads/6.png', 'title' => 'AI Onboarding Help', 'text' => 'Guide new distributors through setup, wallet basics, referral sharing, and first income actions.'],
        ['icon' => 'lock', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Secure Login', 'text' => 'Use secure authentication, device-aware sessions, password reset, and protected account access.'],
        ['icon' => 'admin', 'image' => 'uploads/P1778754121.jpg', 'title' => 'Real-Time Dashboard', 'text' => 'Display clean cards for income, wallet, referrals, orders, activity, notices, and rank milestones.'],
    ];

    $screenshots = [
        ['image' => asset('uploads/P1778754169.jpg'), 'alt' => 'MLM mobile dashboard screenshot showing wallet, sales, income, payout, and network cards', 'title' => 'Distributor Dashboard'],
        ['image' => asset('uploads/P1778757746.jpg'), 'alt' => 'MLM e-wallet mobile app feature graphic for secure payments', 'title' => 'Secure Wallet'],
        ['image' => asset('uploads/P1778754121.jpg'), 'alt' => 'Responsive MLM dashboard screenshot with binary income and member data', 'title' => 'Admin Sync'],
    ];
@endphp

@section('content')
    <section class="hero" aria-labelledby="mobileAppTitle">
        <div class="container mobile-hero-grid">
            <div class="reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'mobile']) Mobile MLM app development</span>
                <h1 id="mobileAppTitle" class="page-headline">Android and iOS MLM apps for a mobile-first distributor experience.</h1>
                <p class="lead">
                    Build secure MLM mobile apps with distributor wallets, income tracking, referral sharing, team
                    tracking, push notifications, real-time dashboards, and AI support assistant workflows.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Request App Demo
                    </a>
                    <a href="#app-screenshots" class="btn btn-secondary">
                        @include('frontend.partials.icon', ['name' => 'eye'])
                        View Screenshots
                    </a>
                </div>
            </div>

            <div class="app-device-stage reveal" aria-label="Mobile app dashboard preview">
                <div class="phone-frame phone-primary">
                    <img src="{{ asset('uploads/P1778754169.jpg') }}" alt="MLM app mobile dashboard screenshot">
                </div>
                <div class="phone-frame phone-secondary">
                    <img src="{{ asset('uploads/P1778757746.jpg') }}" alt="MLM app e-wallet feature screenshot">
                </div>
                <div class="app-floating-card">
                    <strong>AI-ready mobile support</strong>
                    <span>Wallet, referrals, team tracking, income reports, and support assistant in one app.</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-white" aria-labelledby="platformTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'grid']) Native app solutions</span>
                <h2 id="platformTitle">Launch Android MLM App and iOS MLM App experiences.</h2>
                <p>Give every distributor a fast, secure, branded mobile app connected to your MLM software platform.</p>
            </div>

            <div class="app-platform-grid">
                @foreach ($appPlatforms as $platform)
                    <article class="app-platform-card reveal">
                        <div class="service-card-media">
                            <img src="{{ asset($platform['image']) }}" alt="{{ $platform['title'] }} visual" loading="lazy" decoding="async">
                        </div>
                        <span class="app-icon-box">@include('frontend.partials.icon', ['name' => $platform['icon']])</span>
                        <span class="tag">{{ $platform['meta'] }}</span>
                        <h3>{{ $platform['title'] }}</h3>
                        <p>{{ $platform['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-soft" aria-labelledby="featuresTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'bolt']) Mobile app features</span>
                <h2 id="featuresTitle">Everything your MLM users expect inside a modern mobile app.</h2>
                <p>Mobile-first workflows for daily income checks, team activity, secure wallet actions, referral growth, and AI support.</p>
            </div>

            <div class="app-feature-grid">
                @foreach ($appFeatures as $feature)
                    <article class="app-feature-card reveal">
                        <div class="service-card-media">
                            <img src="{{ asset($feature['image']) }}" alt="{{ $feature['title'] }} visual" loading="lazy" decoding="async">
                        </div>
                        <span class="app-icon-box cyan">@include('frontend.partials.icon', ['name' => $feature['icon']])</span>
                        <h3>{{ $feature['title'] }}</h3>
                        <p>{{ $feature['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-white">
        <div class="container split">
            <div class="split-copy reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'ai']) AI support inside the app</span>
                <h2>Help distributors understand wallet, income, team, and onboarding workflows faster.</h2>
                <p>
                    AI can be integrated into your mobile app as a custom support and onboarding module. It can answer
                    approved knowledge base questions, guide common tasks, and reduce repetitive support requests.
                </p>
                <ul class="feature-list two">
                    <li>@include('frontend.partials.icon', ['name' => 'check']) AI onboarding help</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) AI support chatbot</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Wallet and payout guidance</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Knowledge base assistant</li>
                </ul>
            </div>
            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">Mobile support assistant</span>
                        <h3>How can I withdraw my income?</h3>
                    </div>
                    <span class="status-pill">AI Ready</span>
                </div>
                <div class="console-card mt-18">
                    <p>
                        The assistant can guide users through wallet balance, withdrawal steps, payout status, required
                        profile checks, and admin support escalation using your approved rules and content.
                    </p>
                    <div class="tag-row">
                        <span class="tag">Support</span>
                        <span class="tag">Onboarding</span>
                        <span class="tag">Wallet Help</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="app-screenshots" class="section section-soft" aria-labelledby="screenshotsTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'eye']) App interface previews</span>
                <h2 id="screenshotsTitle">Mobile dashboard screenshots and app interface previews.</h2>
                <p>Use polished mobile screens to help distributors understand earnings, referrals, wallets, and business activity faster.</p>
            </div>

            <div class="app-screenshot-grid">
                @foreach ($screenshots as $screenshot)
                    <figure class="app-screenshot-card reveal">
                        <img src="{{ $screenshot['image'] }}" alt="{{ $screenshot['alt'] }}" loading="lazy">
                        <figcaption>{{ $screenshot['title'] }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partials.cta')
@endsection
