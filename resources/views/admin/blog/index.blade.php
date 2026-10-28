@extends('admin.layouts.main')
@section('title', 'Create Blog')
@section('content')
    @push('head')
        <style>
            .blog-management-page .card-body {
                padding: 20px;
            }

            .blog-management-page .card .card-header {
                flex-wrap: wrap;
                gap: 10px;
                justify-content: space-between;
            }

            .blog-management-page .card .card-header .card-header-right {
                margin-left: auto;
                position: static;
            }

            .blog-form-card,
            .blog-side-card {
                animation: blogCardIn 0.32s ease both;
            }

            .blog-side-card {
                animation-delay: 0.07s;
            }

            .blog-form-label {
                color: #3e5569;
                font-size: 13px;
                font-weight: 700;
                margin-bottom: 8px;
            }

            .blog-input-wrap {
                position: relative;
            }

            .blog-input-wrap>i {
                color: #9aa0ac;
                font-size: 16px;
                left: 13px;
                position: absolute;
                top: 10px;
                z-index: 2;
            }

            .blog-input-wrap .form-control {
                padding-left: 40px;
            }

            .blog-input-wrap textarea.form-control {
                padding-left: 40px;
                min-height: 180px;
                resize: vertical;
            }

            .blog-upload-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 15px;
            }

            .blog-upload-card {
                background: #f6f8fb;
                border: 1px solid #eef1f2;
                border-radius: 4px;
                padding: 15px;
                transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
            }

            .blog-upload-card:hover {
                border-color: #d8dde5;
                box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
                transform: translateY(-2px);
            }

            .blog-upload-card .upload-icon {
                align-items: center;
                background: #ffffff;
                border-radius: 4px;
                color: #19B5FE;
                display: inline-flex;
                font-size: 18px;
                height: 38px;
                justify-content: center;
                margin-bottom: 12px;
                width: 38px;
            }

            .blog-upload-card .form-control {
                background: #ffffff;
                font-size: 12px;
                min-height: 36px;
                padding: 7px 8px;
            }

            .blog-field-hint {
                color: #868e96;
                display: block;
                font-size: 12px;
                margin-top: 6px;
            }

            .blog-submit-btn {
                align-items: center;
                display: inline-flex;
                font-weight: 700;
                gap: 8px;
                padding: 9px 18px;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
            }

            .blog-submit-btn:hover,
            .blog-submit-btn:focus {
                box-shadow: 0 4px 12px rgba(0, 123, 255, 0.18);
                transform: translateY(-1px);
            }

            .blog-side-list {
                margin: 0;
                padding: 0;
            }

            .blog-side-list li {
                align-items: flex-start;
                border-bottom: 1px solid #f1f1f1;
                display: flex;
                gap: 12px;
                list-style: none;
                padding: 14px 0;
            }

            .blog-side-list li:first-child {
                padding-top: 0;
            }

            .blog-side-list li:last-child {
                border-bottom: none;
                padding-bottom: 0;
            }

            .blog-side-list i {
                align-items: center;
                background: #f6f8fb;
                border-radius: 4px;
                color: #19B5FE;
                display: inline-flex;
                flex: 0 0 34px;
                height: 34px;
                justify-content: center;
                width: 34px;
            }

            .blog-side-list strong {
                color: #3e5569;
                display: block;
                font-size: 13px;
                line-height: 1.4;
            }

            .blog-side-list span {
                color: #868e96;
                display: block;
                font-size: 12px;
                line-height: 1.5;
                margin-top: 2px;
            }

            @keyframes blogCardIn {
                from {
                    opacity: 0;
                    transform: translateY(8px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 991.98px) {
                .blog-side-card {
                    animation-delay: 0s;
                }
            }

            @media (max-width: 767.98px) {
                .blog-upload-grid {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 575.98px) {
                .blog-management-page .card-body {
                    padding: 15px;
                }

                .blog-management-page .card .card-header .card-header-right {
                    margin-left: 0;
                    width: 100%;
                }

                .blog-management-page .card .card-header .card-header-right .btn {
                    justify-content: center;
                    width: 100%;
                }

                .blog-submit-btn {
                    justify-content: center;
                    width: 100%;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .blog-form-card,
                .blog-side-card,
                .blog-submit-btn,
                .blog-upload-card {
                    animation: none;
                    transition: none;
                }
            }
        </style>
    @endpush

    <div class="container-fluid blog-management-page">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-edit bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Create Blog') }}</h5>
                            <span>{{ __('Add polished blog content for the website') }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/dashboard') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Admin') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create Blog') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (session()->has('successMsg'))
            <div class="alert alert-success">
                <i class="ik ik-check-circle"></i> {{ session()->get('successMsg') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="ik ik-alert-circle"></i> {{ __('Please review the highlighted fields and try again.') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="card blog-form-card">
                    <div class="card-header">
                        <h3>{{ __('Blog Information') }}</h3>
                        <div class="card-header-right">
                            <a href="{{ route('admin.blog.details') }}" class="btn btn-primary btn-sm">
                                <i class="ik ik-list"></i> {{ __('All Blogs') }}
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title" class="blog-form-label">{{ __('Title') }}</label>
                                <div class="blog-input-wrap">
                                    <i class="ik ik-edit-2"></i>
                                    <input type="text" name="title" id="title" class="form-control"
                                        value="{{ old('title') }}" required placeholder="{{ __('Enter blog title') }}">
                                </div>
                                @error('title')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="text" class="blog-form-label">{{ __('Content') }}</label>
                                <div class="blog-input-wrap">
                                    <i class="ik ik-file-text"></i>
                                    <textarea name="text" id="text" class="form-control" rows="8" required
                                        placeholder="{{ __('Write blog content') }}">{{ old('text') }}</textarea>
                                </div>
                                @error('text')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="social_url" class="blog-form-label">{{ __('Social Media URL') }}</label>
                                <div class="blog-input-wrap">
                                    <i class="ik ik-link"></i>
                                    <input type="url" name="social_url" id="social_url" class="form-control"
                                        value="{{ old('social_url') }}" placeholder="https://example.com">
                                </div>
                                @error('social_url')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label class="blog-form-label">{{ __('Blog Images') }}</label>
                                <div class="blog-upload-grid">
                                    <div class="blog-upload-card">
                                        <span class="upload-icon"><i class="ik ik-image"></i></span>
                                        <label for="img1" class="blog-form-label d-block">{{ __('Primary Image') }}</label>
                                        <input type="file" name="img1" id="img1" class="form-control"
                                            accept=".png,.jpg,.jpeg,.jfif" required>
                                        @error('img1')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="blog-upload-card">
                                        <span class="upload-icon"><i class="ik ik-image"></i></span>
                                        <label for="img2" class="blog-form-label d-block">{{ __('Image 2') }}</label>
                                        <input type="file" name="img2" id="img2" class="form-control"
                                            accept=".png,.jpg,.jpeg,.jfif">
                                        @error('img2')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="blog-upload-card">
                                        <span class="upload-icon"><i class="ik ik-image"></i></span>
                                        <label for="img3" class="blog-form-label d-block">{{ __('Image 3') }}</label>
                                        <input type="file" name="img3" id="img3" class="form-control"
                                            accept=".png,.jpg,.jpeg,.jfif">
                                        @error('img3')
                                            <span class="text-danger small">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary blog-submit-btn">
                                <i class="ik ik-save"></i> {{ __('Save Blog') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12">
                <div class="card blog-side-card">
                    <div class="card-header">
                        <h3>{{ __('Publishing Details') }}</h3>
                    </div>
                    <div class="card-body">
                        <ul class="blog-side-list">
                            <li>
                                <i class="ik ik-tag"></i>
                                <div>
                                    <strong>{{ __('Category') }}</strong>
                                    <span>{{ __('Blog') }}</span>
                                </div>
                            </li>
                            <li>
                                <i class="ik ik-check-circle"></i>
                                <div>
                                    <strong>{{ __('Status') }}</strong>
                                    <span>{{ __('Published after saving') }}</span>
                                </div>
                            </li>
                            <li>
                                <i class="ik ik-image"></i>
                                <div>
                                    <strong>{{ __('Media') }}</strong>
                                    <span>{{ __('One primary image is required; two additional images are optional.') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
