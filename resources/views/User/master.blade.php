<!doctype html>
<html lang="en" dir="ltr" data-bs-theme="dark">


<head>

    @php
        $defaultSiteName = $siteSetting?->site_name ?? 'Ahmad Yasser';

        $seoTitle = trim($__env->yieldContent('seo_title')) ?: $siteSetting?->meta_title ?? $defaultSiteName;

        $seoDescription =
            trim($__env->yieldContent('seo_description')) ?: $siteSetting?->meta_description ?? 'Portfolio website';

        $seoKeywords = trim($__env->yieldContent('seo_keywords')) ?: $siteSetting?->keywords ?? '';

        $seoImageSection = trim($__env->yieldContent('seo_image'));

        $seoImage =
            $seoImageSection ?:
            ($siteSetting?->logo
                ? asset('storage/' . $siteSetting->logo)
                : asset('assets/logo/logo.png'));

        $seoUrl = trim($__env->yieldContent('seo_url')) ?: url()->current();

        $seoType = trim($__env->yieldContent('seo_type')) ?: 'website';
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ $seoTitle }}</title>

    <meta name="description" content="{{ $seoDescription }}">

    @if ($seoKeywords)
        <meta name="keywords" content="{{ $seoKeywords }}">
    @endif

    <meta name="author" content="{{ $defaultSiteName }}">

    <meta name="robots" content="index, follow">

    <meta name="googlebot" content="index, follow">

    <meta name="theme-color" content="#ea580c">


    <title>
        {{ $siteSetting?->meta_title ?? ($siteSetting?->site_name ?? 'Ahmad Yasser') }}
    </title>


    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/logo/apple-touch-icon.png') }}">


    @if ($siteSetting?->favicon)
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $siteSetting->favicon) }}">

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('storage/' . $siteSetting->favicon) }}">

        <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $siteSetting->favicon) }}">
    @else
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/logo/favicon-32x32.png') }}">

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/logo/favicon-16x16.png') }}">

        <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/favicon.ico') }}">
    @endif


    <link rel="manifest" href="{{ asset('assets/logo/site.webmanifest') }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/libraries/glide/css/glide.core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libraries/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('css')

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:image:alt" content="{{ $seoTitle }}">
    <meta property="og:url" content="{{ $seoUrl }}">
    <meta property="og:type" content="{{ $seoType }}">
    <meta property="og:site_name" content="{{ $defaultSiteName }}">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    <link href="{{ asset('adminasset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link rel="canonical" href="{{ $seoUrl }}">


    <script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Person',
    'name' => $defaultSiteName,
    'url' => route('home'),
    'image' => $seoImage,
    'email' => $siteSetting?->email
        ? 'mailto:' . $siteSetting->email
        : null,
    'telephone' => $siteSetting?->phone,
    'address' => $siteSetting?->address
        ? [
            '@type' => 'PostalAddress',
            'addressLocality' => $siteSetting->address,
        ]
        : null,
    'sameAs' => isset($socialLinks)
        ? $socialLinks->pluck('url')->values()->all()
        : [],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>


</head>

<body>


    <!-- loader-wrapper -->
    <div class="loader-wrapper">
        <div class="spinner-grow text-primary p-5" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <!-- header top -->
    <div class="navigation position-absolute w-100 rounded-bottom-3 rounded-bottom-sm-4">
        <nav class="navbar navbar-expand-xl px-2" aria-label="Offcanvas navbar large">
            <div class="container px-3 py-2">
                <a class="navbar-brand p-1" href="{{ route('home') }}">
                    @if ($siteSetting?->logo)
                        <img src="{{ asset('storage/' . $siteSetting->logo) }}" height="32"
                            alt="{{ $siteSetting->site_name ?? 'Website Logo' }}">
                    @else
                        <img src="{{ asset('assets/logo/logo.png') }}" height="32" alt="Logo">
                    @endif

                    <strong class="text-body-emphasis fw-bolder fst-italic">

                        {{ $siteSetting?->site_name ?? 'Ahmad Yasser' }}

                    </strong>

                </a>

                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="toggler-icon top-bar"></span>
                    <span class="toggler-icon middle-bar"></span>
                    <span class="toggler-icon bottom-bar"></span>
                </button>

                <div class="offcanvas offcanvas-bottom rounded-top-5 h-auto" tabindex="-1" id="offcanvasNavbar2"
                    aria-labelledby="offcanvasNavbar2Label">
                    <div class="offcanvas-header px-4 pt-4 pb-4">
                        <h5 class="offcanvas-title m-0" id="offcanvasNavbar2Label">
                            <a class="navbar-brand px-2 py-1" href="javascript:;">
                                @if ($siteSetting?->logo)
                                    <img src="{{ asset('storage/' . $siteSetting->logo) }}" height="32"
                                        alt="{{ $siteSetting->site_name ?? 'Website Logo' }}">
                                @else
                                    <img src="{{ asset('assets/logo/logo.png') }}" height="32" alt="Logo">
                                @endif

                                <strong class="text-body-emphasis fw-bolder fst-italic">
                                    {{ $siteSetting->site_name ?? 'Ahmad Yasser' }}
                                </strong>
                            </a>
                        </h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>

                    <div class="offcanvas-body">
                        <ul
                            class="navbar-nav align-items-xl-center justify-content-center flex-grow-1 column-gap-4 row-gap-4">

                            @foreach ($navigationItems as $item)
                                <li class="nav-item {{ $loop->first ? 'ms-xl-auto' : '' }}"
                                    data-bs-dismiss="offcanvas">

                                    @php
                                        $itemUrl = str_starts_with($item->url, 'http') ? $item->url : url($item->url);
                                    @endphp

                                    <a href="{{ $itemUrl }}"
                                        class="nav-link rounded-3 px-3 text-base fw-semibold leading-6 text-body-emphasis bg-body-secondary-hover"
                                        @if (str_starts_with($item->url, 'http')) target="_blank"
                    rel="noopener noreferrer" @endif>

                                        {{ $item->title }}

                                    </a>

                                </li>
                            @endforeach


                            @if (!request()->routeIs('contact') && ($siteSetting?->navbar_button_active ?? true) && $siteSetting?->cv_file)
                                <li class="nav-item ms-xl-auto" data-bs-dismiss="offcanvas">

                                    <a href="{{ route('cv.download') }}"
                                        class="btn btn-primary text-white btn-lg rounded-3 px-3 text-base fw-semibold leading-6 w-100">

                                        <i class="fas fa-download mr-2"></i>

                                        {{ $siteSetting?->navbar_button_text ?? 'Download CV' }}

                                    </a>

                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>



    <!-- Call to action -->
    <div class="pb-3 pt-7">
        <div class="container">
            @yield('content')
            @if (
    !request()->routeIs('contact') &&
    isset($cta) &&
    $cta
)

    @php
        $ctaLink = $cta->button_link;

        $ctaUrl =
            str_starts_with($ctaLink, 'http://') ||
            str_starts_with($ctaLink, 'https://') ||
            str_starts_with($ctaLink, 'mailto:') ||
            str_starts_with($ctaLink, 'tel:')
                ? $ctaLink
                : url($ctaLink);

        $isExternalCta =
            str_starts_with($ctaLink, 'http://') ||
            str_starts_with($ctaLink, 'https://');

        $ctaBackground = $cta->background_image
            ? asset('storage/' . $cta->background_image)
            : asset('assets/img/bg/bg10.jpg');
    @endphp

    <div class="pb-3 pt-7">

        <div class="container">

            <div class="py-6 position-relative text-white rounded-3 rounded-sm-4 rounded-xl-5 shadow overflow-hidden">

                <img src="{{ $ctaBackground }}"
                    class="position-absolute z-n1 top-0 start-0 h-100 w-100 object-fit-cover"
                    loading="lazy"
                    alt="{{ $cta->title }}">

                <div class="position-absolute z-n1 top-0 start-0 h-100 w-100 bg-dark"
                    style="opacity: 0.85;
                        mix-blend-mode: multiply;
                        filter: contrast(1.15) brightness(0.85);">
                </div>

                <div class="px-4 px-sm-6">

                    <div class="mx-auto max-w-2xl">

                        <h2 class="m-0 tracking-tight text-4xl fw-bold text-center">

                            {{ $cta->title }}

                        </h2>

                        @if ($cta->description)

                            <p class="m-0 mt-4 text-lg leading-8 text-center">

                                {{ $cta->description }}

                            </p>

                        @endif

                        <div class="mt-4 pt-3 text-center">

                            <a href="{{ $ctaUrl }}"
                                class="btn btn-lg btn-primary text-white text-sm fw-semibold"
                                @if ($isExternalCta)
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif>

                                {{ $cta->button_text }}

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endif
    <div class="container">
        <hr class="my-2 text-body-emphasis opacity-10">
    </div>


    <footer class="container py-4">
        <div class="d-flex flex-column flex-md-row gap-4 justify-content-md-between align-items-md-center">
            {{-- <p class="text-body-tertiary text-xs leading-5 mb-0">
                © {{ date('Y') }} Ahmad Yasser. All rights reserved.
            </p> --}}

            <div>

                @if ($siteSetting?->footer_text)
                    <p class="text-body-tertiary text-xs leading-5 mb-1">
                        {{ $siteSetting->footer_text }}
                    </p>
                @endif

                <p class="text-body-tertiary text-xs leading-5 mb-0">

                    {{ $siteSetting?->copyright ?? '© ' . date('Y') . ' Ahmad Yasser. All rights reserved.' }}

                </p>

            </div>

            <div class="order-first order-md-last">

                @if (isset($socialLinks) && $socialLinks->isNotEmpty())

                    <div class="d-flex align-items-center flex-wrap gap-3">

                        @foreach ($socialLinks as $socialLink)
                            <a href="{{ $socialLink->url }}" target="_blank" rel="noopener noreferrer"
                                class="text-body-secondary text-body-emphasis-hover"
                                title="{{ $socialLink->platform }}" aria-label="{{ $socialLink->platform }}">

                                @if ($socialLink->icon)
                                    <i class="{{ $socialLink->icon }} fa-lg"></i>
                                @else
                                    {{ $socialLink->platform }}
                                @endif

                            </a>
                        @endforeach

                    </div>

                @endif
            </div>
        </div>
    </footer>


    <!-- Back to top button -->
    <button type="button"
        class="btn btn-primary btn-back-to-top rounded-circle justify-content-center align-items-center p-2 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
            class="bi bi-arrow-up-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5" />
        </svg>
    </button>



    <!-- Bootstrap JavaScript: Bundle with Popper -->
    <script src="{{ asset('assets/libraries/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libraries/glide/glide.min.js') }}"></script>
    <script src="{{ asset('assets/libraries/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    @yield('js')


</body>

</html>
