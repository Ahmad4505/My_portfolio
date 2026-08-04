@extends('Admin.layouts.master')

@section('title', 'Projects')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>
            <h1 class="h3 mb-1 text-gray-800">
                Projects
            </h1>

            <p class="mb-0 text-muted">
                Add, edit and manage your portfolio projects.
            </p>
        </div>

        <a href="{{ route('Admin.projects.create') }}" class="btn btn-primary shadow-sm">

            <i class="fas fa-plus mr-1"></i>
            Add Project

        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>
    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Projects List
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center align-middle">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Date</th>
                            <th>Order</th>
                            <th>Featured</th>
                            <th>Links</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($projects as $project)
                            <tr>

                                <td>
                                    {{ $projects->firstItem() + $loop->index }}
                                </td>

                                <td>

                                    @if ($project->thumbnail)
                                        <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}"
                                            class="img-thumbnail" style="width: 100px; height: 75px; object-fit: cover;">
                                    @else
                                        <span class="text-muted">
                                            No Image
                                        </span>
                                    @endif

                                </td>

                                <td class="font-weight-bold">
                                    {{ $project->title }}
                                </td>

                                <td style="min-width: 240px; max-width: 320px;">

                                    {{ \Illuminate\Support\Str::limit($project->short_description, 90) }}

                                </td>

                                <td>

                                    {{ $project->project_date ? $project->project_date->format('Y-m-d') : '—' }}

                                </td>

                                <td>
                                    {{ $project->sort_order }}
                                </td>

                                <td>

                                    @if ($project->featured)
                                        <span class="badge badge-warning">
                                            Featured
                                        </span>
                                    @else
                                        <span class="badge badge-secondary">
                                            Normal
                                        </span>
                                    @endif

                                </td>

                                <td style="min-width: 120px;">

                                    @if ($project->github)
                                        <a href="{{ $project->github }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-dark btn-sm" title="GitHub">

                                            <i class="fab fa-github"></i>

                                        </a>
                                    @endif

                                    @if ($project->live_demo)
                                        <a href="{{ $project->live_demo }}" target="_blank" rel="noopener noreferrer"
                                            class="btn btn-info btn-sm" title="Live Demo">

                                            <i class="fas fa-external-link-alt"></i>

                                        </a>
                                    @endif

                                    @if (!$project->github && !$project->live_demo)
                                        <span class="text-muted">
                                            No Links
                                        </span>
                                    @endif

                                </td>

                                <td style="min-width: 170px;">

                                    {{-- عرض المشروع في الموقع --}}
                                    <a href="{{ route('projects.show', $project->slug) }}" target="_blank"
                                        class="btn btn-info btn-sm" title="View">

                                        <i class="fas fa-eye"></i>

                                    </a>

                                    <a href="{{ route('Admin.projects.gallery.index', $project) }}"
                                        class="btn btn-primary btn-sm" title="Project Gallery">

                                        <i class="fas fa-images"></i>

                                    </a>


                                    {{-- تعديل --}}
                                    <a href="{{ route('Admin.projects.edit', $project) }}" class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    {{-- حذف --}}
                                    <form action="{{ route('Admin.projects.destroy', $project) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm " title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this project?')">

                                            <i class="fas fa-trash "></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="py-5">

                                    <i class="fas fa-project-diagram fa-3x text-gray-300 mb-3"></i>

                                    <h5 class="text-gray-700">
                                        No projects found
                                    </h5>

                                    <p class="text-muted">
                                        Add your first project to display it on the portfolio.
                                    </p>

                                    <a href="{{ route('Admin.projects.create') }}" class="btn btn-primary mt-2">

                                        <i class="fas fa-plus mr-1"></i>
                                        Add First Project

                                    </a>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            @if ($projects->hasPages())
                <div class="d-flex justify-content-center mt-4">

                    {{ $projects->links() }}

                </div>
            @endif

        </div>

    </div>

@endsection
