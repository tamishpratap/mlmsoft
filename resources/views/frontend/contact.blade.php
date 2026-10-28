@extends('frontend.layouts.app')

@section('title', 'Contact MLM Software Experts')
@section('description', 'Book a free MLM software consultation, request a custom demo, and discuss AI integration for your MLM platform with our software experts.')

@php
    $contactCards = [
        ['icon' => 'phone', 'title' => 'Phone', 'text' => '+91 9058521613', 'href' => 'tel:+919058521613'],
        ['icon' => 'mail', 'title' => 'Email', 'text' => 'support@mlmsoftwares.org', 'href' => 'mailto:adarshsahny1167@gmail.com'],
        ['icon' => 'map', 'title' => 'Location', 'text' => 'Delhi, India - remote delivery available', 'href' => null],
        ['icon' => 'calendar', 'title' => 'Hours', 'text' => 'Mon - Sat, 9AM - 7PM', 'href' => null],
    ];
@endphp

@section('content')
    <section class="hero contact-hero" aria-labelledby="contactHeroTitle">
        <div class="container hero-grid">
            <div class="reveal">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'calendar']) Book a free consultation</span>
                <h1 id="contactHeroTitle" class="page-headline">Book a Free MLM Software Consultation</h1>
                <p class="lead">
                    Discuss your compensation plan, wallet and payout workflow, mobile app needs, admin dashboard,
                    distributor experience, and AI integration opportunities with a software expert.
                </p>
                <div class="hero-actions">
                    <a href="#consultation" class="btn btn-primary">
                        @include('frontend.partials.icon', ['name' => 'file'])
                        Request Demo
                    </a>
                    <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer" class="btn btn-whatsapp">
                        @include('frontend.partials.icon', ['name' => 'whatsapp'])
                        Talk to Software Expert
                    </a>
                </div>
            </div>

            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">Consultation topics</span>
                        <h3>What we can plan with you</h3>
                    </div>
                    <span class="status-pill">Free</span>
                </div>
                <div class="mini-flow flow-stack">
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'sitemap'])</span>
                        <div><strong>MLM plan logic</strong><span>Binary, matrix, unilevel, board, generation, or custom</span></div>
                        <span class="status-pill">Plan</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'ai'])</span>
                        <div><strong>AI integration</strong><span>Support, onboarding, lead qualification, insights, alerts</span></div>
                        <span class="status-pill">AI</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'mobile'])</span>
                        <div><strong>Mobile app scope</strong><span>Wallet, income, referrals, teams, and notifications</span></div>
                        <span class="status-pill">App</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-white" aria-label="Contact methods">
        <div class="container">
            <div class="contact-info-grid">
                @foreach ($contactCards as $card)
                    <article class="contact-info-card reveal">
                        <span class="contact-icon">@include('frontend.partials.icon', ['name' => $card['icon']])</span>
                        <h3>{{ $card['title'] }}</h3>
                        @if ($card['href'])
                            <a href="{{ $card['href'] }}">{{ $card['text'] }}</a>
                        @else
                            <p>{{ $card['text'] }}</p>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section id="consultation" class="section section-soft" aria-labelledby="consultationTitle">
        <div class="container contact-grid">
            <div class="form-card reveal">
                <h2 id="consultationTitle">Request Demo or Discuss AI Integration</h2>
                <p>
                    Share your project details. We will review your plan type, market, modules, AI interest, and mobile
                    app needs before the consultation.
                </p>

                <form class="contact-form-modern" action="{{ route('frontend.contact-details') }}" method="POST">
                    @csrf

                    @if (session()->has('successMsg'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('successMsg') }}
                        </div>
                    @endif

                    <div class="form-row">
                        <label class="form-field">
                            <span class="field-label">Full Name</span>
                            <input class="field-input" type="text" name="name" id="name" placeholder="Your name" required>
                            @error('name')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </label>

                        <label class="form-field">
                            <span class="field-label">Email Address</span>
                            <input class="field-input" type="email" name="email" id="email" placeholder="you@example.com" required>
                            @error('email')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>

                    <div class="form-row">
                        <label class="form-field">
                            <span class="field-label">Phone Number</span>
                            <input class="field-input" type="tel" name="mobile" id="mobile" placeholder="Your mobile number" required>
                            @error('mobile')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </label>

                        <label class="form-field">
                            <span class="field-label">Country</span>
                            <select class="field-input" name="country" id="country" required>
                                <option value="">Select Country</option>
                                @foreach ($cdata as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <small class="error-text">{{ $message }}</small>
                            @enderror
                        </label>
                    </div>

                    <label class="form-field full-width">
                        <span class="field-label">MLM Plan Type</span>
                        <select class="field-input" name="plan" required>
                            <option value="">Select MLM Plan</option>
                            <option value="Binary Plan">Binary Plan</option>
                            <option value="Matrix Plan">Matrix Plan</option>
                            <option value="Unilevel Plan">Unilevel Plan</option>
                            <option value="Board Plan">Board Plan</option>
                            <option value="Generation Plan">Generation Plan</option>
                            <option value="Single Leg Plan">Single Leg Plan</option>
                            <option value="Investment Plan">Investment Plan</option>
                            <option value="Crypto Plan">Crypto MLM</option>
                            <option value="Custom Plan">Custom Plan</option>
                        </select>
                        @error('plan')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </label>

                    <label class="form-field full-width">
                        <span class="field-label">Project Details</span>
                        <textarea class="field-input" name="notes" id="notes" rows="5"
                            placeholder="Tell us about your MLM software, wallet, mobile app, AI integration, or payout requirements." required></textarea>
                        @error('notes')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </label>

                    <button class="btn-submit" type="submit">
                        <span>Send Project Inquiry</span>
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                    </button>
                </form>
            </div>

            <aside class="contact-aside reveal">
                <article class="contact-snapshot glass-panel">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'ai']) AI inquiry topics</span>
                    <ul class="clean-list">
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI support chatbot for distributors</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI onboarding assistant inside the platform</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI lead qualification for sales teams</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI payout anomaly alerts for admins</li>
                        <li>@include('frontend.partials.icon', ['name' => 'check']) AI-ready dashboard insights and reports</li>
                    </ul>
                </article>

                <article class="contact-snapshot glass-panel">
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'shield']) Safe consultation</span>
                    <p>
                        We do not need your backend access for a first discussion. Start with your plan rules, modules,
                        business goals, preferred launch timeline, and AI ideas.
                    </p>
                </article>
            </aside>
        </div>
    </section>
@endsection
