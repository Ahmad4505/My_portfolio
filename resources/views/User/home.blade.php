@extends('User.master')

@section('seo_title', $siteSetting?->meta_title ?? 'Ahmad Yasser | Software Engineer & Laravel Developer')

@section('seo_description',
    $siteSetting?->meta_description ??
    'Portfolio of Ahmad Yasser, a Software Engineer and
    Laravel Developer specializing in modern web applications.')

@section('seo_keywords',
    $siteSetting?->keywords ??
    'Laravel Developer, PHP Developer, Software Engineer, Web Developer,
    Portfolio')

@section('seo_type', 'website')


@section('content')


    @if ($hero)
        <!-- Hero -->
        <div id="home" class="d-flex align-items-center position-relative">

            <div class="container">

                <div class="pt-3 pb-5 pt-lg-4 pb-lg-6">

                    <div class="row gy-5 align-items-center justify-content-between">

                        {{-- Hero Content --}}
                        <div class="col-12 col-xl-6 text-center text-xl-start order-xl-last order-2 order-xl-1">

                            <div class="max-w-2xl mx-auto mx-xl-0 py-5 py-xl-0">

                                {{-- Badge --}}
                                @if ($hero->badge)
                                    <span
                                        class="badge border text-body-emphasis d-inline-flex align-items-center justify-content-between gap-2 rounded-pill fw-medium bg-body-tertiary">

                                        <svg class="text-success" viewBox="0 0 6 6" aria-hidden="true" fill="currentColor"
                                            width="0.375rem" height="0.375rem">

                                            <circle cx="3" cy="3" r="3"></circle>

                                        </svg>

                                        {{ $hero->badge }}

                                    </span>
                                @endif

                                {{-- Title --}}

                                <h1 class="hero-title m-0 mt-4 fw-bold text-body-emphasis" data-aos="fade"
                                    data-aos-duration="1000">

                                    {!! nl2br(e($hero->title)) !!}

                                </h1>

                                {{-- Subtitle --}}
                                @if ($hero->subtitle)
                                    <h2 class="mt-4 text-body-emphasis fw-bold text-xl leading-8" data-aos-delay="50"
                                        data-aos="fade" data-aos-duration="1000">

                                        {{ $hero->subtitle }}

                                    </h2>
                                @endif

                                {{-- Description --}}
                                @if ($hero->description)
                                    <p class="m-0 mt-5 text-lg leading-8 text-white-50 max-w-2xl" data-aos-delay="100"
                                        data-aos="fade" data-aos-duration="1000">

                                        {{ $hero->description }}

                                    </p>
                                @endif

                                {{-- Button --}}
                                @if ($hero->button_text && $hero->button_link)
                                    <div class="mt-4 pt-3" data-aos-delay="200" data-aos="fade" data-aos-duration="1000">

                                        <a href="{{ $hero->button_link }}"
                                            class="btn btn-lg btn-primary text-white text-sm fw-semibold">

                                            {{ $hero->button_text }}

                                        </a>

                                    </div>
                                @endif

                            </div>

                        </div>

                        {{-- Hero Image --}}
                        <div class="col-12 col-xl-5 order-1 order-xl-2" data-aos-delay="0" data-aos="fade"
                            data-aos-duration="1000">

                            <div class="max-w-2xl mx-auto mx-xl-0">

                                <div class="ratio" style="--bs-aspect-ratio: 76.66%;">

                                    @if ($hero->image)
                                        <img src="{{ asset('storage/' . $hero->image) }}"
                                            class="img-fluid object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                            alt="{{ $hero->title }}">
                                    @else
                                        <img src="{{ asset('assets/img/bg/2.png') }}"
                                            class="img-fluid object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                            alt="{{ $hero->title }}">
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    @endif




    {{-- Skills --}}
    @if (isset($skills) && $skills->isNotEmpty())
        <div id="skills" class="overflow-hidden py-5 py-lg-6">

            <div class="container">

                {{-- Section Heading --}}
                <div class="mb-5 mb-sm-6 mb-xl-7">

                    <div class="mx-auto max-w-2xl text-center">

                        <h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
                            My Skills
                        </h2>

                        <p class="m-0 mt-2 text-body-emphasis text-4xl tracking-tight fw-bold">
                            Technologies I Work With.
                        </p>

                        <p class="m-0 mt-4 text-body-secondary text-lg leading-8">
                            A collection of technologies and tools I use to build modern,
                            scalable and reliable web applications.
                        </p>

                    </div>

                </div>





                {{-- Skills List --}}
                <div class="row row-cols-1 row-cols-md-2 gy-4 gx-lg-5">

                    @foreach ($skills as $skill)
                        <div class="col" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 2) * 100 }}"
                            data-aos-duration="1000">

                            <div class="h-100 p-4 p-xl-5 bg-body-tertiary rounded-3 rounded-sm-4 rounded-xl-5">

                                {{-- Skill Header --}}
                                <div class="d-flex align-items-center justify-content-between gap-3 mb-4">

                                    <div class="d-flex align-items-center gap-3">

                                        @if ($skill->icon)
                                            <div class="d-flex align-items-center justify-content-center bg-body rounded-3 shadow-sm"
                                                style="width: 52px; height: 52px; flex-shrink: 0;">

                                                <i class="{{ $skill->icon }} text-primary fs-4"></i>

                                            </div>
                                        @endif

                                        <h3 class="m-0 text-body-emphasis text-lg leading-6 fw-semibold">
                                            {{ $skill->name }}
                                        </h3>

                                    </div>

                                    <span class="text-primary fw-bold text-lg">
                                        {{ $skill->percentage }}%
                                    </span>

                                </div>

                                {{-- Progress Bar --}}
                                <div class="progress bg-body" role="progressbar" aria-label="{{ $skill->name }}"
                                    aria-valuenow="{{ $skill->percentage }}" aria-valuemin="0" aria-valuemax="100"
                                    style="height: 10px;">

                                    <div class="progress-bar rounded-pill" style="width: {{ $skill->percentage }}%;">
                                    </div>

                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>
    @endif



    <!-- projects -->
    {{-- <div id="projects" class="overflow-hidden py-5 py-lg-6 ">
        <div class="container">
            <div class="mb-5 mb-sm-6 mb-xl-7">
                <div class="max-w-xl">
                    <h2 class="m-0 mt-2 fw-bold tracking-tight text-primary-emphasis text-4xl">
                        Projects
                    </h2>
                </div>
            </div>

            <div class="row gy-5 gx-sm-5 row-cols-1 row-cols-sm-2">
                <div class="col" data-aos-delay="0" data-aos="fade" data-aos-duration="1000">
                    <div class="position-relative pt-4">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('assets/img/bg/bg2.jpg') }}"
                                class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5" alt="tempalte" loading="lazy">
                        </div>
                        <a href="javascript:;"
                            class="mt-4 d-block text-xl fw-medium tracking-tight text-decoration-none text-body-tertiary text-body-emphasis-hover stretched-link">
                            Back-End Systems Development
                        </a>
                    </div>
                </div>

                <div class="col" data-aos-delay="100" data-aos="fade" data-aos-duration="1000">
                    <div class="position-relative pt-4">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('assets/img/bg/bg3.jpg') }}"
                                class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5" alt="tempalte"
                                loading="lazy">
                        </div>
                        <a href="javascript:;"
                            class="mt-4 d-block text-xl fw-medium tracking-tight text-decoration-none text-body-tertiary text-body-emphasis-hover stretched-link">
                            Front-End Development
                        </a>
                    </div>
                </div>

                <div class="col" data-aos-delay="0" data-aos="fade" data-aos-duration="1000">
                    <div class="position-relative pt-4">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('assets/img/bg/bg4.jpg') }}"
                                class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5" alt="tempalte"
                                loading="lazy">
                        </div>
                        <a href="javascript:;"
                            class="mt-4 d-block text-xl fw-medium tracking-tight text-decoration-none text-body-tertiary text-body-emphasis-hover stretched-link">
                            User Interface Design
                        </a>
                    </div>
                </div>

                <div class="col" data-aos-delay="100" data-aos="fade" data-aos-duration="1000">
                    <div class="position-relative pt-4">
                        <div class="ratio ratio-4x3">
                            <img src="{{ asset('assets/img/bg/bg5.jpg') }}"
                                class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5" alt="tempalte"
                                loading="lazy">
                        </div>
                        <a href="javascript:;"
                            class="mt-4 d-block text-xl fw-medium tracking-tight text-decoration-none text-body-tertiary text-body-emphasis-hover stretched-link">
                            Database Management
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-5 mt-sm-6 mt-xl-7 pt-5 d-flex align-items-center justify-content-center column-gap-3">
                <a href="/projects" class="btn btn-lg btn-primary text-white text-sm fw-semibold">
                    Show more
                </a>
            </div>
        </div>
    </div> --}}

    {{-- Projects --}}
    @if (isset($projects) && $projects->isNotEmpty())

        <div id="projects" class="overflow-hidden py-5 py-lg-6">

            <div class="container">

                <div class="mb-5 mb-sm-6 mb-xl-7">

                    <div class="max-w-xl">

                        <h2 class="m-0 mt-2 fw-bold tracking-tight text-primary-emphasis text-4xl">
                            Projects
                        </h2>

                    </div>

                </div>

                {{-- مشروعان في كل صف --}}
                <div class="row gy-5 gx-sm-5 row-cols-1 row-cols-sm-2">

                    @foreach ($projects as $project)
                        <div class="col" data-aos-delay="{{ ($loop->index % 2) * 100 }}" data-aos="fade"
                            data-aos-duration="1000">

                            <div class="position-relative pt-4">

                                <div class="ratio ratio-4x3">

                                    @if ($project->thumbnail)
                                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                                            class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                            alt="{{ $project->title }}" loading="lazy">
                                    @else
                                        <img src="{{ asset('assets/img/bg/bg2.jpg') }}"
                                            class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                            alt="{{ $project->title }}" loading="lazy">
                                    @endif

                                </div>

                                <a href="{{ route('projects.show', $project->slug) }}"
                                    class="mt-4 d-block text-xl fw-medium tracking-tight text-decoration-none text-body-tertiary text-body-emphasis-hover stretched-link">

                                    {{ $project->title }}

                                </a>

                            </div>

                        </div>
                    @endforeach

                </div>

                {{-- Show More --}}
                <div class="mt-5 mt-sm-6 mt-xl-7 pt-5 d-flex align-items-center justify-content-center">

                    <a href="{{ route('projects.index') }}"
                        class="btn btn-lg btn-primary text-white text-sm fw-semibold">

                        Show more

                    </a>

                </div>

            </div>

        </div>

    @endif


    <!-- services -->

    @if (isset($services) && $services->isNotEmpty())
        <!-- Services -->
        <div id="services" class="overflow-hidden py-5 py-lg-6">

            <div class="container">

                <div>

                    <div class="mx-auto max-w-2xl text-center">

                        <h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
                            My services
                        </h2>

                        <p class="m-0 mt-2 text-body-emphasis text-4xl tracking-tight fw-bold">
                            Digital Solutions for Modern Businesses.
                        </p>

                        <p class="m-0 mt-4 text-body text-lg leading-8">
                            Web Applications, E-Commerce Platforms, and Scalable Software Solutions.
                        </p>

                    </div>

                </div>

                <div>

                    <div
                        class="row row-cols-1 row-cols-xl-3 gy-5 gx-xl-4 mt-1 justify-content-center justify-content-xl-between">

                        @foreach ($services as $service)
                            <div class="col pt-5 pt-xl-4">

                                <div class="max-w-xl mx-auto mx-xl-0" data-aos-delay="{{ ($loop->index % 3) * 100 }}"
                                    data-aos="fade" data-aos-duration="1000">

                                    @if ($service->image)
                                        <div class="ratio" style="--bs-aspect-ratio: 66.66%;">

                                            <img src="{{ asset('storage/' . $service->image) }}"
                                                class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                                alt="{{ $service->title }}" loading="lazy">

                                        </div>
                                    @elseif ($service->icon)
                                        <div class="d-flex align-items-center justify-content-center bg-body-tertiary rounded-3 rounded-sm-4 rounded-xl-5"
                                            style="height: 220px;">

                                            <i class="{{ $service->icon }} text-primary" style="font-size: 4rem;"></i>

                                        </div>
                                    @endif

                                    <h3 class="m-0 mt-4 text-body-emphasis text-lg leading-6 fw-semibold">
                                        {{ $service->title }}
                                    </h3>

                                    <p class="m-0 mt-3 text-body-secondary line-clamp-2 text-sm leading-6">
                                        {{ $service->description }}
                                    </p>

                                </div>

                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>
    @endif




    @if ($about)
        <!-- About -->
        <div id="about" class="overflow-hidden py-5 py-lg-6">

            <div class="container">

                <div class="row gy-5 align-items-center justify-content-between">

                    {{-- Image --}}
                    <div class="col-12 col-xl-5" data-aos="fade" data-aos-duration="1000">

                        <div class="max-w-2xl mx-auto mx-xl-0">

                            <div class="ratio" style="--bs-aspect-ratio: 90%;">

                                @if ($about->image)
                                    <img src="{{ asset('storage/' . $about->image) }}"
                                        class="img-fluid object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                        alt="{{ $about->title }}">
                                @else
                                    <img src="{{ asset('assets/img/bg/2.png') }}"
                                        class="img-fluid object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                        alt="{{ $about->title }}">
                                @endif

                            </div>

                        </div>

                    </div>

                    {{-- Content --}}
                    <div class="col-12 col-xl-6" data-aos="fade" data-aos-delay="100" data-aos-duration="1000">

                        <div class="max-w-2xl mx-auto mx-xl-0">

                            <h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
                                About Me
                            </h2>

                            <p class="m-0 mt-2 text-body-emphasis text-4xl tracking-tight fw-bold">
                                {{ $about->title }}
                            </p>

                            <p class="m-0 mt-4 text-body-secondary text-lg leading-8">
                                {!! nl2br(e($about->description)) !!}
                            </p>

                            <div class="row row-cols-1 row-cols-sm-3 g-4 mt-4">

                                <div class="col">

                                    <div class="p-4 bg-body-tertiary rounded-3 rounded-sm-4 text-center h-100">

                                        <div class="text-primary text-3xl fw-bold">
                                            {{ $about->experience_years }}+
                                        </div>

                                        <div class="mt-2 text-body-secondary text-sm">
                                            Years Experience
                                        </div>

                                    </div>

                                </div>

                                <div class="col">

                                    <div class="p-4 bg-body-tertiary rounded-3 rounded-sm-4 text-center h-100">

                                        <div class="text-primary text-3xl fw-bold">
                                            {{ $about->completed_projects }}+
                                        </div>

                                        <div class="mt-2 text-body-secondary text-sm">
                                            Completed Projects
                                        </div>

                                    </div>

                                </div>

                                <div class="col">

                                    <div class="p-4 bg-body-tertiary rounded-3 rounded-sm-4 text-center h-100">

                                        <div class="text-primary text-3xl fw-bold">
                                            {{ $about->happy_clients }}+
                                        </div>

                                        <div class="mt-2 text-body-secondary text-sm">
                                            Happy Clients
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    @endif


    <!-- Testimonials -->

    @if (isset($testimonials) && $testimonials->isNotEmpty())
        <div id="testimonials" class="overflow-hidden py-7 py-sm-8 py-xl-9">

            <div class="container">

                <div class="glide glideLowGap">

                    <div class="max-w-2xl mb-5">

                        <h2 class="m-0 text-primary-emphasis text-base leading-7 fw-semibold">
                            Testimonials
                        </h2>

                        <div class="m-0 mt-2 text-body-emphasis text-4xl tracking-tight fw-bold">
                            What people say about my work.
                        </div>

                    </div>

                    @if ($testimonials->count() > 1)
                        <div class="position-lg-absolute top-0 end-0">

                            <div class="glide__arrows" data-glide-el="controls">

                                <button
                                    class="glide__arrow glide__arrow--left btn text-body-emphasis p-0 rounded-circle rtl-flip"
                                    data-glide-dir="<" aria-label="Previous testimonial">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                        fill="currentColor" viewBox="0 0 16 16">

                                        <path fill-rule="evenodd"
                                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />

                                    </svg>

                                </button>

                                <button
                                    class="glide__arrow glide__arrow--right btn text-body-emphasis p-0 rounded-circle rtl-flip"
                                    data-glide-dir=">" aria-label="Next testimonial">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                        fill="currentColor" viewBox="0 0 16 16">

                                        <path fill-rule="evenodd"
                                            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />

                                    </svg>

                                </button>

                            </div>

                        </div>
                    @endif

                    <div class="glide__track" data-glide-el="track">

                        <ul class="glide__slides">

                            @foreach ($testimonials as $testimonial)
                                <li class="glide__slide h-auto">

                                    <div class="h-100 py-5">

                                        <div
                                            class="h-100 p-4 p-xl-5 bg-body d-flex flex-column rounded-3 rounded-sm-4 rounded-xl-5 shadow-sm">

                                            <div class="text-body-emphasis">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45"
                                                    fill="currentColor" class="ms-n2 bi bi-quote rtl-flip"
                                                    viewBox="0 0 16 16">

                                                    <path
                                                        d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388q0-.527.062-1.054.093-.558.31-.992t.559-.683q.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 9 7.558V11a1 1 0 0 0 1 1zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612q0-.527.062-1.054.094-.558.31-.992.217-.434.559-.683.34-.279.868-.279V3q-.868 0-1.52.372a3.3 3.3 0 0 0-1.085.992 4.9 4.9 0 0 0-.62 1.458A7.7 7.7 0 0 0 3 7.558V11a1 1 0 0 0 1 1z" />

                                                </svg>

                                            </div>

                                            <div class="text-warning mt-3">

                                                @for ($star = 1; $star <= 5; $star++)
                                                    @if ($star <= $testimonial->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor

                                            </div>

                                            <p class="text-body text-base leading-7 my-4">
                                                {{ $testimonial->review }}
                                            </p>

                                            <div class="d-flex align-items-center column-gap-3 mt-auto">

                                                @if ($testimonial->image)
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                        height="48" width="48" class="img-fluid rounded-circle"
                                                        style="object-fit: cover;" alt="{{ $testimonial->client_name }}"
                                                        loading="lazy">
                                                @else
                                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                                        style="width: 48px; height: 48px; flex-shrink: 0;">

                                                        {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}

                                                    </div>
                                                @endif

                                                <div>

                                                    <div class="text-body-secondary fw-semibold">
                                                        {{ $testimonial->client_name }}
                                                    </div>

                                                    @if ($testimonial->job_title || $testimonial->company)
                                                        <div class="text-body-tertiary text-sm">

                                                            @if ($testimonial->job_title)
                                                                {{ $testimonial->job_title }}
                                                            @endif

                                                            @if ($testimonial->job_title && $testimonial->company)
                                                                ,
                                                            @endif

                                                            @if ($testimonial->company)
                                                                {{ $testimonial->company }}
                                                            @endif

                                                        </div>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </li>
                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        </div>
    @endif
@endsection
