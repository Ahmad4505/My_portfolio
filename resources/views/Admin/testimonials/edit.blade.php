@extends('Admin.layouts.master')

@section('title', 'Edit Testimonial')

@section('content')

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Edit Testimonial
            </h6>

        </div>

        <div class="card-body">

            <form
                action="{{ route(
                    'admin.testimonials.update',
                    $testimonial
                ) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

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
                                value="{{ old(
                                    'client_name',
                                    $testimonial->client_name
                                ) }}"
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
                                class="form-control"
                                required>

                                @for ($rating = 1; $rating <= 5; $rating++)

                                    <option
                                        value="{{ $rating }}"
                                        @selected(
                                            old(
                                                'rating',
                                                $testimonial->rating
                                            ) == $rating
                                        )>

                                        {{ $rating }} Star{{ $rating > 1 ? 's' : '' }}

                                    </option>

                                @endfor

                            </select>

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
                                value="{{ old(
                                    'job_title',
                                    $testimonial->job_title
                                ) }}">

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
                                value="{{ old(
                                    'company',
                                    $testimonial->company
                                ) }}">

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
                        required>{{ old(
                            'review',
                            $testimonial->review
                        ) }}</textarea>

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
                        class="form-control-file"
                        accept=".jpg,.jpeg,.png,.webp">

                </div>

                @if ($testimonial->image)

                    <div class="mb-4">

                        <p class="font-weight-bold mb-2">
                            Current Image
                        </p>

                        <img
                            src="{{ asset(
                                'storage/' . $testimonial->image
                            ) }}"
                            alt="{{ $testimonial->client_name }}"
                            class="rounded-circle img-thumbnail"
                            style="width: 120px; height: 120px; object-fit: cover;">

                    </div>

                @endif

                <div class="custom-control custom-switch mb-4">

                    <input
                        type="checkbox"
                        name="is_active"
                        id="is_active"
                        class="custom-control-input"
                        value="1"
                        @checked(
                            old(
                                'is_active',
                                $testimonial->is_active
                            )
                        )>

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
                    Update

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
