@extends('Admin.layouts.master')

@section('title', 'Edit Skill')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Edit Skill
            </h6>

        </div>

        <div class="card-body">

            <form action="{{ route('Admin.skills.update', $skill) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">

                    <label for="name">
                        Skill Name
                    </label>

                    <input type="text"
                        name="name"
                        id="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $skill->name) }}"
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
                        value="{{ old('percentage', $skill->percentage) }}"
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
                        value="{{ old('icon', $skill->icon) }}"
                        placeholder="fab fa-laravel">

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
                        value="{{ old('sort_order', $skill->sort_order) }}"
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
                    Update

                </button>

                <a href="{{ route('Admin.skills.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
