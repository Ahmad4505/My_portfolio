@extends('Admin.layouts.master')

@section('title', 'Add Testimonial')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Add Testimonial
            </h6>

        </div>

        <div class="card-body">

            <form
                action="{{ route('admin.testimonials.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="client_name">
                                Client Name
                            </label>

                            <input
                                type="text"
                                name="client_name"
                                id="client_name"
                                class="form-control @error('client_name') is-invalid @enderror"
                                value="{{ old('client_name') }}"
                                placeholder="John Smith"
                                required>

                            @error('client_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="rating">
                                Rating
                            </label>

                            <select
                                name="rating"
                                id="rating"
                                class="form-control @error('rating') is-invalid @enderror"
                                required>

                                <option value="">
                                    Select rating
                                </option>

                                @for ($rating = 1; $rating <= 5; $rating++)

                                    <option
                                        value="{{ $rating }}"
                                        @selected(old('rating', 5) == $rating)>

                                        {{ $rating }} Star{{ $rating > 1 ? 's' : '' }}

                                    </option>

                                @endfor

                            </select>

                            @error('rating')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="job_title">
                                Job Title
                            </label>

                            <input
                                type="text"
                                name="job_title"
                                id="job_title"
                                class="form-control"
                                value="{{ old('job_title') }}"
                                placeholder="Project Manager">

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label for="company">
                                Company
                            </label>

                            <input
                                type="text"
                                name="company"
                                id="company"
                                class="form-control"
                                value="{{ old('company') }}"
                                placeholder="Tech Company">

                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label for="review">
                        Review
                    </label>

                    <textarea
                        name="review"
                        id="review"
                        class="form-control @error('review') is-invalid @enderror"
                        rows="6"
                        placeholder="Write the client review..."
                        required>{{ old('review') }}</textarea>

                    @error('review')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="image">
                        Client Image
                    </label>

                    <input
                        type="file"
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

                    <input
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        checked>

                    <label
                        class="custom-control-label"
                        for="is_active">

                        Show this testimonial on the website

                    </label>

                </div>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save mr-1"></i>
                    Save

                </button>

                <a
                    href="{{ route('admin.testimonials.index') }}"
                    class="btn btn-secondary">

                    Cancel

                </a>

            </form>

        </div>

    </div>

@endsection
