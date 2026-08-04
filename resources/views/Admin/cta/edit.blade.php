@extends('Admin.layouts.master')

@section('title', 'Call To Action')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Call To Action
            </h1>

            <p class="mb-0 text-muted">
                Manage the call-to-action section displayed before the footer.
            </p>

        </div>

        <a href="{{ route('home') }}"
            target="_blank"
            class="btn btn-info shadow-sm">

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

    <form action="{{ route('Admin.cta.update') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Section Content
                </h6>

            </div>

            <div class="card-body">

                {{-- Title --}}
                <div class="form-group">

                    <label for="title">
                        Title
                    </label>

                    <input type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old(
                            'title',
                            $cta?->title
                                ?? "Let's Build Your Next Project Together"
                        ) }}"
                        maxlength="255"
                        required>

                    @error('title')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                {{-- Description --}}
                <div class="form-group">

                    <label for="description">
                        Description
                    </label>

                    <textarea name="description"
                        id="description"
                        rows="4"
                        class="form-control @error('description') is-invalid @enderror"
                        maxlength="1000"
                        placeholder="Write a short call-to-action description...">{{ old(
                            'description',
                            $cta?->description
                                ?? "I'm available for freelance work and web development projects. Let's turn your idea into reality."
                        ) }}</textarea>

                    @error('description')

                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>

                    @enderror

                </div>

                <div class="row">

                    {{-- Button Text --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="button_text">
                                Button Text
                            </label>

                            <input type="text"
                                name="button_text"
                                id="button_text"
                                class="form-control @error('button_text') is-invalid @enderror"
                                value="{{ old(
                                    'button_text',
                                    $cta?->button_text ?? 'Contact Me'
                                ) }}"
                                maxlength="100"
                                required>

                            @error('button_text')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    {{-- Button Link --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="button_link">
                                Button Link
                            </label>

                            <input type="text"
                                name="button_link"
                                id="button_link"
                                class="form-control @error('button_link') is-invalid @enderror"
                                value="{{ old(
                                    'button_link',
                                    $cta?->button_link ?? '/contact-me'
                                ) }}"
                                maxlength="500"
                                required>

                            <small class="form-text text-muted">
                                Examples: /contact-me, https://example.com, mailto:email@example.com
                            </small>

                            @error('button_link')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Background Image --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Background Image
                </h6>

            </div>

            <div class="card-body">

                <div class="row align-items-start">

                    <div class="col-lg-6">

                        <div class="form-group">

                            <label for="background_image">
                                Upload New Background
                            </label>

                            <input type="file"
                                name="background_image"
                                id="background_image"
                                class="form-control-file @error('background_image') is-invalid @enderror"
                                accept=".jpg,.jpeg,.png,.webp">

                            <small class="form-text text-muted">
                                JPG, PNG or WEBP. Maximum size: 3 MB.
                            </small>

                            @error('background_image')

                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                    <div class="col-lg-6">

                        <p class="font-weight-bold mb-2">
                            Current Background
                        </p>

                        @if ($cta?->background_image)

                            <img src="{{ asset(
                                'storage/' . $cta->background_image
                            ) }}"
                                alt="CTA Background"
                                class="img-fluid rounded shadow-sm"
                                style="width: 100%;
                                    max-height: 230px;
                                    object-fit: cover;">

                        @else

                            <img src="{{ asset(
                                'assets/img/bg/bg10.jpg'
                            ) }}"
                                alt="Default CTA Background"
                                class="img-fluid rounded shadow-sm"
                                style="width: 100%;
                                    max-height: 230px;
                                    object-fit: cover;">

                            <small class="d-block text-muted mt-2">
                                The default template image is currently being used.
                            </small>

                        @endif

                    </div>

                </div>

            </div>

        </div>

        {{-- Visibility --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
                    Visibility
                </h6>

            </div>

            <div class="card-body">

                <div class="custom-control custom-switch">

                    <input type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        @checked(old(
                            'is_active',
                            $cta?->is_active ?? true
                        ))>

                    <label class="custom-control-label"
                        for="is_active">

                        Show Call To Action section on the website

                    </label>

                </div>

            </div>

        </div>

        <div class="mb-5">

            <button type="submit"
                class="btn btn-primary">

                <i class="fas fa-save mr-1"></i>
                Save Changes

            </button>

        </div>

    </form>

@endsection
