@php
    $navItems = [
        ['label' => 'Home', 'route' => 'frontend.home'],
        ['label' => 'Services', 'route' => 'frontend.services'],
        ['label' => 'About Us', 'route' => 'frontend.about'],
        ['label' => 'Mobile App', 'route' => 'frontend.mobile-app'],
        ['label' => 'Blog', 'route' => 'frontend.blog'],
        ['label' => 'Contact', 'route' => 'frontend.contact'],
    ];
@endphp

<header class="topbar">
    <nav class="nav-shell" aria-label="Primary navigation">
        <div class="nav-inner">
            <a href="{{ route('frontend.home') }}" class="brand" aria-label="MLM Software home">
                <img src="{{ asset('logo/logo.png') }}" alt="MLM Software company logo" width="200" height="60">
            </a>

            <div class="nav-links" aria-label="Desktop navigation">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}" data-nav-link @class(['active' => request()->routeIs($item['route'])])>
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('frontend.home') }}#ai-integration" class="nav-ai-link" data-nav-link>
                    @include('frontend.partials.icon', ['name' => 'ai'])
                    AI Integration
                    <span class="nav-badge">NEW</span>
                </a>
            </div>

            <div class="nav-actions">
                <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer"
                    class="btn btn-secondary btn-sm btn-whatsapp">
                    @include('frontend.partials.icon', ['name' => 'whatsapp'])
                    Talk To Sales
                </a>
                <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary btn-sm">
                    @include('frontend.partials.icon', ['name' => 'calendar'])
                    Book AI Demo
                </a>
            </div>

            <button class="menu-toggle" type="button" aria-label="Open menu" aria-expanded="false" data-menu-button>
                <span></span>
            </button>

        </div>

        <div class="mobile-panel" data-mobile-menu>
            <div class="mobile-links">
                @foreach ($navItems as $item)
                    <a href="{{ route($item['route']) }}" data-nav-link @class(['active' => request()->routeIs($item['route'])])>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
                <a href="{{ route('frontend.home') }}#ai-integration" class="nav-ai-link" data-nav-link>
                    <span>AI Integration</span>
                    <span class="nav-badge">NEW</span>
                </a>
                <a href="https://wa.me/+919058521613" target="_blank" rel="noopener noreferrer"
                    class="btn btn-whatsapp">
                    @include('frontend.partials.icon', ['name' => 'whatsapp'])
                    Talk on WhatsApp
                </a>
                <a href="{{ route('frontend.contact') }}#consultation" class="btn btn-primary">
                    @include('frontend.partials.icon', ['name' => 'calendar'])
                    Book AI Demo
                </a>
            </div>
        </div>
    </nav>
</header>
