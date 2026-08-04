@extends('Admin.layouts.master')

@section('title', 'Hero Section')

@section('content')

<div class="container-fluid">

    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Hero Section
        </h1>

        <a href="{{ route('Admin.hero.create') }}"
            class="btn btn-primary shadow-sm">

            <i class="fas fa-plus mr-1"></i>

            Add Hero

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button
                type="button"
                class="close"
                data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">

                Hero Section List

            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-light">

                        <tr>

                            <th width="60">#</th>

                            <th width="120">Image</th>

                            <th>Title</th>

                            <th>Subtitle</th>

                            <th>Button</th>

                            <th width="120">Status</th>

                            <th width="180">Actions</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($heroes as $hero)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    @if($hero->image)

                                        <img
                                            src="{{ asset('storage/'.$hero->image) }}"
                                            width="80"
                                            class="img-thumbnail">

                                    @else

                                        <span class="text-muted">

                                            No Image

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    {{ $hero->title }}

                                </td>

                                <td>

                                    {{ $hero->subtitle }}

                                </td>

                                <td>

                                    {{ $hero->button_text }}

                                </td>

                                <td>

                                    @if($hero->is_active)

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

                                    <a
                                        href="{{ route('Admin.hero.edit',$hero->id) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <form
                                        action="{{ route('Admin.hero.destroy',$hero->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this Hero?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7">

                                    <div class="py-4">

                                        <i class="fas fa-folder-open fa-3x text-gray-300 mb-3"></i>

                                        <h5>

                                            No Hero Section Found

                                        </h5>

                                        <a
                                            href="{{ route('Admin.hero.create') }}"
                                            class="btn btn-primary mt-3">

                                            Add First Hero

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
