@extends('frontend.layouts.app')

@section('title', 'MLM Software Blog')
@section('description', 'Read insights about MLM software, compensation plans, wallets, payouts, mobile apps, AI integration, and direct selling platform growth.')

@section('content')
    <section class="blog-main-section" aria-labelledby="blogTitle">
        <div class="container">
            <div class="blog-header reveal">
                <img src="{{ asset('logo/logo.png') }}" alt="MLM Software company logo" class="blog-page-logo">
                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'file']) Insights and resources</span>
                <h1 id="blogTitle">MLM Software Blog</h1>
                <p class="lead lead-center">
                    Practical ideas for MLM software development, AI-ready workflows, compensation plans, wallets,
                    payouts, mobile apps, and scalable direct selling platforms.
                </p>
            </div>

            <div class="blog-grid">
                @forelse($blogs as $blog)
                    <article class="blog-card reveal" onclick="window.location.href='{{ route('frontend.blog.details', \Illuminate\Support\Str::slug($blog->title)) }}'">
                        <div class="blog-image-wrap">
                            @if ($blog->primary_image_url)
                                <img src="{{ $blog->primary_image_url }}" alt="{{ $blog->title }}" class="blog-image" loading="lazy">
                            @else
                                <div class="blog-image-placeholder">
                                    @include('frontend.partials.icon', ['name' => 'file'])
                                </div>
                            @endif

                            @if (!empty($blog->social_url))
                                <a href="{{ $blog->social_url }}" target="_blank" rel="noopener noreferrer" class="social-icon-badge"
                                    onclick="event.stopPropagation();" aria-label="Open social post">
                                    @include('frontend.partials.icon', ['name' => 'spark'])
                                </a>
                            @endif
                        </div>

                        <div class="blog-card-body">
                            <span class="blog-category">MLM software</span>
                            <h2 class="blog-title">{{ $blog->title }}</h2>
                            <div class="blog-meta">
                                <span>Admin</span>
                                <span>/</span>
                                <span>{{ $blog->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="blog-text">
                                {{ \Illuminate\Support\Str::limit(strip_tags($blog->text), 120, '...') }}
                            </p>
                            <div class="blog-card-cta">
                                <a href="{{ route('frontend.blog.details', \Illuminate\Support\Str::slug($blog->title)) }}" class="blog-btn"
                                    onclick="event.stopPropagation();">
                                    Read More
                                    @include('frontend.partials.icon', ['name' => 'file'])
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="blog-empty-state reveal">
                        <h2>No blogs found</h2>
                        <p>Check back later for MLM software, mobile app, payout, and AI integration insights.</p>
                        <a href="{{ route('frontend.contact') }}" class="btn btn-primary">Talk to Software Expert</a>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
