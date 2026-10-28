<footer class="footer">
    <div class="container footer-grid">
        <div>
            <a href="{{ route('frontend.home') }}" class="brand" aria-label="MLM Software home">
                <img src="{{ asset('logo/logo.png') }}" alt="MLM Software company logo">
                <span class="brand-text">
                    {{-- <strong>MLM Software</strong>
                    <span>AI-ready MLM platforms</span> --}}
                </span>
            </a>
            <p>
                We build premium MLM software, distributor dashboards, wallet and payout systems, mobile apps, and
                custom AI modules for modern network marketing businesses.
            </p>
            <div class="footer-badges" aria-label="Trust badges">
                <span class="tag">AI Ready</span>
                <span class="tag">Secure Wallets</span>
                <span class="tag">Mobile App Ready</span>
            </div>
            <div class="social-row" aria-label="Social links">
                <a href="https://www.linkedin.com/in/mlm-softwares-899165415/" target="_blank"
                    aria-label="LinkedIn">@include('frontend.partials.icon', ['name' => 'linkedin'])</a>
                <a href="#" aria-label="X">@include('frontend.partials.icon', ['name' => 'x'])</a>
                <a href="https://www.facebook.com/profile.php?id=61590049440335" target="_blank"
                    rel="noopener noreferrer" aria-label="Facebook">@include('frontend.partials.icon', ['name' => 'facebook'])</a>
                <a href="https://www.youtube.com/@MLMSoftware-MLM" target="_blank" rel="noopener noreferrer"
                    aria-label="YouTube">@include('frontend.partials.icon', ['name' => 'youtube'])</a>
                <a href="https://www.instagram.com/ai_mlm_softwares.1982?igsh=N3pzbzlqZWRvZHBr"
                    aria-label="Instagram">@include('frontend.partials.icon', ['name' => 'instagram'])</a>
            </div>
        </div>

        <div>
            <h4>Company</h4>
            <div class="footer-links">
                <a href="{{ route('frontend.home') }}">Home</a>
                <a href="{{ route('frontend.services') }}">Services</a>

                <a href="{{ route('frontend.about') }}">About Us</a>
                <a href="{{ route('frontend.blog') }}">Blog</a>
                <a href="{{ route('frontend.contact') }}">Contact</a>
            </div>
        </div>

        <div>
            <h4>MLM Services</h4>
            <div class="footer-links">
                <a href="{{ route('frontend.services') }}#compensation">Binary MLM Software</a>
                <a href="{{ route('frontend.services') }}#compensation">Matrix MLM Software</a>
                <a href="{{ route('frontend.services') }}#compensation">Unilevel MLM Software</a>
                <a href="{{ route('frontend.services') }}#business-modules">Wallet and Payout System</a>
                <a href="{{ route('frontend.services') }}#ai-integration">AI Integration Services</a>
                <a href="{{ route('frontend.mobile-app') }}">Mobile MLM Apps</a>
            </div>
        </div>

        <div>
            <h4>Start a Project</h4>
            <div class="footer-links">
                <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer">WhatsApp: +91 905 852
                    1613</a>
                <a href="https://wa.me/+918979703005" target="_blank" rel="noopener noreferrer">Sales: +91 897 970
                    3005</a>
                <a href="mailto:support@mlmsoftwares.org">support@mlmsoftwares.org</a>
                <a href="{{ route('frontend.contact') }}#consultation">Book Free Consultation</a>
                <a href="{{ route('frontend.home') }}#ai-integration">Discuss AI Integration</a>
            </div>
            <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary btn-sm footer-cta-button">
                @include('frontend.partials.icon', ['name' => 'calendar'])
                Request Demo
            </a>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container footer-bottom-inner">
            <span>&copy; {{ date('Y') }} MLM Software. All rights reserved.</span>
            <div class="footer-bottom-links">
                <a href="{{ route('frontend.contact') }}">Consultation</a>
                <a href="{{ route('frontend.services') }}#ai-integration">AI Modules</a>

            </div>
        </div>
    </div>
</footer>
