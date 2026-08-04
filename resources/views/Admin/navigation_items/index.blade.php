@extends('Admin.layouts.master')

@section('title', 'Navbar Items')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Navbar Items
        </h1>

        <a href="{{ route('Admin.navigation-items.create') }}"
            class="btn btn-primary">

            <i class="fas fa-plus mr-1"></i>
            Add Item

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
                Navigation Items
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($navigationItems as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->title }}</td>

                                <td>{{ $item->url }}</td>

                                <td>{{ $item->sort_order }}</td>

                                <td>

                                    @if ($item->is_active)

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

                                    <a href="{{ route('Admin.navigation-items.edit', $item) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <form action="{{ route('Admin.navigation-items.destroy', $item) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this navigation item?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="py-4">

                                    No navigation items found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
