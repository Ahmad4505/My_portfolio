@extends('Admin.layouts.master')

@section('title', 'Edit Hero Section')

@section('content')

    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h1 class="h3 mb-0 text-gray-800">
                Edit Hero Section
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

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Hero Content
                </h6>

            </div>

            <div class="card-body">

                <form action="{{ route('admin.hero.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="badge">
                                    Badge
                                </label>

                                <input type="text"
                                    name="badge"
                                    id="badge"
                                    class="form-control"
                                    placeholder="Available for hiring!"
                                    value="{{ old('badge', $hero?->badge) }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="subtitle">
                                    Subtitle
                                </label>

                                <input type="text"
                                    name="subtitle"
                                    id="subtitle"
                                    class="form-control"
                                    placeholder="Software Engineer"
                                    value="{{ old('subtitle', $hero?->subtitle) }}">

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="title">
                            Main Title
                        </label>

                        <input type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            placeholder="Web Developer, Design Excellence."
                            value="{{ old('title', $hero?->title) }}"
                            required>

                    </div>

                    <div class="form-group">

                        <label for="description">
                            Description
                        </label>

                        <textarea name="description"
                            id="description"
                            class="form-control"
                            rows="5"
                            placeholder="Write the hero description...">{{ old('description', $hero?->description) }}</textarea>

                    </div>

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="button_text">
                                    Button Text
                                </label>

                                <input type="text"
                                    name="button_text"
                                    id="button_text"
                                    class="form-control"
                                    placeholder="Contact me"
                                    value="{{ old('button_text', $hero?->button_text) }}">

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">

                                <label for="button_link">
                                    Button Link
                                </label>

                                <input type="text"
                                    name="button_link"
                                    id="button_link"
                                    class="form-control"
                                    placeholder="/contact-me"
                                    value="{{ old('button_link', $hero?->button_link) }}">

                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="image">
                            Hero Image
                        </label>

                        <input type="file"
                            name="image"
                            id="image"
                            class="form-control-file"
                            accept="image/*">

                    </div>

                    @if ($hero?->image)

                        <div class="mb-4">

                            <p class="mb-2 font-weight-bold">
                                Current Image
                            </p>

                            <img src="{{ asset('storage/' . $hero->image) }}"
                                alt="Hero Image"
                                class="img-thumbnail"
                                style="width: 220px; height: 150px; object-fit: cover;">

                        </div>

                    @endif

                    <div class="custom-control custom-switch mb-4">

                        <input type="checkbox"
                            class="custom-control-input"
                            id="is_active"
                            name="is_active"
                            value="1"
                            @checked(old('is_active', $hero?->is_active ?? true))>

                        <label class="custom-control-label"
                            for="is_active">

                            Active

                        </label>

                    </div>

                    <button type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save mr-1"></i>
                        Save Changes

                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
