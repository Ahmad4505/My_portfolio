@extends('User.master')

@section(
    'seo_title',
    'Projects | ' . ($siteSetting?->site_name ?? 'Ahmad Yasser')
)

@section(
    'seo_description',
    'Explore web development and software engineering projects created by '
        . ($siteSetting?->site_name ?? 'Ahmad Yasser')
        . '.'
)

@section(
    'seo_keywords',
    'Laravel Projects, PHP Projects, Web Development Projects, Software Engineering Portfolio'
)

@section('seo_type', 'website')

@section('content')

    <div class="overflow-hidden py-5 py-lg-6">

        <div class="container">

            <div class="mb-5 mb-sm-6 mb-xl-7">

                <div class="max-w-xl">

                    <h1 class="m-0 mt-2 fw-bold tracking-tight text-primary-emphasis text-4xl">
                        Projects
                    </h1>

                    <p class="m-0 mt-3 text-body-secondary text-lg">
                        Explore all my latest projects and development work.
                    </p>

                </div>

            </div>

            <div class="row gy-5 gx-sm-5 row-cols-1 row-cols-sm-2">

                @forelse ($projects as $project)

                    <div class="col"
                        data-aos-delay="{{ ($loop->index % 2) * 100 }}"
                        data-aos="fade"
                        data-aos-duration="1000">

                        <div class="position-relative pt-4">

                            <div class="ratio ratio-4x3">

                                @if ($project->thumbnail)

                                    <img
                                        src="{{ asset('storage/' . $project->thumbnail) }}"
                                        class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                        alt="{{ $project->title }}"
                                        loading="lazy">

                                @else

                                    <img
                                        src="{{ asset('assets/img/bg/bg2.jpg') }}"
                                        class="object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5"
                                        alt="{{ $project->title }}"
                                        loading="lazy">

                                @endif

                            </div>

                            <a href="{{ route('projects.show', $project->slug) }}"
                                class="mt-4 d-block text-xl fw-medium tracking-tight text-decoration-none text-body-tertiary text-body-emphasis-hover stretched-link">

                                {{ $project->title }}

                            </a>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="text-center py-6">

                            <h3 class="text-body-emphasis">
                                No projects found.
                            </h3>

                        </div>

                    </div>

                @endforelse

            </div>

            {{-- Pagination --}}
            @if ($projects->hasPages())

                <div class="mt-5 mt-sm-6 d-flex justify-content-center">

                    {{ $projects->links() }}

                </div>

            @endif

        </div>

    </div>

@endsection
