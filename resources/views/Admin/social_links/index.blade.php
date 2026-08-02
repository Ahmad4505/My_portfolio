@extends('Admin.layouts.master')

@section('title', 'Social Links')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Social Links
            </h1>

            <p class="mb-0 text-muted">
                Manage the social media links displayed on your website.
            </p>

        </div>

        <a href="{{ route('admin.social-links.create') }}"
            class="btn btn-primary shadow-sm">

            <i class="fas fa-plus mr-1"></i>
            Add Social Link

        </a>

    </div>

    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show"
            role="alert">

            {{ session('success') }}

            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Social Links List
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Platform</th>
                            <th>Icon</th>
                            <th>URL</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($socialLinks as $socialLink)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="font-weight-bold">
                                    {{ $socialLink->platform }}
                                </td>

                                <td>

                                    @if ($socialLink->icon)

                                        <i class="{{ $socialLink->icon }} fa-2x"></i>

                                        <div class="small text-muted mt-1">
                                            {{ $socialLink->icon }}
                                        </div>

                                    @else

                                        <span class="text-muted">
                                            No Icon
                                        </span>

                                    @endif

                                </td>

                                <td style="max-width: 360px;">

                                    <a href="{{ $socialLink->url }}"
                                        target="_blank"
                                        rel="noopener noreferrer">

                                        {{ \Illuminate\Support\Str::limit(
                                            $socialLink->url,
                                            60
                                        ) }}

                                    </a>

                                </td>

                                <td>
                                    {{ $socialLink->sort_order }}
                                </td>

                                <td>

                                    @if ($socialLink->is_active)

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

                                    <div class="d-flex justify-content-center align-items-center">

                                        <form action="{{ route(
                                            'admin.social-links.toggle-status',
                                            $socialLink
                                        ) }}"
                                            method="POST"
                                            class="m-0 mr-1">

                                            @csrf
                                            @method('PATCH')

                                            <button type="submit"
                                                class="btn {{ $socialLink->is_active
                                                    ? 'btn-secondary'
                                                    : 'btn-success' }} btn-sm"
                                                title="{{ $socialLink->is_active
                                                    ? 'Hide'
                                                    : 'Show' }}">

                                                <i class="fas {{ $socialLink->is_active
                                                    ? 'fa-eye-slash'
                                                    : 'fa-eye' }}"></i>

                                            </button>

                                        </form>

                                        <a href="{{ route(
                                            'admin.social-links.edit',
                                            $socialLink
                                        ) }}"
                                            class="btn btn-warning btn-sm mr-1"
                                            title="Edit">

                                            <i class="fas fa-edit"></i>

                                        </a>

                                        <form action="{{ route(
                                            'admin.social-links.destroy',
                                            $socialLink
                                        ) }}"
                                            method="POST"
                                            class="m-0">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="return confirm(
                                                    'Delete this social link?'
                                                )">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <i class="fas fa-share-alt fa-3x text-gray-300 mb-3"></i>

                                    <h5>
                                        No social links found
                                    </h5>

                                    <a href="{{ route('admin.social-links.create') }}"
                                        class="btn btn-primary mt-2">

                                        Add First Social Link

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
