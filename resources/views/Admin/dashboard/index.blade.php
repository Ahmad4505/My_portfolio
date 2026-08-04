@extends('Admin.layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Dashboard
            </h1>

            <p class="mb-0 text-muted">
                Portfolio website overview.
            </p>

        </div>

        <a href="{{ route('home') }}"
            target="_blank"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">

            <i class="fas fa-eye fa-sm text-white-50 mr-1"></i>
            View Website

        </a>

    </div>

    {{-- Statistics --}}
    <div class="row">

        {{-- Projects --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <a href="{{ route('Admin.projects.index') }}"
                class="text-decoration-none">

                <div class="card border-left-primary shadow h-100 py-2">

                    <div class="card-body">

                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Projects
                                </div>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $statistics['projects'] }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

        {{-- Skills --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <a href="{{ route('Admin.skills.index') }}"
                class="text-decoration-none">

                <div class="card border-left-success shadow h-100 py-2">

                    <div class="card-body">

                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Skills
                                </div>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $statistics['skills'] }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fas fa-code fa-2x text-gray-300"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

        {{-- Services --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <a href="{{ route('Admin.services.index') }}"
                class="text-decoration-none">

                <div class="card border-left-info shadow h-100 py-2">

                    <div class="card-body">

                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Services
                                </div>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $statistics['services'] }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fas fa-cogs fa-2x text-gray-300"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

        {{-- Messages --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <a href="{{ route('Admin.messages.index') }}"
                class="text-decoration-none">

                <div class="card border-left-warning shadow h-100 py-2">

                    <div class="card-body">

                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Messages
                                </div>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    {{ $statistics['messages'] }}

                                    @if ($statistics['unread_messages'] > 0)

                                        <span class="badge badge-danger ml-2">
                                            {{ $statistics['unread_messages'] }} New
                                        </span>

                                    @endif

                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-gray-300"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>

    {{-- Second Row --}}
    <div class="row">

        {{-- Testimonials --}}
        <div class="col-xl-3 col-md-6 mb-4">

            <a href="{{ route('Admin.testimonials.index') }}"
                class="text-decoration-none">

                <div class="card border-left-danger shadow h-100 py-2">

                    <div class="card-body">

                        <div class="row no-gutters align-items-center">

                            <div class="col mr-2">

                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Testimonials
                                </div>

                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $statistics['testimonials'] }}
                                </div>

                            </div>

                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>

                        </div>

                    </div>

                </div>

            </a>

        </div>

    </div>

    <div class="row">

        {{-- Latest Messages --}}
        <div class="col-xl-7 col-lg-7">

            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-primary">
                        Latest Messages
                    </h6>

                    <a href="{{ route('Admin.messages.index') }}"
                        class="btn btn-primary btn-sm">

                        View All

                    </a>

                </div>

                <div class="card-body p-0">

                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead class="thead-light">

                                <tr>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($latestMessages as $message)

                                    <tr class="{{ !$message->is_read ? 'font-weight-bold bg-light' : '' }}">

                                        <td>

                                            @if ($message->is_read)

                                                <span class="badge badge-secondary">
                                                    Read
                                                </span>

                                            @else

                                                <span class="badge badge-success">
                                                    New
                                                </span>

                                            @endif

                                        </td>

                                        <td>
                                            {{ $message->name }}
                                        </td>

                                        <td>
                                            {{ \Illuminate\Support\Str::limit(
                                                $message->subject,
                                                35
                                            ) }}
                                        </td>

                                        <td>
                                            {{ $message->created_at->diffForHumans() }}
                                        </td>

                                        <td>

                                            <a href="{{ route('Admin.messages.show', $message) }}"
                                                class="btn btn-info btn-sm">

                                                <i class="fas fa-eye"></i>

                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5"
                                            class="text-center py-4 text-muted">

                                            No messages found.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        {{-- Latest Projects --}}
        <div class="col-xl-5 col-lg-5">

            <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex align-items-center justify-content-between">

                    <h6 class="m-0 font-weight-bold text-primary">
                        Latest Projects
                    </h6>

                    <a href="{{ route('Admin.projects.index') }}"
                        class="btn btn-primary btn-sm">

                        View All

                    </a>

                </div>

                <div class="card-body">

                    @forelse ($latestProjects as $project)

                        <div class="d-flex align-items-center {{ !$loop->last ? 'mb-4' : '' }}">

                            @if ($project->thumbnail)

                                <img
                                    src="{{ asset('storage/' . $project->thumbnail) }}"
                                    alt="{{ $project->title }}"
                                    class="rounded mr-3"
                                    style="width: 65px; height: 50px; object-fit: cover;">

                            @else

                                <div
                                    class="rounded bg-light d-flex align-items-center justify-content-center mr-3"
                                    style="width: 65px; height: 50px; flex-shrink: 0;">

                                    <i class="fas fa-image text-gray-400"></i>

                                </div>

                            @endif

                            <div class="flex-grow-1">

                                <div class="font-weight-bold text-gray-800">
                                    {{ $project->title }}
                                </div>

                                <small class="text-muted">
                                    {{ $project->created_at->diffForHumans() }}
                                </small>

                            </div>

                            <a href="{{ route('Admin.projects.edit', $project) }}"
                                class="btn btn-warning btn-sm">

                                <i class="fas fa-edit"></i>

                            </a>

                        </div>

                    @empty

                        <div class="text-center py-4 text-muted">

                            <i class="fas fa-project-diagram fa-2x mb-2"></i>

                            <p class="mb-0">
                                No projects found.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

@endsection
