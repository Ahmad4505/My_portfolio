@extends('Admin.layouts.master')

@section('title', 'Skills')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Skills
        </h1>

        <a href="{{ route('Admin.skills.create') }}"
            class="btn btn-primary shadow-sm">

            <i class="fas fa-plus mr-1"></i>
            Add Skill

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
                Skills List
            </h6>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Percentage</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($skills as $skill)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $skill->name }}</td>

                                <td>

                                    @if ($skill->icon)

                                        <i class="{{ $skill->icon }} fa-2x"></i>

                                        <div class="small text-muted mt-1">
                                            {{ $skill->icon }}
                                        </div>

                                    @else

                                        <span class="text-muted">
                                            No Icon
                                        </span>

                                    @endif

                                </td>

                                <td style="min-width: 220px;">

                                    <div class="progress mb-2">

                                        <div class="progress-bar"
                                            role="progressbar"
                                            style="width: {{ $skill->percentage }}%;"
                                            aria-valuenow="{{ $skill->percentage }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100">

                                            {{ $skill->percentage }}%

                                        </div>

                                    </div>

                                </td>

                                <td>{{ $skill->sort_order }}</td>

                                <td>

                                    <a href="{{ route('Admin.skills.edit', $skill) }}"
                                        class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                    </a>

                                    <form action="{{ route('Admin.skills.destroy', $skill) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete this skill?')">

                                            <i class="fas fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="py-4">

                                    <i class="fas fa-code fa-3x text-gray-300 mb-3"></i>

                                    <h5>No skills found</h5>

                                    <a href="{{ route('Admin.skills.create') }}"
                                        class="btn btn-primary mt-2">

                                        Add First Skill

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
