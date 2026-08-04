@extends('Admin.layouts.master')

@section('title', 'Message Details')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Message Details
            </h1>

            <p class="mb-0 text-muted">
                Received {{ $message->created_at->diffForHumans() }}
            </p>

        </div>

        <a href="{{ route('Admin.messages.index') }}"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left mr-1"></i>
            Back

        </a>

    </div>

    <div class="row">

        <div class="col-xl-8">

            <div class="card shadow mb-4">

                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ $message->subject }}
                    </h6>

                </div>

                <div class="card-body">

                    <div class="mb-4">

                        <small class="text-muted d-block mb-2">
                            Message
                        </small>

                        <div class="p-4 bg-light rounded"
                            style="white-space: pre-wrap; line-height: 1.8;">

                            {{ $message->message }}

                        </div>

                    </div>

                    <div class="d-flex flex-wrap">

                        <a href="mailto:{{ $message->email }}?subject={{ urlencode('Re: ' . $message->subject) }}"
                            class="btn btn-primary mr-2 mb-2">

                            <i class="fas fa-reply mr-1"></i>
                            Reply by Email

                        </a>

                        @if ($message->phone)

                            <a href="tel:{{ $message->phone }}"
                                class="btn btn-success mr-2 mb-2">

                                <i class="fas fa-phone mr-1"></i>
                                Call

                            </a>

                        @endif

                        <form action="{{ route('Admin.messages.mark-unread', $message) }}"
                            method="POST"
                            class="mr-2 mb-2">

                            @csrf
                            @method('PATCH')

                            <button type="submit"
                                class="btn btn-secondary">

                                <i class="fas fa-envelope mr-1"></i>
                                Mark Unread

                            </button>

                        </form>

                        <form action="{{ route('Admin.messages.destroy', $message) }}"
                            method="POST"
                            class="mb-2">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Delete this message?')">

                                <i class="fas fa-trash mr-1"></i>
                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-xl-4">

            <div class="card shadow mb-4">

                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary">
                        Sender Information
                    </h6>

                </div>

                <div class="card-body">

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Name
                        </small>

                        <strong>
                            {{ $message->name }}
                        </strong>

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Email
                        </small>

                        <a href="mailto:{{ $message->email }}">
                            {{ $message->email }}
                        </a>

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Phone
                        </small>

                        @if ($message->phone)

                            <a href="tel:{{ $message->phone }}">
                                {{ $message->phone }}
                            </a>

                        @else

                            <span class="text-muted">
                                Not provided
                            </span>

                        @endif

                    </div>

                    <div class="mb-3">

                        <small class="text-muted d-block">
                            Received
                        </small>

                        {{ $message->created_at->format('Y-m-d H:i') }}

                    </div>

                    <div>

                        <small class="text-muted d-block">
                            Status
                        </small>

                        @if ($message->is_read)

                            <span class="badge badge-secondary">
                                Read
                            </span>

                        @else

                            <span class="badge badge-success">
                                New
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
