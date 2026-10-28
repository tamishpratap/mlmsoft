@extends('frontend.layouts.app')

@section('title', 'AI Integration Built for Your MLM Software | Navigation, Form, Chat, Plan & Voice')
@section('description', 'Explore AI-powered assistance for platform navigation, form completion, member information, MLM plan explanations, and voice-based interaction. Purpose-built modules for your MLM platform.')
@section('image', asset('uploads/P1778757788.jpg'))

@section('content')
    <!-- Dedicated AI Integration Hero Section -->
    <section class="hero ai-page-hero" aria-labelledby="aiPageHeroTitle">
        <div class="container hero-grid">
            <div class="reveal">
                <nav class="breadcrumb-trail" aria-label="Breadcrumb">
                    <a href="{{ route('frontend.home') }}">Home</a>
                    <span class="sep">/</span>
                    <span aria-current="page">AI Integration</span>
                </nav>
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'ai']) Dedicated AI Capability Suite</span>
                <h1 id="aiPageHeroTitle" class="page-headline">AI Integration Built for Your MLM Software</h1>
                <p class="lead">
                    Explore AI-powered assistance for platform navigation, form completion, member information, MLM plan
                    explanations, and voice-based interaction. Each module is designed around the workflows available in
                    your MLM platform.
                </p>
                <div class="hero-actions">
                    <a href="#demoModal" class="btn btn-primary" data-demo-open>
                        @include('frontend.partials.icon', ['name' => 'calendar'])
                        Book Free AI Demo
                    </a>
                    <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer" class="btn btn-secondary btn-whatsapp">
                        @include('frontend.partials.icon', ['name' => 'whatsapp'])
                        Discuss on WhatsApp
                    </a>
                </div>
                <div class="trust-strip trust-left">
                    <span class="chip chip-blue">@include('frontend.partials.icon', ['name' => 'compass']) AI Navigation</span>
                    <span class="chip chip-cyan">@include('frontend.partials.icon', ['name' => 'edit']) AI Form Filler</span>
                    <span class="chip chip-violet">@include('frontend.partials.icon', ['name' => 'message']) AI Chat Assistant</span>
                    <span class="chip chip-blue">@include('frontend.partials.icon', ['name' => 'sitemap']) AI Plan Explainer</span>
                    <span class="chip chip-cyan">@include('frontend.partials.icon', ['name' => 'mic']) AI Voice Talk</span>
                    <span class="chip chip-violet">@include('frontend.partials.icon', ['name' => 'bell']) Website Notification Message</span>
                </div>
            </div>

            <div class="platform-console glass-panel reveal">
                <div class="console-header">
                    <div>
                        <span class="badge">Architecture Focus</span>
                        <h3>Platform Capabilities</h3>
                    </div>
                    <span class="status-pill">Session-Secured</span>
                </div>
                <div class="mini-flow flow-stack">
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'compass'])</span>
                        <div><strong>01. AI Navigation</strong><span>Natural voice & text platform routing</span></div>
                        <span class="status-pill">Routing</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'edit'])</span>
                        <div><strong>02. AI Form Filler</strong><span>Assisted fields with user review</span></div>
                        <span class="status-pill">Verified</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'message'])</span>
                        <div><strong>03. AI Chat Assistant</strong><span>Role-scoped member wallet & Q&A</span></div>
                        <span class="status-pill">Protected</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'sitemap'])</span>
                        <div><strong>04. AI Plan Explainer</strong><span>Configured compensation rule clarity</span></div>
                        <span class="status-pill">Rules</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'mic'])</span>
                        <div><strong>05. AI Voice Talk</strong><span>Conversational hands-free queries</span></div>
                        <span class="status-pill">Speech</span>
                    </div>
                    <div class="flow-row">
                        <span class="flow-icon">@include('frontend.partials.icon', ['name' => 'bell'])</span>
                        <div><strong>06. Website Notification Message</strong><span>Admin announcements to Android devices</span></div>
                        <span class="status-pill">Alerts</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main AI Suite Sections: Intro Panel, 5 Modules Grid, Workflow, Closing CTA -->
    <section class="section ai-section" id="ai-integration" aria-labelledby="aiModulesTitle">
        <div class="container">
            @include('frontend.partials.ai-modules-suite')
        </div>
    </section>
@endsection
