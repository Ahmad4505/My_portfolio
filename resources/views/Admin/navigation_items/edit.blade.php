@extends('Admin.layouts.master')

@section('title', 'Edit Navbar Item')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Edit Navbar Item
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.navigation-items.update', $navigationItem) }}"
                method="POST">

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
                        value="{{ old('title', $navigationItem->title) }}"
                        required>

                    @error('title')

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
                        value="{{ old('url', $navigationItem->url) }}"
                        required>

                    @error('url')

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
                        class="form-control"
                        value="{{ old('sort_order', $navigationItem->sort_order) }}"
                        min="0">

                </div>

                <div class="custom-control custom-switch mb-4">

                    <input type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        @checked(old('is_active', $navigationItem->is_active))>

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

                <a href="{{ route('admin.navigation-items.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
