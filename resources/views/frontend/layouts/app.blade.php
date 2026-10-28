<!DOCTYPE html>
<html lang="en">

<head>
    @php
        $brandName = config('app.name', 'MLM Software');
        $rawTitle = trim($__env->yieldContent('title', $brandName));
        $rawTitle = $rawTitle !== '' ? $rawTitle : $brandName;
        $pageTitle = ($rawTitle === $brandName || \Illuminate\Support\Str::endsWith($rawTitle, " - {$brandName}")) ? $rawTitle: "{$rawTitle} - {$brandName}";
        $description = trim($__env->yieldContent('description','AI-Powered MLM Software Development Company offering Binary MLM, Matrix MLM, Unilevel MLM, Blockchain MLM,Crypto MLM Software, Mobile Apps, Wall Integration, Genealogy, E-commerce and Custom Network Marketing Solutions.'));
        $canonicalUrl = trim($__env->yieldContent('canonical', request()->url()));
        $socialImage = trim($__env->yieldContent('image', ''));
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ $pageTitle }}">
    <meta name="description" content="{{ $description }}">
    <title>{{ $pageTitle }}</title>
    <meta name="keywords" content="AI MLM Software, MLM Software Development Company, Binary MLM Software, Matrix MLM Software, Unilevel MLM Software, Blockchain MLM Software, Crypto MLM Software, Network Marketing Software">
    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <meta name="author" content="MLM Softwares">
    <meta name="publisher" content="MLM Softwares">
    <meta name="theme-color" content="#0b0b0b">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:site_name" content="{{ $brandName }}">
    <meta property="og:description" content="{{ $description }}">
    @if ($socialImage)
        <meta property="og:image" content="{{ $socialImage }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $description }}">
    @if ($socialImage)
        <meta name="twitter:image" content="{{ $socialImage }}">
    @endif
    <link rel="icon" type="image/png" href="{{ asset('favicon/fav.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon/fav.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon/fav.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="bootsstrap" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontendassets/css/frontend.css') }}">
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18261534794"></script>
    
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-18261534794');
    </script>
    
</head>

<body>
    @include('frontend.partials.svg-defs')
    @include('frontend.partials.header')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    @include('frontend.partials.demo-modal')

    <script src="{{ asset('frontendassets/js/frontend.js') }}" defer></script>
    @stack('scripts')
</body>

</html>
