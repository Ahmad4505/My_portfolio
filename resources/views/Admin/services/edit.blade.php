@extends('Admin.layouts.master')

@section('title', 'Edit Service')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Edit Service
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('Admin.services.update', $service) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="title">
                        Service Title
                    </label>

                    <input type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $service->title) }}"
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
                        required>{{ old('description', $service->description) }}</textarea>

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
                                class="form-control"
                                value="{{ old('icon', $service->icon) }}"
                                placeholder="fas fa-code">

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
                                class="form-control"
                                value="{{ old('sort_order', $service->sort_order) }}"
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
                        class="form-control-file"
                        accept=".jpg,.jpeg,.png,.webp">

                </div>

                @if ($service->image)

                    <div class="mb-4">

                        <p class="font-weight-bold mb-2">
                            Current Image
                        </p>

                        <img src="{{ asset('storage/' . $service->image) }}"
                            alt="{{ $service->title }}"
                            class="img-thumbnail"
                            style="width: 240px; height: 160px; object-fit: cover;">

                    </div>

                @endif

                <div class="custom-control custom-switch mb-4">

                    <input type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        @checked(old('is_active', $service->is_active))>

                    <label class="custom-control-label"
                        for="is_active">

                        Active

                    </label>

                </div>

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Update

                </button>

                <a href="{{ route('Admin.services.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
