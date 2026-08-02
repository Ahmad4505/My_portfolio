@extends('Admin.layouts.master')

@section('title', 'About Section')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            About Section
        </h1>

        <a href="{{ route('home') }}"
            target="_blank"
            class="btn btn-primary btn-sm shadow-sm">

            <i class="fas fa-eye mr-1"></i>
            View Website

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

    @if ($errors->any())

        <div class="alert alert-danger alert-dismissible fade show"
            role="alert">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

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
                Edit About Content
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.about.update') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="title">
                        Title
                    </label>

                    <input type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $about?->title) }}"
                        placeholder="About Me"
                        required>

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea name="description"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="7"
                        placeholder="Write your professional biography..."
                        required>{{ old('description', $about?->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="experience_years">
                                Experience Years
                            </label>

                            <input type="number"
                                name="experience_years"
                                id="experience_years"
                                class="form-control @error('experience_years') is-invalid @enderror"
                                value="{{ old('experience_years', $about?->experience_years ?? 0) }}"
                                min="0"
                                required>

                            @error('experience_years')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="completed_projects">
                                Completed Projects
                            </label>

                            <input type="number"
                                name="completed_projects"
                                id="completed_projects"
                                class="form-control @error('completed_projects') is-invalid @enderror"
                                value="{{ old('completed_projects', $about?->completed_projects ?? 0) }}"
                                min="0"
                                required>

                            @error('completed_projects')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="happy_clients">
                                Happy Clients
                            </label>

                            <input type="number"
                                name="happy_clients"
                                id="happy_clients"
                                class="form-control @error('happy_clients') is-invalid @enderror"
                                value="{{ old('happy_clients', $about?->happy_clients ?? 0) }}"
                                min="0"
                                required>

                            @error('happy_clients')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label for="image">
                        About Image
                    </label>

                    <input type="file"
                        name="image"
                        id="image"
                        class="form-control-file @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp">

                    <small class="form-text text-muted">
                        JPG, PNG or WEBP. Maximum 2MB.
                    </small>

                    @error('image')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                @if ($about?->image)

                    <div class="mb-4">

                        <p class="font-weight-bold mb-2">
                            Current Image
                        </p>

                        <img src="{{ asset('storage/' . $about->image) }}"
                            alt="{{ $about->title }}"
                            class="img-thumbnail"
                            style="width: 260px; height: 180px; object-fit: cover;">

                    </div>

                @endif

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Save Changes

                </button>

            </form>

        </div>

    </div>

@endsection
