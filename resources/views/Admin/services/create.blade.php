@extends('Admin.layouts.master')

@section('title', 'Add Service')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Add Service
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('Admin.services.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label for="title">
                        Service Title
                    </label>

                    <input type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Custom Web Applications"
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
                        rows="5"
                        placeholder="Write the service description..."
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

                            <label for="icon">
                                Icon Class
                            </label>

                            <input type="text"
                                name="icon"
                                id="icon"
                                class="form-control @error('icon') is-invalid @enderror"
                                value="{{ old('icon') }}"
                                placeholder="fas fa-code">

                            <small class="form-text text-muted">
                                Example: fas fa-code
                            </small>

                        </div>

                    </div>

                    <div class="col-md-6">

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

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label for="image">
                        Service Image
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

                <div class="custom-control custom-switch mb-4">

                    <input type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        checked>

                    <label class="custom-control-label"
                        for="is_active">

                        Active

                    </label>

                </div>

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Save

                </button>

                <a href="{{ route('Admin.services.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
