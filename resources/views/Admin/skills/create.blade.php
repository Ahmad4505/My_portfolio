@extends('Admin.layouts.master')

@section('title', 'Add Skill')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Add Skill
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('admin.skills.store') }}"
                method="POST">

                @csrf

                <div class="form-group">

                    <label for="name">
                        Skill Name
                    </label>

                    <input type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        placeholder="Laravel"
                        required>

                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="percentage">
                        Percentage
                    </label>

                    <input type="number"
                        name="percentage"
                        id="percentage"
                        class="form-control @error('percentage') is-invalid @enderror"
                        value="{{ old('percentage', 0) }}"
                        min="0"
                        max="100"
                        required>

                    @error('percentage')
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
                        placeholder="fab fa-laravel">

                    <small class="form-text text-muted">
                        Font Awesome example: fab fa-laravel
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

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Save

                </button>

                <a href="{{ route('admin.skills.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
