@extends('Admin.layouts.master')

@section('title', 'Site Settings')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <h1 class="h3 mb-0 text-gray-800">
            Site Settings
        </h1>

        <a href="{{ route('home') }}" target="_blank" class="btn btn-primary btn-sm shadow-sm">

            <i class="fas fa-eye mr-1"></i>
            View Website

        </a>

    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">

            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())

        <div class="alert alert-danger alert-dismissible fade show" role="alert">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

    @endif

    <form action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Website Identity --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Website Identity
                </h6>
            </div>

            <div class="card-body">

                <div class="form-group">

                    <label for="site_name">
                        Site Name
                    </label>

                    <input type="text" name="site_name" id="site_name"
                        class="form-control @error('site_name') is-invalid @enderror"
                        value="{{ old('site_name', $setting?->site_name) }}" placeholder="Ahmad Yasser" required>

                    @error('site_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="row">

                    {{-- Logo --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="logo">
                                Website Logo
                            </label>

                            <input type="file" name="logo" id="logo" class="form-control-file"
                                accept=".jpg,.jpeg,.png,.webp,.svg">

                            <small class="form-text text-muted">
                                JPG, PNG, WEBP or SVG. Maximum 2MB.
                            </small>

                        </div>

                        @if ($setting?->logo)
                            <div class="mb-3">

                                <p class="font-weight-bold mb-2">
                                    Current Logo
                                </p>

                                <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->site_name }}"
                                    class="img-thumbnail" style="max-width: 250px; max-height: 100px; object-fit: contain;">

                            </div>
                        @endif

                    </div>

                    {{-- Favicon --}}
                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="favicon">
                                Favicon
                            </label>

                            <input type="file" name="favicon" id="favicon" class="form-control-file"
                                accept=".ico,.png,.jpg,.jpeg,.webp">

                            <small class="form-text text-muted">
                                Recommended size: 32×32 or 64×64 pixels.
                            </small>

                        </div>

                        @if ($setting?->favicon)
                            <div class="mb-3">

                                <p class="font-weight-bold mb-2">
                                    Current Favicon
                                </p>

                                <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" class="img-thumbnail"
                                    style="width: 64px; height: 64px; object-fit: contain;">

                            </div>
                        @endif

                    </div>


                    <div class="form-group">

                        <label for="cv_file">
                            CV File
                        </label>

                        <input type="file" name="cv_file" id="cv_file"
                            class="form-control-file @error('cv_file') is-invalid @enderror" accept=".pdf,.doc,.docx">

                        <small class="form-text text-muted">
                            Allowed formats: PDF, DOC, DOCX. Maximum size: 5 MB.
                        </small>

                        @error('cv_file')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror

                        @if ($setting?->cv_file)
                            <div class="mt-3">

                                <a href="{{ asset('storage/' . $setting->cv_file) }}" target="_blank"
                                    class="btn btn-info btn-sm">

                                    <i class="fas fa-eye mr-1"></i>
                                    View Current CV

                                </a>

                                <a href="{{ asset('storage/' . $setting->cv_file) }}" download
                                    class="btn btn-success btn-sm">

                                    <i class="fas fa-download mr-1"></i>
                                    Download Current CV

                                </a>

                            </div>
                        @else
                            <div class="mt-2 text-muted">
                                No CV has been uploaded yet.
                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

        {{-- Contact Information --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Contact Information
                </h6>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="email">
                                Email Address
                            </label>

                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $setting?->email) }}" placeholder="contact@example.com">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="phone">
                                Phone Number
                            </label>

                            <input type="text" name="phone" id="phone"
                                class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone', $setting?->phone) }}" placeholder="+970 59 XXXXXXX">

                            @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label for="address">
                        Address
                    </label>

                    <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" rows="3"
                        placeholder="Gaza, Palestine">{{ old('address', $setting?->address) }}</textarea>

                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

        </div>

        {{-- Navbar Button --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Navbar Button
                </h6>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="navbar_button_text">
                                Button Text
                            </label>

                            <input type="text" name="navbar_button_text" id="navbar_button_text" class="form-control"
                                value="{{ old('navbar_button_text', $setting?->navbar_button_text) }}"
                                placeholder="Get in touch!">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="navbar_button_link">
                                Button Link
                            </label>

                            <input type="text" name="navbar_button_link" id="navbar_button_link" class="form-control"
                                value="{{ old('navbar_button_link', $setting?->navbar_button_link) }}"
                                placeholder="/contact-me">

                        </div>

                    </div>

                </div>

                <div class="custom-control custom-switch">

                    <input type="checkbox" name="navbar_button_active" id="navbar_button_active"
                        class="custom-control-input" value="1" @checked(old('navbar_button_active', $setting?->navbar_button_active ?? true))>

                    <label class="custom-control-label" for="navbar_button_active">

                        Show Navbar Button

                    </label>

                </div>

            </div>

        </div>

        {{-- Footer --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Footer Settings
                </h6>
            </div>

            <div class="card-body">

                <div class="form-group">

                    <label for="footer_text">
                        Footer Text
                    </label>

                    <textarea name="footer_text" id="footer_text" class="form-control" rows="3"
                        placeholder="Building modern and scalable web applications.">{{ old('footer_text', $setting?->footer_text) }}</textarea>

                </div>

                <div class="form-group">

                    <label for="copyright">
                        Copyright Text
                    </label>

                    <input type="text" name="copyright" id="copyright" class="form-control"
                        value="{{ old('copyright', $setting?->copyright) }}"
                        placeholder="© 2026 Ahmad Yasser. All rights reserved.">

                </div>

            </div>

        </div>

        {{-- SEO --}}
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    SEO Settings
                </h6>
            </div>

            <div class="card-body">

                <div class="form-group">

                    <label for="meta_title">
                        Meta Title
                    </label>

                    <input type="text" name="meta_title" id="meta_title" class="form-control"
                        value="{{ old('meta_title', $setting?->meta_title) }}"
                        placeholder="Ahmad Yasser | Software Engineer">

                </div>

                <div class="form-group">

                    <label for="meta_description">
                        Meta Description
                    </label>

                    <textarea name="meta_description" id="meta_description" class="form-control" rows="4"
                        placeholder="Portfolio description for search engines.">{{ old('meta_description', $setting?->meta_description) }}</textarea>

                </div>

                <div class="form-group">

                    <label for="keywords">
                        Keywords
                    </label>

                    <textarea name="keywords" id="keywords" class="form-control" rows="3"
                        placeholder="Laravel, PHP, Web Developer, Software Engineer">{{ old('keywords', $setting?->keywords) }}</textarea>

                    <small class="form-text text-muted">
                        Separate each keyword using a comma.
                    </small>

                </div>

            </div>

        </div>

        <button type="submit" class="btn btn-primary mb-4">

            <i class="fas fa-save mr-1"></i>
            Save Settings

        </button>

    </form>

@endsection
