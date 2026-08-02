@extends('Admin.layouts.master')

@section('title', 'Testimonials')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Testimonials
            </h1>

            <p class="mb-0 text-muted">
                Manage customer reviews displayed on your website.
            </p>

        </div>

        <a
            href="{{ route('admin.testimonials.create') }}"
            class="btn btn-primary shadow-sm">

            <i class="fas fa-plus mr-1"></i>
            Add Testimonial

        </a>

    </div>

    @if (session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert">

            {{ session('success') }}

            <button
                type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

    @endif

    <div class="alert alert-info">

        <i class="fas fa-info-circle mr-1"></i>

        The Testimonials section will be hidden automatically from the
        website if all testimonials are inactive.

    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Testimonials List
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Client</th>
                            <th>Job / Company</th>
                            <th>Review</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($testimonials as $testimonial)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    @if ($testimonial->image)

                                        <img
                                            src="{{ asset('storage/' . $testimonial->image) }}"
                                            alt="{{ $testimonial->client_name }}"
                                            class="rounded-circle"
                                            style="width: 60px; height: 60px; object-fit: cover;">

                                    @else

                                        <div
                                            class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                                            style="width: 60px; height: 60px;">

                                            {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}

                                        </div>

                                    @endif

                                </td>

                                <td class="font-weight-bold">
                                    {{ $testimonial->client_name }}
                                </td>

                                <td>

                                    @if ($testimonial->job_title)

                                        <div>
                                            {{ $testimonial->job_title }}
                                        </div>

                                    @endif

                                    @if ($testimonial->company)

                                        <small class="text-muted">
                                            {{ $testimonial->company }}
                                        </small>

                                    @endif

                                    @if (
                                        !$testimonial->job_title &&
                                        !$testimonial->company
                                    )

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>

                                <td style="min-width: 260px; max-width: 350px;">

                                    {{ \Illuminate\Support\Str::limit(
                                        $testimonial->review,
                                        100
                                    ) }}

                                </td>

                                <td>

                                    <div class="text-warning">

                                        @for ($star = 1; $star <= 5; $star++)

                                            @if ($star <= $testimonial->rating)

                                                <i class="fas fa-star"></i>

                                            @else

                                                <i class="far fa-star"></i>

                                            @endif

                                        @endfor

                                    </div>

                                    <small class="text-muted">
                                        {{ $testimonial->rating }}/5
                                    </small>

                                </td>

                                <td>

                                    @if ($testimonial->is_active)

                                        <span class="badge badge-success">
                                            Visible
                                        </span>

                                    @else

                                        <span class="badge badge-secondary">
                                            Hidden
                                        </span>

                                    @endif

                                </td>

                                <td style="min-width: 150px;">

                                    {{-- Toggle Visibility --}}
                                    <form
                                        action="{{ route(
                                            'admin.testimonials.toggle-status',
                                            $testimonial
                                        ) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="btn {{ $testimonial->is_active
                                                ? 'btn-secondary'
                                                : 'btn-success' }} btn-sm"
                                            title="{{ $testimonial->is_active
                                                ? 'Hide'
                                                : 'Show' }}">

                                            <i class="fas {{ $testimonial->is_active
                                                ? 'fa-eye-slash'
                                                : 'fa-eye' }}"></i>

                                        </button>

                                    </form>

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route(
                                            'admin.testimonials.edit',
                                            $testimonial
                                        ) }}"
                                        class="btn btn-warning btn-sm"
                                        title="Edit">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        action="{{ route(
                                            'admin.testimonials.destroy',
                                            $testimonial
                                        ) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            title="Delete"
                                            onclick="return confirm(
                                                'Delete this testimonial?'
                                            )">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="py-5">

                                    <i class="fas fa-comments fa-3x text-gray-300 mb-3"></i>

                                    <h5>
                                        No testimonials found
                                    </h5>

                                    <a
                                        href="{{ route('admin.testimonials.create') }}"
                                        class="btn btn-primary mt-2">

                                        Add First Testimonial

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
