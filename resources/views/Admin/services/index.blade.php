@extends('Admin.layouts.master')

@section('title', 'Services')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Services
        </h1>

        <a href="{{ route('Admin.services.create') }}"
            class="btn btn-primary shadow-sm">

            <i class="fas fa-plus mr-1"></i>
            Add Service

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
                Services List
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Icon</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($services as $service)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>

                                    @if ($service->image)

                                        <img src="{{ asset('storage/' . $service->image) }}"
                                            alt="{{ $service->title }}"
                                            class="img-thumbnail"
                                            style="width: 90px; height: 65px; object-fit: cover;">

                                    @else

                                        <span class="text-muted">
                                            No Image
                                        </span>

                                    @endif

                                </td>

                                <td>{{ $service->title }}</td>

                                <td>

                                    @if ($service->icon)

                                        <i class="{{ $service->icon }} fa-2x"></i>

                                        <div class="small text-muted mt-1">
                                            {{ $service->icon }}
                                        </div>

                                    @else

                                        <span class="text-muted">
                                            No Icon
                                        </span>

                                    @endif

                                </td>

                                <td style="max-width: 320px;">

                                    {{ \Illuminate\Support\Str::limit($service->description, 100) }}

                                </td>

                                <td>{{ $service->sort_order }}</td>

                                <td>

                                    @if ($service->is_active)

                                        <span class="badge badge-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge badge-danger">
                                            Inactive
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('Admin.services.edit', $service) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <form action="{{ route('Admin.services.destroy', $service) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this service?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="py-4">

                                    <i class="fas fa-cogs fa-3x text-gray-300 mb-3"></i>

                                    <h5>No services found</h5>

                                    <a href="{{ route('Admin.services.create') }}"
                                        class="btn btn-primary mt-2">

                                        Add First Service

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
