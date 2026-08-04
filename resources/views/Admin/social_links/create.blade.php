@extends('Admin.layouts.master')

@section('title', 'Add Social Link')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Add Social Link
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('Admin.social-links.store') }}"
                method="POST">

                @csrf

                <div class="form-group">

                    <label for="platform">
                        Platform
                    </label>

                    <input type="text"
                        name="platform"
                        id="platform"
                        class="form-control @error('platform') is-invalid @enderror"
                        value="{{ old('platform') }}"
                        placeholder="GitHub"
                        required>

                    @error('platform')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="url">
                        URL
                    </label>

                    <input type="text"
                        name="url"
                        id="url"
                        class="form-control @error('url') is-invalid @enderror"
                        value="{{ old('url') }}"
                        placeholder="https://github.com/username"
                        required>

                    @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="icon">
                        Icon Class
                    </label>

                    <input type="text"
                        name="icon"
                        id="icon"
                        class="form-control @error('icon') is-invalid @enderror"
                        value="{{ old('icon') }}"
                        placeholder="fab fa-github">

                    <small class="form-text text-muted">
                        Font Awesome example: fab fa-github
                    </small>

                    @error('icon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

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

                <div class="custom-control custom-switch mb-4">

                    <input type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        checked>

                    <label class="custom-control-label"
                        for="is_active">

                        Show on website

                    </label>

                </div>

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Save

                </button>

                <a href="{{ route('Admin.social-links.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
