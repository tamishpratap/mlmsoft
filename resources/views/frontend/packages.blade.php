@extends('frontend.layouts.app')

@section('title', 'MLM Software Packages and AI-Ready Add-Ons')
@section('description', 'Compare flexible MLM software launch packages for starter, growth, enterprise AI-ready platforms, mobile app add-ons, and AI automation add-ons.')

@php
    $packages = [
        [
            'icon' => 'seedling',
            'title' => 'Starter Launch',
            'description' => 'For new MLM brands launching one focused compensation plan with essential admin and distributor workflows.',
            'standard_price' => 'Custom Quote',
            'accelerated_price' => 'Priority Quote',
            'standard_timeline' => 'Scoped after discovery',
            'accelerated_timeline' => 'Accelerated sprint plan',
            'featured' => false,
            'features' => ['1 compensation plan', 'Admin and distributor dashboards', 'Wallet and payout reports', 'Basic genealogy and referral tracking', 'Launch support checklist'],
        ],
        [
            'icon' => 'rocket',
            'title' => 'Growth Platform',
            'description' => 'For active businesses needing richer automation, commerce modules, dashboards, and scalable user workflows.',
            'standard_price' => 'Custom Quote',
            'accelerated_price' => 'Priority Quote',
            'standard_timeline' => 'Milestone-based delivery',
            'accelerated_timeline' => 'Dedicated sprint lane',
            'featured' => true,
            'features' => ['Hybrid MLM plan engine', 'E-commerce and repurchase modules', 'Advanced reports and analytics', 'Secure payout approval workflows', 'Automation-ready operations'],
        ],
        [
            'icon' => 'building',
            'title' => 'Enterprise AI-Ready Platform',
            'description' => 'For complex MLM brands that need multi-module architecture, mobile connectivity, integrations, and AI-ready workflows.',
            'standard_price' => 'Custom Quote',
            'accelerated_price' => 'Dedicated Team',
            'standard_timeline' => 'Roadmap-based delivery',
            'accelerated_timeline' => 'Dedicated team roadmap',
            'featured' => false,
            'features' => ['Custom architecture', 'AI support and insight modules', 'Mobile app and API connectivity', 'Crypto and wallet workflows', 'Priority technical support lane'],
        ],
    ];

    $addOns = [
        ['icon' => 'mobile', 'title' => 'Mobile App Add-On', 'text' => 'Android and iOS distributor apps with wallet tracking, income reports, referrals, team tracking, push alerts, and secure login.'],
        ['icon' => 'ai', 'title' => 'AI Automation Add-On', 'text' => 'Custom AI module for support chatbot, onboarding assistant, lead qualification, payout anomaly alerts, and admin insights.'],
        ['icon' => 'store', 'title' => 'Commerce Add-On', 'text' => 'Product catalog, repurchase rules, subscription modules, invoices, coupons, tax, and order-triggered commissions.'],
    ];

    $roadmap = [
        ['title' => 'Discovery and rule mapping', 'description' => 'We define compensation, rank rules, wallets, users, reports, AI use cases, integrations, and launch constraints.'],
        ['title' => 'Blueprint and interface direction', 'description' => 'You receive module scope, page flows, admin controls, milestone plan, and premium UI direction.'],
        ['title' => 'Build, test, and stage', 'description' => 'Core modules are implemented, reviewed, tested, and deployed to staging for acceptance.'],
        ['title' => 'Launch and support', 'description' => 'We help with production launch, monitoring, payout review, support workflows, and post-launch improvements.'],
    ];

    $faqs = [
        ['question' => 'Can we build a hybrid compensation plan?', 'answer' => 'Yes. Binary, matrix, unilevel, board, generation, rank, product, and wallet rules can be combined into a custom rules engine.'],
        ['question' => 'Do packages include fixed pricing?', 'answer' => 'We keep pricing flexible because MLM scope depends on plan complexity, modules, regions, integrations, apps, and AI requirements.'],
        ['question' => 'Can AI be added later?', 'answer' => 'Yes. AI support, onboarding, lead qualification, admin insights, and payout anomaly review can be added as custom modules when your content and workflows are ready.'],
        ['question' => 'Do you build mobile apps?', 'answer' => 'Yes. Android and iOS MLM apps are available as add-ons or as part of an enterprise platform roadmap.'],
    ];
@endphp

@section('content')
    <section class="hero" aria-labelledby="packagesHeroTitle">
        <div class="container hero-grid">
            <div class="reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'tag']) Flexible packages</span>
                <h1 id="packagesHeroTitle" class="page-headline">Choose a launch path, then customize the MLM platform around your business.</h1>
                <p class="lead">
                    Start with Starter Launch, Growth Platform, or Enterprise AI-Ready Platform. Add mobile apps,
                    AI automation, commerce modules, crypto-ready flows, and custom dashboards as needed.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Request Custom Quote
                    </a>
                    <a href="#faq" class="btn btn-secondary">
                        @include('frontend.partials.icon', ['name' => 'file'])
                        Read FAQs
                    </a>
                </div>
            </div>

            <div class="platform-console glass-panel reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'chart']) Scope fit estimator</span>
                <h2 class="scope-heading">Estimate the platform fit by projected member base.</h2>
                <div class="form-field mt-22">
                    <div class="console-header">
                        <label class="field-label" for="packageMembers">Projected member base</label>
                        <strong data-estimator-output="members">25,000</strong>
                    </div>
                    <input id="packageMembers" class="field-input" type="range" min="1000" max="100000" step="1000" value="25000" data-estimator="members">
                </div>
                <div class="dashboard-stats mt-18">
                    <div><span>Estimated Volume</span><strong data-estimator-output="volume">$382,500</strong></div>
                    <div><span>Payout Load</span><strong data-estimator-output="payouts">$122,400</strong></div>
                    <div><span>Retained</span><strong data-estimator-output="retained">$260,100</strong></div>
                </div>
                <p class="muted-note">This is only a planning guide. Final scope is mapped from your compensation rules, modules, launch region, and integrations.</p>
            </div>
        </div>
    </section>

    <section class="section section-soft" aria-labelledby="packageOptionsTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'building']) Package options</span>
                <h2 id="packageOptionsTitle">Premium launch paths without locking you into a generic product.</h2>
                <p>Toggle the delivery mode to compare a standard planning path against an accelerated implementation lane.</p>
            </div>

            <div class="billing-toggle" aria-label="Delivery mode">
                <button class="billing-btn is-active" type="button" data-billing="standard" aria-pressed="true">Standard Build</button>
                <button class="billing-btn" type="button" data-billing="accelerated" aria-pressed="false">Accelerated Build</button>
            </div>

            <div class="pricing-grid">
                @foreach ($packages as $package)
                    <article class="pricing-card reveal {{ $package['featured'] ? 'featured' : '' }}">
                        @if ($package['featured'])
                            <span class="popular-badge">Most Popular</span>
                        @endif
                        <span class="icon-box">@include('frontend.partials.icon', ['name' => $package['icon']])</span>
                        <h3>{{ $package['title'] }}</h3>
                        <p>{{ $package['description'] }}</p>
                        <div class="price-line">
                            <strong data-price data-standard="{{ $package['standard_price'] }}" data-accelerated="{{ $package['accelerated_price'] }}">{{ $package['standard_price'] }}</strong>
                            <span data-timeline data-standard="{{ $package['standard_timeline'] }}" data-accelerated="{{ $package['accelerated_timeline'] }}">{{ $package['standard_timeline'] }}</span>
                        </div>
                        <ul class="check-list">
                            @foreach ($package['features'] as $feature)
                                <li>@include('frontend.partials.icon', ['name' => 'check']) {{ $feature }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ route('frontend.contact') }}#consultation" class="btn {{ $package['featured'] ? 'btn-primary' : 'btn-secondary' }} mt-auto">
                            @include('frontend.partials.icon', ['name' => 'file'])
                            Request Quote
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-white" aria-labelledby="addonsTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'puzzle']) Add-on modules</span>
                <h2 id="addonsTitle">Extend your package with mobile, AI, and commerce modules.</h2>
                <p>Add-ons are scoped around your existing workflows so the platform stays clean, scalable, and easy to manage.</p>
            </div>

            <div class="card-grid">
                @foreach ($addOns as $addon)
                    <article class="feature-card reveal">
                        <span class="icon-box violet">@include('frontend.partials.icon', ['name' => $addon['icon']])</span>
                        <h3>{{ $addon['title'] }}</h3>
                        <p>{{ $addon['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container split">
            <div class="section-heading align-left reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'rocket']) Delivery roadmap</span>
                <h2>From discovery to launch with clear checkpoints.</h2>
                <p>Your package becomes a practical delivery roadmap with acceptance criteria, review windows, and launch responsibilities.</p>
            </div>

            <div class="timeline reveal">
                @foreach ($roadmap as $index => $step)
                    <div class="timeline-item">
                        <span class="timeline-marker">{{ $index + 1 }}</span>
                        <div>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="faq" class="section section-white">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'file']) Package FAQs</span>
                <h2>Answers before the first call.</h2>
                <p>Use these quick answers to understand scope, pricing flexibility, AI modules, and mobile app planning.</p>
            </div>

            <div class="faq-grid" data-faq-list>
                @foreach ($faqs as $index => $faq)
                    <article class="faq-item {{ $index === 0 ? 'is-open' : '' }}">
                        <button class="faq-question" type="button" data-faq aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                            <span>{{ $faq['question'] }}</span>
                            <span>+</span>
                        </button>
                        <div class="faq-answer">{{ $faq['answer'] }}</div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partials.cta')
@endsection
