@extends('frontend.layouts.app')

@section('title', $blog->title)
@section('description', \Illuminate\Support\Str::limit(strip_tags($blog->text), 150))
@section('image', $blog->primary_image_url ?? '')

@section('content')
    <article class="blog-detail-shell">
        <section class="blog-detail-hero">
            <div class="container">
                <div class="blog-detail-head reveal">
                    <div class="blog-hero-logo">
                        <img src="{{ asset('logo/logo.png') }}" alt="MLM Software company logo">
                    </div>

                    <a href="{{ route('frontend.blog') }}" class="blog-breadcrumb">
                        @include('frontend.partials.icon', ['name' => 'grid'])
                        Back to Blogs
                    </a>

                    <h1>{{ $blog->title }}</h1>

                    <div class="blog-meta blog-detail-meta">
                        <span>Admin</span>
                        <span>/</span>
                        <span>{{ $blog->created_at->format('M d, Y') }}</span>
                    </div>

                    <p class="lead lead-center">
                        {{ $article['lead'] ?? \Illuminate\Support\Str::limit(strip_tags($blog->text), 180) }}
                    </p>
                </div>
            </div>
        </section>

        <section class="section section-white blog-article-section">
            <div class="container blog-article-wrap">
                <div class="blog-article-content">
                    @include('frontend.partials.blog-article-content', ['article' => $article])
                </div>

                @if ($recentBlogs->isNotEmpty())
                    <aside class="related-blogs reveal">
                        <div class="related-heading">
                            <div>
                                <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'file']) Related Blogs</span>
                                <h2>More posts you may like</h2>
                            </div>
                            <a href="{{ route('frontend.blog') }}" class="btn btn-secondary btn-sm">View All</a>
                        </div>
                        <div class="related-blog-list">
                            @foreach ($recentBlogs as $recentBlog)
                                <a href="{{ route('frontend.blog.details', \Illuminate\Support\Str::slug($recentBlog->title)) }}">
                                    @if ($recentBlog->primary_image_url)
                                        <img src="{{ $recentBlog->primary_image_url }}" alt="{{ $recentBlog->title }}" loading="lazy">
                                    @else
                                        <span class="related-image-placeholder">
                                            @include('frontend.partials.icon', ['name' => 'file'])
                                        </span>
                                    @endif
                                    <span>{{ $recentBlog->created_at->format('M d, Y') }}</span>
                                    <strong>{{ $recentBlog->title }}</strong>
                                    <em>Read More</em>
                                </a>
                            @endforeach
                        </div>
                    </aside>
                @endif

                <section class="blog-project-form reveal">
                    <div class="form-heading">
                        <span class="eyebrow">@include('frontend.partials.icon', ['name' => 'calendar']) Project inquiry</span>
                        <h2>Need MLM software for your business?</h2>
                        <p>Share your project details and our team will connect with you about MLM software, mobile apps, payouts, or AI integration.</p>
                    </div>

                    @if (session('successMsg'))
                        <div class="blog-form-success" id="successMessage">
                            {{ session('successMsg') }}
                        </div>
                    @endif

                    <form action="{{ route('frontend.blog-project-details') }}" method="POST" class="blog-form-grid">
                        @csrf
                        <div class="form-field">
                            <label for="blogName">Name</label>
                            <input id="blogName" type="text" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="blogEmail">Email</label>
                            <input id="blogEmail" type="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="blogMobile">Mobile</label>
                            <input id="blogMobile" type="text" name="mobile" value="{{ old('mobile') }}" required>
                            @error('mobile')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="blogCountry">Country</label>
                            <input id="blogCountry" type="text" name="country" value="{{ old('country') }}" required>
                            @error('country')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-field">
                            <label for="blogPlan">Plan</label>
                            <select id="blogPlan" name="plan" required>
                                <option value="">Select plan</option>
                                <option value="Binary Plan" @selected(old('plan') === 'Binary Plan')>Binary Plan</option>
                                <option value="Matrix Plan" @selected(old('plan') === 'Matrix Plan')>Matrix Plan</option>
                                <option value="Unilevel Plan" @selected(old('plan') === 'Unilevel Plan')>Unilevel Plan</option>
                                <option value="Board Plan" @selected(old('plan') === 'Board Plan')>Board Plan</option>
                                <option value="Generation Plan" @selected(old('plan') === 'Generation Plan')>Generation Plan</option>
                                <option value="Crypto Plan" @selected(old('plan') === 'Crypto Plan')>Crypto Plan</option>
                                <option value="Custom MLM Plan" @selected(old('plan') === 'Custom MLM Plan')>Custom MLM Plan</option>
                            </select>
                            @error('plan')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <!--<div class="form-field">-->
                        <!--    <label for="blogBudget">Budget</label>-->
                        <!--    <select id="blogBudget" name="budget" required>-->
                        <!--        <option value="">Select budget</option>-->
                        <!--        <option value="Under $1,000" @selected(old('budget') === 'Under $1,000')>Under $1,000</option>-->
                        <!--        <option value="$1,000 - $3,000" @selected(old('budget') === '$1,000 - $3,000')>$1,000 - $3,000</option>-->
                        <!--        <option value="$3,000 - $5,000" @selected(old('budget') === '$3,000 - $5,000')>$3,000 - $5,000</option>-->
                        <!--        <option value="$5,000+" @selected(old('budget') === '$5,000+')>$5,000+</option>-->
                        <!--    </select>-->
                        <!--    @error('budget')-->
                        <!--        <small>{{ $message }}</small>-->
                        <!--    @enderror-->
                        <!--</div>-->

                        <div class="form-field form-field-full">
                            <label>Required Modules</label>
                            <div class="module-options">
                                <label><input type="checkbox" name="modules[]" value="Wallet"> Wallet</label>
                                <label><input type="checkbox" name="modules[]" value="E-commerce"> E-commerce</label>
                                <label><input type="checkbox" name="modules[]" value="Mobile Apps"> Mobile Apps</label>
                                <label><input type="checkbox" name="modules[]" value="Crypto"> Crypto</label>
                                <label><input type="checkbox" name="modules[]" value="AI Integration"> AI Integration</label>
                            </div>
                        </div>

                        <div class="form-field form-field-full">
                            <label for="blogNotes">Project Details</label>
                            <textarea id="blogNotes" name="notes" rows="4" placeholder="Tell us about your MLM software requirement, mobile app, payout flow, or AI module.">{{ old('notes') }}</textarea>
                        </div>

                        <div class="form-field-full">
                            <button type="submit" class="blog-submit-btn">
                                Submit Project Details
                                @include('frontend.partials.icon', ['name' => 'calendar'])
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </article>
@endsection
