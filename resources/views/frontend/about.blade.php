@extends('frontend.layouts.app')

@section('title', 'About Our MLM Software Development Company')
@section('description', 'Learn about our MLM software development team building secure wallets, genealogy, payouts, mobile apps, admin dashboards, and custom AI-ready software modules.')
@section('image', asset('logo/logo.png'))

@php
    $stats = [
        ['value' => 10, 'suffix' => '+', 'label' => 'Years building MLM platforms'],
        ['value' => 500, 'suffix' => '+', 'label' => 'Business launches supported'],
        ['value' => 40, 'suffix' => '+', 'label' => 'Modules and integrations'],
        ['value' => 24, 'suffix' => '/7', 'label' => 'Support mindset'],
    ];

    $capabilities = [
        ['icon' => 'sitemap', 'image' => 'uploads/2.png', 'title' => 'Custom MLM Development', 'text' => 'Binary, matrix, unilevel, board, generation, single leg, investment, crypto, and custom compensation logic.'],
        ['icon' => 'shield', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Secure Architecture', 'text' => 'Role-based access, wallet ledgers, payout locks, audit trails, and responsible controls for sensitive operations.'],
        ['icon' => 'ai', 'image' => 'uploads/P1778757788.jpg', 'title' => 'AI Integration Partner', 'text' => 'Custom AI modules for support, onboarding, lead qualification, admin insights, and workflow automation.'],
        ['icon' => 'wallet', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Wallet and Payout Systems', 'text' => 'Wallet balances, withdrawal approvals, finance previews, payout reports, and transaction history.'],
        ['icon' => 'mobile', 'image' => 'uploads/mobile.png', 'title' => 'Mobile-First Development', 'text' => 'Responsive web dashboards and Android or iOS app experiences for distributor activity on the go.'],
        ['icon' => 'spark', 'image' => 'uploads/P1778754121.jpg', 'title' => 'Modern UI/UX', 'text' => 'Premium interfaces that make admin workflows, distributor actions, and reports easier to understand.'],
    ];

    $values = [
        'We shape every platform around client-specific business logic instead of forcing a generic plan.',
        'We keep AI messaging realistic and build custom modules only where they improve operations.',
        'We design for long-term support, maintainability, and future feature expansion.',
        'We prioritize clean UI, secure workflows, payout accuracy, and mobile usability.',
    ];
@endphp

@section('content')
    <section class="hero" aria-labelledby="aboutHeroTitle">
        <div class="container hero-grid">
            <div class="reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'gem']) About our team</span>
                <h1 id="aboutHeroTitle" class="page-headline">MLM software development experts and AI integration partners.</h1>
                <p class="lead">
                    We build premium web and mobile MLM platforms with secure wallets, genealogy, payout engines,
                    admin dashboards, distributor dashboards, and AI-ready software modules tailored to your business model.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Talk to Software Expert
                    </a>
                    <a href="{{ route('frontend.services') }}#ai-integration" class="btn btn-secondary">
                        @include('frontend.partials.icon', ['name' => 'ai'])
                        Explore AI Services
                    </a>
                </div>
            </div>

            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">Development approach</span>
                        <h3>Premium MLM platform delivery</h3>
                    </div>
                    <span class="status-pill">Custom Built</span>
                </div>
                <div class="mini-flow flow-stack">
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'sliders'])</span>
                        <div><strong>Business logic mapped</strong><span>Plan rules, ranks, wallets, and payout cycles</span></div>
                        <span class="status-pill">Plan</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'code'])</span>
                        <div><strong>Platform engineered</strong><span>Admin, distributor, wallet, genealogy, and reports</span></div>
                        <span class="status-pill">Build</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'ai'])</span>
                        <div><strong>AI-ready modules added</strong><span>Support, onboarding, insights, and automation</span></div>
                        <span class="status-pill">Smart</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trust-band" aria-label="Company metrics">
        <div class="container">
            <div class="stat-grid reveal">
                @foreach ($stats as $stat)
                    <div class="stat-card">
                        <strong data-count-to="{{ $stat['value'] }}" data-count-suffix="{{ $stat['suffix'] }}">0</strong>
                        <span>{{ $stat['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-white" aria-labelledby="whoTitle">
        <div class="container split">
            <div class="visual-shell reveal">
                <img src="{{ asset('uploads/P1778757895.jpg') }}" alt="MLM software experts planning secure platform architecture">
            </div>
            <div class="split-copy reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'users']) Who we are</span>
                <h2 id="whoTitle">A software team for MLM brands that need more than a basic member panel.</h2>
                <p>
                    We help founders and established network marketing businesses replace manual work with a secure,
                    scalable platform that handles compensation logic, wallets, payouts, genealogy, reports, content,
                    product flows, and support workflows.
                </p>
                <p>
                    Each build is shaped around your plan rules, launch region, user journey, finance process, and future
                    module roadmap. That includes AI-ready workflows when your team wants smarter support and automation.
                </p>
            </div>
        </div>
    </section>

    <section class="section section-soft" aria-labelledby="capabilitiesTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'bolt']) Core capabilities</span>
                <h2 id="capabilitiesTitle">Built for compensation accuracy, operational clarity, and modern user experience.</h2>
                <p>Our work combines MLM domain knowledge, Laravel engineering, mobile-first UI, secure finance workflows, and AI-ready product thinking.</p>
            </div>

            <div class="feature-grid">
                @foreach ($capabilities as $item)
                    <article class="feature-card reveal">
                        <div class="service-card-media">
                            <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }} visual" loading="lazy" decoding="async">
                        </div>
                        <span class="icon-box">@include('frontend.partials.icon', ['name' => $item['icon']])</span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-white" aria-labelledby="valuesTitle">
        <div class="container split">
            <div class="split-copy reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'shield']) How we build</span>
                <h2 id="valuesTitle">Secure, flexible, and designed around your real MLM operations.</h2>
                <p>
                    Premium MLM software needs more than attractive screens. It must calculate correctly, protect
                    sensitive data, give admins clear control, and make everyday distributor workflows simple.
                </p>
                <ul class="check-list">
                    @foreach ($values as $value)
                        <li>@include('frontend.partials.icon', ['name' => 'check']) {{ $value }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">AI-ready roadmap</span>
                        <h3>Smart modules when your business is ready</h3>
                    </div>
                    <span class="status-pill">Optional</span>
                </div>
                <div class="console-grid">
                    <div class="console-card">
                        <span class="chip chip-violet">Support</span>
                        <h3>AI knowledge base assistant</h3>
                        <p>Help users find plan, payout, product, and onboarding answers from approved content.</p>
                    </div>
                    <div class="console-card">
                        <span class="chip chip-cyan">Operations</span>
                        <h3>Admin insights layer</h3>
                        <p>Surface growth signals, inactive branches, payout patterns, and operational prompts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.partials.cta')
@endsection
