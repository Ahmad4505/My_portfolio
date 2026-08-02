@extends('Admin.layouts.master')

@section('title', 'Project Gallery')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Project Gallery
            </h1>

            <p class="mb-0 text-muted">
                {{ $project->title }}
            </p>

        </div>

        <a href="{{ route('admin.projects.index') }}"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left mr-1"></i>
            Back to Projects

        </a>

    </div>

    @if (session('success'))

        <div class="alert alert-success alert-dismissible fade show"
            role="alert">

            {{ session('success') }}

            <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

    @endif

    @if ($errors->any())

        <div class="alert alert-danger alert-dismissible fade show"
            role="alert">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

            <button type="button"
                class="close"
                data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Upload Images
            </h6>

        </div>

        <div class="card-body">

            <form
                action="{{ route(
                    'admin.projects.gallery.store',
                    $project
                ) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label for="images">
                        Select Project Images
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        id="images"
                        class="form-control-file @error('images') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                        multiple
                        required>

                    <small class="form-text text-muted">
                        You can select multiple images. Maximum 3MB per image.
                    </small>

                </div>

                <button type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-upload mr-1"></i>
                    Upload Images

                </button>

            </form>

        </div>

    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                Gallery Images
            </h6>

        </div>

        <div class="card-body">

            <div class="row">

                @forelse ($project->images as $image)

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">

                        <div class="card h-100 shadow-sm">

                            <div class="ratio ratio-4x3">

                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    alt="{{ $project->title }}"
                                    class="card-img-top"
                                    style="width: 100%; height: 220px; object-fit: cover;">

                            </div>

                            <div class="card-body p-3 text-center">

                                <form
                                    action="{{ route(
                                        'admin.projects.gallery.destroy',
                                        [$project, $image]
                                    ) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm(
                                            'Delete this image?'
                                        )">

                                        <i class="fas fa-trash mr-1"></i>
                                        Delete

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12">

                        <div class="text-center py-5">

                            <i class="fas fa-images fa-3x text-gray-300 mb-3"></i>

                            <h5>
                                No gallery images found
                            </h5>

                            <p class="text-muted mb-0">
                                Upload images using the form above.
                            </p>

                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

@endsection
