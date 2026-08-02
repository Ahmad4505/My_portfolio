@extends('Admin.layouts.master')

@section('title', 'Add Project')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Add Project
        </h1>

        <a href="{{ route('admin.projects.index') }}"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left mr-1"></i>
            Back

        </a>

    </div>

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
                Project Information
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.projects.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label for="title">
                        Project Title
                    </label>

                    <input type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Portfolio Website"
                        required>

                    @error('title')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="short_description">
                        Short Description
                    </label>

                    <textarea name="short_description"
                        id="short_description"
                        class="form-control @error('short_description') is-invalid @enderror"
                        rows="3"
                        maxlength="500"
                        placeholder="A short summary of the project..."
                        required>{{ old('short_description') }}</textarea>

                    @error('short_description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="form-group">

                    <label for="description">
                        Full Description
                    </label>

                    <textarea name="description"
                        id="description"
                        class="form-control @error('description') is-invalid @enderror"
                        rows="8"
                        placeholder="Write the full project description..."
                        required>{{ old('description') }}</textarea>

                    @error('description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="github">
                                GitHub Link
                            </label>

                            <input type="url"
                                name="github"
                                id="github"
                                class="form-control @error('github') is-invalid @enderror"
                                value="{{ old('github') }}"
                                placeholder="https://github.com/username/project">

                            @error('github')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="live_demo">
                                Live Demo Link
                            </label>

                            <input type="url"
                                name="live_demo"
                                id="live_demo"
                                class="form-control @error('live_demo') is-invalid @enderror"
                                value="{{ old('live_demo') }}"
                                placeholder="https://example.com">

                            @error('live_demo')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="project_date">
                                Project Date
                            </label>

                            <input type="date"
                                name="project_date"
                                id="project_date"
                                class="form-control @error('project_date') is-invalid @enderror"
                                value="{{ old('project_date') }}">

                            @error('project_date')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="sort_order">
                                Sort Order
                            </label>

                            <input type="number"
                                name="sort_order"
                                id="sort_order"
                                class="form-control @error('sort_order') is-invalid @enderror"
                                value="{{ old('sort_order', 0) }}"
                                min="0">

                            @error('sort_order')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="form-group">

                            <label for="thumbnail">
                                Thumbnail
                            </label>

                            <input type="file"
                                name="thumbnail"
                                id="thumbnail"
                                class="form-control-file @error('thumbnail') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">

                            @error('thumbnail')

                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

                <div class="custom-control custom-switch mb-4">

                    <input type="checkbox"
                        name="featured"
                        id="featured"
                        class="custom-control-input"
                        value="1"
                        @checked(old('featured'))>

                    <label class="custom-control-label"
                        for="featured">

                        Featured Project

                    </label>

                </div>

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Save Project

                </button>

                <a href="{{ route('admin.projects.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
