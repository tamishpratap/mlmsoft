@extends('frontend.layouts.app')

@section('title', 'MLM Software Services | Binary, Matrix, Unilevel, AI & Mobile Apps')
@section('description', 'Premium MLM software services for compensation plans, e-commerce MLM, wallets, payouts, crypto, recharge/DMT, mobile apps, and custom AI integration modules.')

@php
    $serviceCards = [
        ['id' => 'binary-mlm-software', 'category' => 'compensation', 'icon' => 'sitemap', 'image' => 'uploads/2.png', 'title' => 'Binary MLM Software', 'text' => 'Left-right team placement, matching bonuses, spillover, capping, flushing, and payout controls.', 'tags' => ['Binary', 'Secure', 'Custom Built']],
        ['id' => 'matrix-mlm-software', 'category' => 'compensation', 'icon' => 'grid', 'image' => 'uploads/3.png', 'title' => 'Matrix MLM Software', 'text' => 'Forced matrix, stage upgrades, level income, auto spillover, and admin-defined matrix rules.', 'tags' => ['Matrix', 'Scalable', 'Automated']],
        ['id' => 'unilevel-mlm-software', 'category' => 'compensation', 'icon' => 'layer', 'image' => 'uploads/1.png', 'title' => 'Unilevel MLM Software', 'text' => 'Simple sponsor tree, depth commissions, rank rewards, leadership bonuses, and team reports.', 'tags' => ['Unilevel', 'Easy to Use', 'Reports']],
        ['id' => 'board-mlm-software', 'category' => 'compensation', 'icon' => 'puzzle', 'image' => 'uploads/7.png', 'title' => 'Board MLM Software', 'text' => 'Board cycling, splits, stages, matrix movement, reward tracking, and payout visibility.', 'tags' => ['Board', 'Cycles', 'Custom']],
        ['id' => 'generation-mlm-software', 'category' => 'compensation', 'icon' => 'users', 'image' => 'uploads/8.png', 'title' => 'Generation MLM Software', 'text' => 'Generation income, depth tracking, rank advancement, qualifying sales, and leadership logic.', 'tags' => ['Generation', 'Ranks', 'Depth']],
        ['id' => 'single-leg-mlm-software', 'category' => 'compensation', 'icon' => 'seedling', 'image' => 'uploads/10.png', 'title' => 'Single Leg MLM Software', 'text' => 'Single-line growth models with fixed payout rules, team visibility, and simplified admin controls.', 'tags' => ['Single Leg', 'Fast Setup', 'Simple']],

        ['id' => 'ecommerce-mlm-software', 'category' => 'commerce', 'icon' => 'store', 'image' => 'uploads/4.png', 'title' => 'E-commerce MLM Software', 'text' => 'Product catalog, orders, invoices, coupons, repurchase, tax, shipping, and commission triggers.', 'tags' => ['Commerce', 'Repurchase', 'Orders']],
        ['id' => 'wallet-payout-system', 'category' => 'commerce', 'icon' => 'wallet', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Wallet and Payout System', 'text' => 'Secure ledgers, withdrawal approvals, payout previews, finance exports, and audit trails.', 'tags' => ['Wallet', 'Secure', 'Audit']],
        ['id' => 'recharge-dmt-modules', 'category' => 'commerce', 'icon' => 'receipt', 'image' => 'uploads/11.png', 'title' => 'Recharge/DMT Modules', 'text' => 'Recharge, domestic money transfer, agent commissions, transaction history, and settlement reports.', 'tags' => ['Recharge', 'DMT', 'Agents']],
        ['id' => 'crypto-mlm-software', 'category' => 'commerce', 'icon' => 'coin', 'image' => 'uploads/12.jpg', 'title' => 'Crypto MLM Software', 'text' => 'Crypto-ready payment flows, token balance views, wallet records, and multi-currency reporting.', 'tags' => ['Crypto', 'Wallets', 'Multi Currency']],
        ['id' => 'subscription-modules', 'category' => 'commerce', 'icon' => 'calendar', 'image' => 'uploads/5.png', 'title' => 'Subscription Modules', 'text' => 'Renewals, package validity, recurring member access, and subscription-driven commission rules.', 'tags' => ['Subscription', 'Renewals', 'Plans']],
        ['id' => 'repurchase-modules', 'category' => 'commerce', 'icon' => 'cart', 'image' => 'uploads/9.png', 'title' => 'Repurchase Modules', 'text' => 'Consumption volume, repeat orders, product points, repurchase qualifications, and loyalty rules.', 'tags' => ['Repurchase', 'Products', 'Volume']],

        ['id' => 'ai-chatbot-support', 'category' => 'ai automation', 'icon' => 'bot', 'image' => 'uploads/P1778757788.jpg', 'title' => 'AI Chatbot for Support', 'text' => 'AI-powered support can be integrated to answer plan, wallet, onboarding, and policy questions.', 'tags' => ['AI Ready', 'Support', 'Custom Module']],
        ['id' => 'ai-lead-qualification', 'category' => 'ai automation', 'icon' => 'spark', 'image' => 'uploads/P1778757679.jpg', 'title' => 'AI Lead Qualification', 'text' => 'Help sales teams classify inquiries, identify serious prospects, and prioritize follow-ups.', 'tags' => ['AI Ready', 'Leads', 'Sales']],
        ['id' => 'ai-onboarding-assistant', 'category' => 'ai automation', 'icon' => 'support', 'image' => 'uploads/6.png', 'title' => 'AI Distributor Onboarding Assistant', 'text' => 'Guide distributors through setup, referral sharing, wallet basics, product learning, and first steps.', 'tags' => ['AI Ready', 'Onboarding', 'Mobile']],
        ['id' => 'ai-admin-insights', 'category' => 'ai automation', 'icon' => 'chart', 'image' => 'uploads/P1778757841.jpg', 'title' => 'AI-Powered Admin Insights', 'text' => 'Surface smart insights for sales volume, inactive teams, payout load, and growth opportunities.', 'tags' => ['Insights', 'Admin', 'Analytics']],
        ['id' => 'ai-payout-alerts', 'category' => 'ai automation', 'icon' => 'alert', 'image' => 'uploads/P1778757746.jpg', 'title' => 'AI Payout Anomaly Alerts', 'text' => 'Flag unusual payout or wallet patterns for admin review before finance approval.', 'tags' => ['AI Ready', 'Payouts', 'Risk']],
        ['id' => 'ai-knowledge-base', 'category' => 'ai automation', 'icon' => 'file', 'image' => 'uploads/P1778754121.jpg', 'title' => 'AI Knowledge Base Search', 'text' => 'Let users search training, plan, product, policy, and support content with guided answers.', 'tags' => ['Knowledge Base', 'Support', 'Search']],
        ['id' => 'ai-workflow-automation', 'category' => 'ai automation', 'icon' => 'automation', 'image' => 'uploads/P1779103619_img1_6a0af7837f262.jfif', 'title' => 'AI Workflow Automation', 'text' => 'Automate repetitive onboarding, reminders, support routing, admin prompts, and reporting workflows.', 'tags' => ['Automation', 'AI Ready', 'Ops']],

        ['id' => 'android-mlm-app', 'category' => 'mobile', 'icon' => 'mobile', 'image' => 'uploads/mobile.png', 'title' => 'Android MLM App', 'text' => 'Android app with dashboard, wallet, income, referral sharing, team tracking, and push alerts.', 'tags' => ['Android', 'Mobile', 'Distributor']],
        ['id' => 'ios-mlm-app', 'category' => 'mobile', 'icon' => 'shield', 'image' => 'uploads/P1778754169.jpg', 'title' => 'iOS MLM App', 'text' => 'iPhone app experience with secure login, clean navigation, wallet views, and real-time updates.', 'tags' => ['iOS', 'Secure', 'Premium']],
        ['id' => 'mobile-dashboard', 'category' => 'mobile', 'icon' => 'admin', 'image' => 'uploads/P1778754121.jpg', 'title' => 'Distributor Dashboard', 'text' => 'Mobile dashboard for balance, income tracking, referrals, downline, announcements, and rank progress.', 'tags' => ['Dashboard', 'Income', 'Team']],
        ['id' => 'mobile-push-notifications', 'category' => 'mobile', 'icon' => 'bell', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Push Notifications', 'text' => 'Notify users about payouts, referrals, rank upgrades, product offers, and support updates.', 'tags' => ['Alerts', 'Engagement', 'Mobile']],
        ['id' => 'website-push-notifications', 'category' => 'automation mobile', 'icon' => 'broadcast', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Website Notification Message', 'text' => 'Extend your MLM platform\'s communication capabilities with push notifications for supported Android devices. Send website announcements to all eligible members or selected audiences according to your configured notification rules.', 'tags' => ['Website Notification Message', 'Android Grouping', 'Announcements']],
    ];

    $categories = [
        ['filter' => 'all', 'label' => 'All Services'],
        ['filter' => 'compensation', 'label' => 'Compensation'],
        ['filter' => 'commerce', 'label' => 'Business Modules'],
        ['filter' => 'ai', 'label' => 'AI Integration'],
        ['filter' => 'mobile', 'label' => 'Mobile Apps'],
        ['filter' => 'automation', 'label' => 'Automation'],
    ];

    $process = [
        ['icon' => 'sliders', 'title' => 'Map your MLM rules', 'text' => 'We document plan logic, ranks, wallets, payout caps, product rules, and compliance needs.'],
        ['icon' => 'code', 'title' => 'Build the platform layer', 'text' => 'Admin console, distributor dashboard, genealogy, wallet, reports, and integrations are built around your scope.'],
        ['icon' => 'ai', 'title' => 'Add AI where useful', 'text' => 'AI support, onboarding, lead qualification, alerts, and insights are added as realistic custom modules.'],
        ['icon' => 'rocket', 'title' => 'Test and launch confidently', 'text' => 'We review payout accuracy, mobile responsiveness, security, reports, and launch readiness.'],
    ];
@endphp

@section('content')
    <section class="hero" aria-labelledby="servicesHeroTitle">
        <div class="container hero-grid">
            <div class="reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'grid']) Premium MLM software services</span>
                <h1 id="servicesHeroTitle" class="page-headline">Custom MLM software modules for compensation, commerce, mobile apps, and AI automation.</h1>
                <p class="lead">
                    Choose the modules your business needs: Binary, Matrix, Unilevel, Board, Generation, Single Leg,
                    e-commerce, wallets, payouts, crypto, recharge/DMT, mobile apps, and AI integration.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Configure Your MLM Plan
                    </a>
                    <a href="#ai-integration" class="btn btn-secondary">
                        @include('frontend.partials.icon', ['name' => 'ai'])
                        Explore AI Modules
                    </a>
                </div>
            </div>

            <div class="visual-shell reveal">
                <img src="{{ asset('frontendassets/images/services-architecture.svg') }}" alt="MLM software service architecture modules">
            </div>
        </div>
    </section>

    <section id="compensation" class="section section-soft" aria-labelledby="servicesTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'filter']) Service categories</span>
                <h2 id="servicesTitle">Filter the modules that fit your launch plan.</h2>
                <p>Every service can be combined into a custom MLM platform with secure wallets, accurate payouts, clean dashboards, and AI-ready workflows.</p>
            </div>

            <div class="filter-bar" data-filter-group="services" aria-label="Filter services">
                @foreach ($categories as $index => $category)
                    <button class="filter-btn {{ $index === 0 ? 'is-active' : '' }}" type="button"
                        data-filter="{{ $category['filter'] }}" aria-pressed="{{ $index === 0 ? 'true' : 'false' }}">
                        {{ $category['label'] }}
                    </button>
                @endforeach
            </div>

            <div class="service-grid three">
                @foreach ($serviceCards as $service)
                    <article id="{{ $service['id'] }}" class="service-card reveal" data-filter-target="services"
                        data-category="{{ $service['category'] }}">
                        <div class="service-card-media">
                            <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }} visual" loading="lazy" decoding="async">
                        </div>
                        <span class="icon-box">@include('frontend.partials.icon', ['name' => $service['icon']])</span>
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['text'] }}</p>
                        <div class="tag-row">
                            @foreach ($service['tags'] as $tag)
                                <span class="tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="business-modules" class="section section-white">
        <div class="container split">
            <div class="split-copy reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'store']) Business and commerce modules</span>
                <h2>Connect products, wallets, subscriptions, and payouts in one reliable system.</h2>
                <p>
                    E-commerce MLM, wallet ledgers, recharge/DMT modules, crypto-ready flows, subscriptions, and
                    repurchase logic can be connected to the same commission engine.
                </p>
                <ul class="feature-list two">
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Product checkout and repurchase rules</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Wallet credits and withdrawal approvals</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Recharge, DMT, and agent commissions</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Crypto-ready balance and reporting flows</li>
                </ul>
            </div>

            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">Commerce flow</span>
                        <h3>Order to payout automation</h3>
                    </div>
                    <span class="status-pill">Scalable</span>
                </div>
                <div class="mini-flow flow-stack">
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'cart'])</span>
                        <div><strong>Order received</strong><span>Product, coupon, tax, and user details saved</span></div>
                        <span class="status-pill">Order</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'sitemap'])</span>
                        <div><strong>Commission rules checked</strong><span>Rank, depth, volume, and qualification rules run</span></div>
                        <span class="status-pill">Rules</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'wallet'])</span>
                        <div><strong>Wallet updated</strong><span>Ledger, payout queue, and audit log updated</span></div>
                        <span class="status-pill">Ledger</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ai-integration" class="section ai-section" aria-labelledby="servicesAiTitle">
        <div class="container">
            <div class="ai-panel reveal">
                <div class="content-copy">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'ai']) AI Integration Services</span>
                    <h2 id="servicesAiTitle">Custom AI modules for support, onboarding, lead qualification, and admin insights.</h2>
                    <p>
                        AI can be integrated into your MLM platform as a practical operations layer. We focus on realistic
                        use cases that improve support response, distributor guidance, finance review, and business visibility.
                    </p>
                    <ul class="ai-list two">
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI chatbot for support</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI distributor onboarding assistant</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI payout anomaly alerts</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI knowledge base search</li>
                    </ul>
                </div>
                <div class="ai-orbit">
                    <div class="ai-core">
                        @include('frontend.partials.icon', ['name' => 'bot'])
                        <strong>AI Module Stack</strong>
                        <span>Available as custom AI-powered support and automation inside your platform.</span>
                    </div>
                    <div class="ai-floating-card"><strong>Leads</strong><span>Qualify inquiries</span></div>
                    <div class="ai-floating-card"><strong>Support</strong><span>Answer common questions</span></div>
                    <div class="ai-floating-card"><strong>Finance</strong><span>Review payout alerts</span></div>
                    <div class="ai-floating-card"><strong>Growth</strong><span>Read admin insights</span></div>
                </div>
            </div>
        </div>
    </section>

    <section id="mobile-services" class="section section-white">
        <div class="container split">
            <div class="visual-shell reveal">
                <img src="{{ asset('uploads/mobile.png') }}" alt="MLM mobile app service preview">
            </div>
            <div class="split-copy reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'mobile']) Mobile App Services</span>
                <h2>Android and iOS apps connected to your MLM platform.</h2>
                <p>
                    Give distributors mobile access to wallet tracking, income tracking, referral sharing, team tracking,
                    push notifications, secure login, and AI support inside the app.
                </p>
                <ul class="feature-list two">
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Distributor dashboard</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Wallet and income tracking</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Referral and team tools</li>
                    <li>@include('frontend.partials.icon', ['name' => 'check']) Push notifications and AI support</li>
                </ul>
                <div class="section-actions">
                    <a href="{{ route('frontend.mobile-app') }}" class="btn btn-primary">View Mobile App</a>
                    <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-secondary">Request App Demo</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Explanatory Section: How Website Push Notifications Work -->
    <section class="section section-soft" id="servicesPushFlow" aria-labelledby="howPushWorks">
        <div class="container">
            @include('frontend.partials.push-notifications-flow')
        </div>
    </section>

    <section class="section section-soft" aria-labelledby="processTitle">
        <div class="container">
            <div class="section-heading reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'rocket']) Delivery process</span>
                <h2 id="processTitle">From compensation rules to a polished launch-ready platform.</h2>
                <p>We keep planning clear, development modular, and QA focused on the workflows that matter most.</p>
            </div>

            <div class="card-grid four">
                @foreach ($process as $item)
                    <article class="feature-card reveal">
                        <span class="icon-box green">@include('frontend.partials.icon', ['name' => $item['icon']])</span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.partials.cta')
@endsection
