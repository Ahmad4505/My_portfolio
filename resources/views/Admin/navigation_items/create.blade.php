@extends('Admin.layouts.master')

@section('title', 'Add Navbar Item')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Add Navbar Item
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.navigation-items.store') }}"
                method="POST">

                @csrf

                <div class="form-group">

                    <label for="title">
                        Title
                    </label>

                    <input type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        placeholder="Projects"
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
                        value="{{ old('url') }}"
                        placeholder="/projects"
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
                        value="{{ old('sort_order', 0) }}"
                        min="0">

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

                <a href="{{ route('admin.navigation-items.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
