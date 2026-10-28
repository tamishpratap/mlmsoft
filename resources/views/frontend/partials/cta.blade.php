<section class="section cta-section">
    <div class="container">
        <div class="cta-band reveal">
            <div class="cta-grid">
                <div>
                    <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'spark']) Free strategy call</span>
                    <h2>Plan your MLM software, mobile app, and AI automation with a technical team.</h2>
                    <p>
                        Discuss your compensation model, wallet workflow, genealogy rules, mobile app needs, and AI-ready
                        modules before you invest in development.
                    </p>
                    <div class="section-actions">
                        <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                            @include('frontend.partials.icon', ['name' => 'calendar'])
                            Book Free Consultation
                        </a>
                        <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer" class="btn btn-secondary">
                            @include('frontend.partials.icon', ['name' => 'whatsapp'])
                            Talk on WhatsApp
                        </a>
                    </div>
                    <div class="trust-strip trust-left">
                        <span class="chip chip-blue">Custom MLM Logic</span>
                        <span class="chip chip-cyan">AI Integration Discussion</span>
                        <span class="chip chip-violet">Mobile App Planning</span>
                    </div>
                </div>

                <div class="cta-highlight-panel">
                    <article class="cta-highlight-card">
                        <span class="cta-highlight-icon">@include('frontend.partials.icon', ['name' => 'ai'])</span>
                        <div>
                            <h3>AI-ready workflows</h3>
                            <p>Explore chatbot support, onboarding guidance, admin insights, and workflow automation.</p>
                        </div>
                    </article>
                    <article class="cta-highlight-card">
                        <span class="cta-highlight-icon">@include('frontend.partials.icon', ['name' => 'wallet'])</span>
                        <div>
                            <h3>Wallet and payout planning</h3>
                            <p>Map commission rules, withdrawal approvals, payout queues, and audit visibility.</p>
                        </div>
                    </article>
                    <article class="cta-highlight-card">
                        <span class="cta-highlight-icon">@include('frontend.partials.icon', ['name' => 'mobile'])</span>
                        <div>
                            <h3>Mobile distributor experience</h3>
                            <p>Design mobile access for income, referrals, team tracking, alerts, and AI support.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
