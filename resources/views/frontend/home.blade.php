@extends('frontend.layouts.app')

@section('title', 'AI-Powered MLM Software Development Company')
@section('description', 'AI-ready MLM software development for Binary MLM, Matrix MLM, Unilevel MLM, wallets, payouts, genealogy, mobile apps, e-commerce modules, dashboards, and automation.')
@section('image', asset('uploads/P1778754121.jpg'))

@php
    $whatsAppUrl = 'https://api.whatsapp.com/send?phone=919058521613';

    $trustBadges = [
        ['icon' => 'ai', 'label' => 'AI-Ready Platform'],
        ['icon' => 'wallet', 'label' => 'Secure Wallets'],
        ['icon' => 'chart', 'label' => 'Real-Time Payouts'],
        ['icon' => 'mobile', 'label' => 'Mobile App Ready'],
        ['icon' => 'sliders', 'label' => 'Custom MLM Logic'],
    ];

    $aiCards = [
        ['icon' => 'bot', 'image' => 'uploads/P1778757788.jpg', 'title' => 'AI Support Chatbot', 'text' => 'Available as a custom AI module for distributor and admin support workflows.'],
        ['icon' => 'support', 'image' => 'uploads/6.png', 'title' => 'Smart Onboarding Assistant', 'text' => 'Guide new distributors through profile setup, wallet basics, referrals, and first actions.'],
        ['icon' => 'spark', 'image' => 'uploads/P1778757679.jpg', 'title' => 'AI Lead Qualification', 'text' => 'Help sales teams prioritize inquiries and route serious prospects to the right follow-up.'],
        ['icon' => 'alert', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Payout Anomaly Alerts', 'text' => 'Flag unusual payout patterns for admin review before finance teams approve cycles.'],
        ['icon' => 'chart', 'image' => 'uploads/P1778757841.jpg', 'title' => 'Admin Dashboard Insights', 'text' => 'Surface smart business insights for growth, retention, sales volume, and team momentum.'],
        ['icon' => 'file', 'image' => 'uploads/P1778754121.jpg', 'title' => 'AI Knowledge Base', 'text' => 'Let users search policy, plan, product, and training content with guided answers.'],
        ['icon' => 'automation', 'image' => 'uploads/P1779103619_img1_6a0af7837f262.jfif', 'title' => 'Workflow Automation', 'text' => 'Automate repetitive support, onboarding, alerts, and back-office MLM operations.'],
        ['icon' => 'chip', 'image' => 'uploads/14.png', 'title' => 'Growth Analytics', 'text' => 'Add AI-ready analytics for business growth, distributor activity, and operational clarity.'],
    ];

    $services = [
        ['id' => 'binary-mlm-software', 'icon' => 'sitemap', 'image' => 'uploads/2.png', 'title' => 'Binary MLM Software', 'text' => 'Left-right genealogy, pair matching, capping, flushing, rank logic, and payout controls.'],
        ['id' => 'matrix-mlm-software', 'icon' => 'grid', 'image' => 'uploads/3.png', 'title' => 'Matrix MLM Software', 'text' => 'Forced matrix, spillover, level income, stage upgrades, and admin-driven matrix rules.'],
        ['id' => 'unilevel-mlm-software', 'icon' => 'layer', 'image' => 'uploads/1.png', 'title' => 'Unilevel MLM Software', 'text' => 'Depth-based commissions, sponsor trees, leadership bonuses, and simple distributor growth.'],
        ['id' => 'investment-mlm-software', 'icon' => 'chart', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Investment MLM Software', 'text' => 'Investment packages, ROI schedules, wallet ledgers, approvals, and secure payout queues.'],
        ['id' => 'crypto-mlm-software', 'icon' => 'coin', 'image' => 'uploads/12.jpg', 'title' => 'Crypto MLM Software', 'text' => 'Crypto-ready wallet flows, transaction logs, token balance views, and multi-currency logic.'],
        ['id' => 'mobile-mlm-app', 'icon' => 'mobile', 'image' => 'uploads/mobile.png', 'title' => 'Mobile MLM App', 'text' => 'Android and iOS apps for wallet tracking, income reports, referrals, and team activity.'],
        ['id' => 'ai-software-integration', 'icon' => 'ai', 'image' => 'uploads/P1778757788.jpg', 'title' => 'AI Software Integration', 'text' => 'AI-powered support and automation modules tailored to your MLM operations.'],
    ];

    $features = [
        ['icon' => 'wallet', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Secure Wallet', 'text' => 'Ledger-first wallet balances, transaction history, withdrawal approvals, and audit visibility.'],
        ['icon' => 'sitemap', 'image' => 'uploads/2.png', 'title' => 'Genealogy Tree', 'text' => 'Visual sponsor, placement, downline, rank, and team tracking for every compensation plan.'],
        ['icon' => 'admin', 'image' => 'uploads/P1778754121.jpg', 'title' => 'Admin Dashboard', 'text' => 'Control users, plans, wallets, payouts, reports, content, support, and security settings.'],
        ['icon' => 'users', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Distributor Dashboard', 'text' => 'Give members clean access to income, teams, referrals, rank progress, and profile tools.'],
        ['icon' => 'store', 'image' => 'uploads/4.png', 'title' => 'E-commerce Module', 'text' => 'Connect products, repurchase rules, coupons, orders, invoices, and commission triggers.'],
        ['icon' => 'coin', 'image' => 'uploads/12.jpg', 'title' => 'Multi-Currency', 'text' => 'Support fiat, crypto-ready flows, localized reporting, and global business operations.'],
        ['icon' => 'ai', 'image' => 'uploads/6.png', 'title' => 'AI Automation', 'text' => 'Add AI-ready support, onboarding, lead qualification, and admin insights where useful.'],
        ['icon' => 'chart', 'image' => 'uploads/P1778757841.jpg', 'title' => 'Real-Time Reports', 'text' => 'Track sales, ranks, payout liability, team growth, wallet activity, and business health.'],
        ['icon' => 'money', 'image' => 'uploads/P1778757746.jpg', 'title' => 'Payout Engine', 'text' => 'Automate commissions, bonuses, deductions, payout previews, and finance approvals.'],
        ['icon' => 'seedling', 'image' => 'uploads/8.png', 'title' => 'Referral Tracking', 'text' => 'Measure replicated links, sponsor activity, campaign performance, and conversion signals.'],
        ['icon' => 'mobile', 'image' => 'uploads/mobile.png', 'title' => 'Mobile Responsive', 'text' => 'Fast, polished web dashboards across desktop, tablet, and mobile devices.'],
        ['icon' => 'shield', 'image' => 'uploads/P1778754169.jpg', 'title' => 'Security Controls', 'text' => 'Role permissions, secure login, payout locks, audit trails, and operational safeguards.'],
    ];

    $whyPoints = [
        'Custom development for binary, matrix, unilevel, board, generation, and single leg plans',
        'Secure architecture for wallets, payout approvals, admin access, and sensitive user data',
        'AI-ready modules designed around realistic support, onboarding, and insight workflows',
        'Mobile-first UI for distributors who check income, referrals, and teams daily',
        'Scalable admin systems for reports, products, content, payouts, and user operations',
        'Long-term technical support for optimization, updates, and future module expansion',
    ];

    $testimonials = [
        [
            'initials' => 'AK',
            'name' => 'Aarav Kapoor',
            'role' => 'Network marketing founder',
            'review' => 'The platform gave us a cleaner admin workflow for genealogy, payouts, wallets, and distributor support. The AI module roadmap was practical and easy to understand.',
        ],
        [
            'initials' => 'MS',
            'name' => 'Maya Sharma',
            'role' => 'Direct selling operations lead',
            'review' => 'Our distributors now get better visibility into income and team progress, while our support team has a smarter way to answer common questions.',
        ],
        [
            'initials' => 'JR',
            'name' => 'Jason Reed',
            'role' => 'Crypto commerce operator',
            'review' => 'We needed wallet controls, payout review, multi-currency views, and mobile access. The final system felt premium and operationally clear.',
        ],
    ];
@endphp

@section('content')
    <div class="home-page">
        <section class="home-hero" aria-labelledby="homeHeroTitle">
            <div class="container home-hero-grid">
                <div class="reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'spark']) Premium AI-ready MLM technology</span>
                    <h1 id="homeHeroTitle" class="home-hero-title">AI-Powered Blockchain MLM Software Development Company for Binary, Matrix & Unilevel Plans
                    </h1>
                    <p class="lead">
                        Launch secure MLM platforms with wallet automation, genealogy, payout engines, mobile apps, and
                        AI-powered support workflows built around your business model.
                    </p>
                    <div class="hero-actions">
                        <a href="#demoModal" class="btn btn-primary" data-demo-open>
                            @include('frontend.partials.icon', ['name' => 'calendar'])
                            Book Free Demo
                        </a>
                        <a href="https://wa.me/+919058521613" class="btn btn-secondary">
                            @include('frontend.partials.icon', ['name' => 'ai'])
                            Talk to AI Software Expert
                        </a>
                        <a href="{{ route('frontend.services') }}" class="btn btn-secondary">
                            @include('frontend.partials.icon', ['name' => 'grid'])
                            View Services
                        </a>
                    </div>
                </div>

                <div class="hero-visual hero-text-visual reveal">
                    <div class="automation-panel">
                        <span class="eyebrow">AI workflow layer</span>
                        <h2>Binary MLM Software Development</h2>
                        <p>
                            Manage your network, payouts, commissions, wallet sync, and team growth with intelligent
                            automation built for modern MLM businesses.
                        </p>
                        <div class="automation-feature-grid">
                            <span>Smart genealogy tracking</span>
                            <span>Automated commission calculations</span>
                            <span>Real-time payout monitoring</span>
                            <span>AI alerts for member activity</span>
                            <span>Secure wallet and transaction sync</span>
                            <span>Admin-ready growth dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="trust-band" aria-label="Platform trust badges">
            <div class="container">
                <div class="trust-strip reveal">
                    @foreach ($trustBadges as $badge)
                        <span class="chip chip-blue">@include('frontend.partials.icon', ['name' => $badge['icon']]) {{ $badge['label'] }}</span>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="ai-integration" class="section ai-section" aria-labelledby="aiModulesTitle">
            <div class="container">
                @include('frontend.partials.ai-modules-suite')
            </div>
        </section>

        <section class="section section-white" aria-labelledby="servicesTitle">
            <div class="container">
                <div class="section-heading reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'grid']) Services preview</span>
                   <h2>Unilevel MLM Software Development</h2>
                    <p>Build the plan, platform, mobile app, wallet, payout engine, and AI modules that match your business rules.</p>
                </div>

                <div class="service-grid">
                    @foreach ($services as $service)
                        <article id="{{ $service['id'] }}" class="service-card reveal">
                            <div class="service-card-media">
                                <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }} visual" loading="lazy" decoding="async">
                            </div>
                            <span class="icon-box">@include('frontend.partials.icon', ['name' => $service['icon']])</span>
                            <h3>Blockchain Smart Contract Integration</h3>
                            <p>{{ $service['text'] }}</p>
                            <a href="{{ route('frontend.services') }}#{{ $service['id'] }}" class="link-arrow">Explore service</a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section-soft" aria-labelledby="featuresTitle">
            <div class="container">
                <div class="section-heading reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'bolt']) Feature-rich platform</span>
                    <h2>Crypto MLM Software Development</h2>
                    <p>From secure wallets to AI-ready dashboards, the platform is designed for daily operations, finance control, and scalable growth.</p>
                </div>

                <div class="feature-grid four">
                    @foreach ($features as $feature)
                        <article class="feature-card reveal">
                            <div class="service-card-media">
                                <img src="{{ asset($feature['image']) }}" alt="{{ $feature['title'] }} visual" loading="lazy" decoding="async">
                            </div>
                            <span class="icon-box cyan">@include('frontend.partials.icon', ['name' => $feature['icon']])</span>
                            <h3>Binary MLM Compensation Plan</h3>
                            <p>{{ $feature['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section-white" aria-labelledby="platformTitle">
            <div class="container platform-showcase">
                <div class="content-copy reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'admin']) Platform showcase</span>
                    <h2>Blockchain Smart Contract MLM Software</h2>
                    <p>
                        Give your back office a polished operating system for members, payouts, products, support,
                        reports, mobile app connectivity, and custom MLM logic.
                    </p>
                 
                </div>
                <div class="platform-console glass-panel reveal">
                    <div class="console-header">
                        <div>
                            <span class="badge">Admin command center</span>
                            <h3>Matrix MLM Software Solutions</h3>
                        </div>
                        <span class="status-pill">AI Ready</span>
                    </div>
                    <div class="console-grid">
                        <div class="console-card large">
                            <span class="chip chip-blue">Network activity</span>
                            <h3>Unilevel MLM Software Development</h3>
                            <p>Track new joins, sponsor activity, rank progress, volume distribution, and inactive branches.</p>
                            <div class="progress-track"><span class="progress-82"></span></div>
                        </div>
                        <div class="mini-flow">
                            <div class="flow-row">
                                <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'wallet'])</span>
                                <div><strong>Wallet ledger</strong><span>Credits, debits, approvals</span></div>
                                <span class="status-pill">Live</span>
                            </div>
                            <div class="flow-row">
                                <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'chart'])</span>
                                <div><strong>Reports</strong><span>Sales, ranks, payouts</span></div>
                                <span class="status-pill">Clear</span>
                            </div>
                            <div class="flow-row">
                                <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'ai'])</span>
                                <div><strong>AI insights</strong><span>Signals and alerts</span></div>
                                <span class="status-pill">Smart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-soft" aria-labelledby="whyTitle">
            <div class="container split">
                <div class="visual-shell reveal">
                    <img src="{{ asset('uploads/P1778757895.jpg') }}" alt="Software team planning an MLM platform">
                </div>
                <div class="split-copy reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'shield']) Why choose us</span>
                   <h2>MLM Mobile App Development</h2>
                    <p>
                        We combine secure Laravel development, refined SaaS UI/UX, compensation-plan expertise, mobile
                        workflows, and realistic AI integration to help your brand launch with confidence.
                    </p>
                    <ul class="check-list">
                        @foreach ($whyPoints as $point)
                            <li>@include('frontend.partials.icon', ['name' => 'check']) {{ $point }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <section class="section section-white" aria-labelledby="mobileTitle">
            <div class="container split">
                <div class="split-copy reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'mobile']) Mobile app preview</span>
                    <h2>Custom Network Marketing Software Development</h2>
                    <p>
                        Give users a secure mobile dashboard for wallet balance, income tracking, referral sharing, team
                        visibility, push notifications, and AI support inside the app.
                    </p>
                    <ul class="feature-list two">
                        <li>@include('frontend.partials.icon', ['name' => 'check']) Wallet and payout history</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) Referral sharing and team tracking</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI onboarding and support assistant</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) Real-time income dashboard</li>
                    </ul>
                    <div class="section-actions">
                        <a href="{{ route('frontend.mobile-app') }}" class="btn btn-primary">Explore Mobile App</a>
                    </div>
                </div>
                <div class="app-device-stage reveal" aria-label="MLM mobile app preview">
                    <div class="phone-frame phone-primary">
                        <img src="{{ asset('uploads/P1778754169.jpg') }}" alt="MLM mobile dashboard preview">
                    </div>
                    <div class="phone-frame phone-secondary">
                        <img src="{{ asset('uploads/P1778757746.jpg') }}" alt="MLM wallet mobile preview">
                    </div>
                    <div class="app-floating-card">
                        <strong>Mobile income view</strong>
                        <span>Wallet, referrals, teams, AI support, and alerts in one mobile experience.</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section section-soft" aria-labelledby="trustTitle">
            <div class="container">
                <div class="section-heading reveal">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'users']) Client confidence</span>
                    <h2>E-Wallet Integration for MLM Software</h2>
                    <p>Clients choose us when they need clean product design, serious payout logic, and a platform that feels better than typical MLM software websites.</p>
                </div>

                <div class="card-grid">
                    @foreach ($testimonials as $testimonial)
                        <article class="case-card reveal">
                            <span class="review-avatar">{{ $testimonial['initials'] }}</span>
                            <p>"{{ $testimonial['review'] }}"</p>
                            <h3>Generation MLM Software System</h3>
                            <span class="chip">{{ $testimonial['role'] }}</span>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        @include('frontend.partials.cta')

        <a href="{{ $whatsAppUrl }}" class="floating-whatsapp" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
            <span class="floating-whatsapp__icon">@include('frontend.partials.icon', ['name' => 'whatsapp'])</span>
            <span class="floating-whatsapp__text">WhatsApp</span>
        </a>

        @include('frontend.partials.welcome-questionnaire-modal')
    </div>
@endsection

@push('scripts')
    <script type="application/ld+json">
        {!! json_encode([
            (chr(64) . 'context') => 'https://schema.org',
            '@type' => 'ProfessionalService',
            'name' => 'AI-Powered MLM Software Development Company',
            'url' => url('/'),
            'description' => 'AI-ready MLM software development for compensation plans, wallets, payouts, genealogy, dashboards, mobile apps, and automation.',
            'areaServed' => 'Worldwide',
            'serviceType' => [
                'Binary MLM Software Development',
                'Matrix MLM Software Development',
                'Unilevel MLM Software Development',
                'Mobile MLM App Development',
                'AI Integration for MLM Software',
            ],
            'telephone' => '+91 9058521613',
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush
