@extends('User.master')

@section(
    'seo_title',
    $project->title
        . ' | '
        . ($siteSetting?->site_name ?? 'Ahmad Yasser')
)

@section(
    'seo_description',
    $project->short_description
        ?: \Illuminate\Support\Str::limit(
            strip_tags($project->description),
            160
        )
)

@section(
    'seo_keywords',
    $project->technologies
        ?: ($siteSetting?->keywords ?? '')
)

@section(
    'seo_image',
    $project->cover_image
        ? asset('storage/' . $project->cover_image)
        : (
            $project->thumbnail
                ? asset('storage/' . $project->thumbnail)
                : asset('assets/logo/logo.png')
        )
)

@section(
    'seo_url',
    route('projects.show', $project->slug)
)

@section('seo_type', 'article')

@section('content')

    <div class="overflow-hidden py-5 py-lg-6">

        <div class="container">

            {{-- Main Project Section --}}
            <div class="row gy-5 gx-lg-5 align-items-start">

                {{-- Project Image --}}
                <div class="col-12 col-lg-7">

                    <div
                        class="ratio ratio-4x3 bg-body-tertiary rounded-3 rounded-sm-4 rounded-xl-5 overflow-hidden">

                        @if ($project->cover_image)

                            <img
                                src="{{ asset('storage/' . $project->cover_image) }}"
                                class="w-100 h-100 object-fit-contain"
                                alt="{{ $project->title }}">

                        @elseif ($project->thumbnail)

                            <img
                                src="{{ asset('storage/' . $project->thumbnail) }}"
                                class="w-100 h-100 object-fit-contain"
                                alt="{{ $project->title }}">

                        @else

                            <img
                                src="{{ asset('assets/img/bg/bg2.jpg') }}"
                                class="w-100 h-100 object-fit-cover"
                                alt="{{ $project->title }}">

                        @endif

                    </div>

                </div>

                {{-- Project Information --}}
                <div class="col-12 col-lg-5">

                    @if ($project->featured)

                        <span class="badge bg-primary text-white mb-3">
                            Featured Project
                        </span>

                    @endif

                    <h1
                        class="m-0 text-body-emphasis text-4xl fw-bold tracking-tight leading-tight">

                        {{ $project->title }}

                    </h1>

                    @if ($project->short_description)

                        <p class="m-0 mt-4 text-body-secondary text-lg leading-8">

                            {{ $project->short_description }}

                        </p>

                    @endif

                    {{-- Project Meta Information --}}
                    @if (
                        $project->project_date ||
                        $project->client ||
                        $project->category
                    )

                        <div
                            class="mt-4 p-4 border rounded-3 rounded-sm-4 bg-body-tertiary">

                            <h2
                                class="m-0 mb-3 text-body-emphasis text-xl fw-semibold">

                                Project Information

                            </h2>

                            @if ($project->project_date)

                                <div
                                    class="d-flex align-items-center gap-3 mb-3">

                                    <div
                                        class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0"
                                        style="width: 38px; height: 38px;">

                                        <i class="far fa-calendar-alt"></i>

                                    </div>

                                    <div>

                                        <small
                                            class="d-block text-body-tertiary">

                                            Project Date

                                        </small>

                                        <span
                                            class="text-body-emphasis fw-medium">

                                            {{ $project->project_date->format('F Y') }}

                                        </span>

                                    </div>

                                </div>

                            @endif

                            @if ($project->client)

                                <div
                                    class="d-flex align-items-center gap-3 mb-3">

                                    <div
                                        class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0"
                                        style="width: 38px; height: 38px;">

                                        <i class="fas fa-user"></i>

                                    </div>

                                    <div>

                                        <small
                                            class="d-block text-body-tertiary">

                                            Client

                                        </small>

                                        <span
                                            class="text-body-emphasis fw-medium">

                                            {{ $project->client }}

                                        </span>

                                    </div>

                                </div>

                            @endif

                            @if ($project->category)

                                <div
                                    class="d-flex align-items-center gap-3">

                                    <div
                                        class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0"
                                        style="width: 38px; height: 38px;">

                                        <i class="fas fa-folder"></i>

                                    </div>

                                    <div>

                                        <small
                                            class="d-block text-body-tertiary">

                                            Category

                                        </small>

                                        <span
                                            class="text-body-emphasis fw-medium">

                                            {{ $project->category }}

                                        </span>

                                    </div>

                                </div>

                            @endif

                        </div>

                    @endif

                    {{-- Technologies --}}
                    @if ($project->technologies)

                        <div class="mt-4">

                            <h2
                                class="m-0 mb-3 text-body-emphasis text-xl fw-semibold">

                                Technologies

                            </h2>

                            <div class="d-flex flex-wrap gap-2">

                                @foreach (explode(',', $project->technologies) as $technology)

                                    @if (trim($technology))

                                        <span
                                            class="badge rounded-pill border bg-body-tertiary text-body-emphasis px-3 py-2">

                                            {{ trim($technology) }}

                                        </span>

                                    @endif

                                @endforeach

                            </div>

                        </div>

                    @endif

                    {{-- Full Description --}}
                    @if ($project->description)

                        <div class="mt-5">

                            <h2
                                class="m-0 mb-3 text-body-emphasis text-xl fw-semibold">

                                About This Project

                            </h2>

                            <div
                                class="text-body-secondary text-lg leading-8">

                                {!! nl2br(e($project->description)) !!}

                            </div>

                        </div>

                    @endif

                    {{-- Project Buttons --}}
                    @if ($project->github || $project->live_demo)

                        <div class="d-flex flex-wrap gap-3 mt-5">

                            @if ($project->github)

                                <a
                                    href="{{ $project->github }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-outline-primary btn-lg">

                                    <i class="fab fa-github me-2"></i>
                                    GitHub

                                </a>

                            @endif

                            @if ($project->live_demo)

                                <a
                                    href="{{ $project->live_demo }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-primary btn-lg text-white">

                                    <i
                                        class="fas fa-external-link-alt me-2"></i>

                                    Live Demo

                                </a>

                            @endif

                        </div>

                    @endif

                </div>

            </div>

            {{-- Project Gallery --}}
            @if ($project->images->isNotEmpty())

                <div class="mt-5 mt-lg-6">

                    <div class="mb-4">

                        <h2
                            class="m-0 text-body-emphasis text-3xl fw-bold">

                            Project Gallery

                        </h2>

                        <p
                            class="m-0 mt-2 text-body-secondary text-lg">

                            More screenshots and details from this project.

                        </p>

                    </div>

                    <div class="row g-4">

                        @foreach ($project->images as $image)

                            <div class="col-12 col-md-6">

                                <a
                                    href="{{ asset('storage/' . $image->image) }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="d-block text-decoration-none">

                                    <div
                                        class="ratio ratio-4x3 bg-body-tertiary rounded-3 rounded-sm-4 rounded-xl-5 overflow-hidden">

                                        <img
                                            src="{{ asset('storage/' . $image->image) }}"
                                            alt="{{ $project->title }} screenshot"
                                            class="w-100 h-100 object-fit-contain"
                                            loading="lazy">

                                    </div>

                                </a>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

            {{-- Back To Projects --}}
            <div class="mt-5 mt-lg-6">

                <a
                    href="{{ route('projects.index') }}"
                    class="text-decoration-none text-body-secondary text-body-emphasis-hover fw-semibold">

                    <i class="fas fa-arrow-left me-2"></i>
                    Back to Projects

                </a>

            </div>

        </div>

    </div>

@endsection
