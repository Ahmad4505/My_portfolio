@extends('Admin.layouts.master')

@section('title', 'Messages')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <div>

            <h1 class="h3 mb-1 text-gray-800">
                Messages
            </h1>

            <p class="mb-0 text-muted">
                Messages received from the contact form.
            </p>

        </div>

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

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex align-items-center justify-content-between">

            <h6 class="m-0 font-weight-bold text-primary">
                Messages List
            </h6>

            <span class="badge badge-primary">
                Total: {{ $messages->total() }}
            </span>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="thead-light">

                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th class="text-center">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($messages as $message)

                            <tr class="{{ !$message->is_read ? 'font-weight-bold bg-light' : '' }}">

                                <td>
                                    {{ $messages->firstItem() + $loop->index }}
                                </td>

                                <td>

                                    @if ($message->is_read)

                                        <span class="badge badge-secondary">
                                            Read
                                        </span>

                                    @else

                                        <span class="badge badge-success">
                                            New
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $message->name }}
                                </td>

                                <td>

                                    <a href="mailto:{{ $message->email }}">
                                        {{ $message->email }}
                                    </a>

                                </td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit(
                                        $message->subject,
                                        50
                                    ) }}
                                </td>

                                <td>
                                    {{ $message->created_at->format('Y-m-d H:i') }}
                                </td>

                                <td class="text-center"
                                    style="min-width: 150px;">

                                    <div class="d-flex justify-content-center align-items-center">

                                        <a href="{{ route('Admin.messages.show', $message) }}"
                                            class="btn btn-info btn-sm mr-1"
                                            title="View">

                                            <i class="fas fa-eye"></i>

                                        </a>

                                        @if ($message->is_read)

                                            <form action="{{ route('Admin.messages.mark-unread', $message) }}"
                                                method="POST"
                                                class="m-0 mr-1">

                                                @csrf
                                                @method('PATCH')

                                                <button type="submit"
                                                    class="btn btn-secondary btn-sm"
                                                    title="Mark as unread">

                                                    <i class="fas fa-envelope"></i>

                                                </button>

                                            </form>

                                        @endif

                                        <form action="{{ route('Admin.messages.destroy', $message) }}"
                                            method="POST"
                                            class="m-0">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                title="Delete"
                                                onclick="return confirm('Delete this message?')">

                                                <i class="fas fa-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-5">

                                    <i class="fas fa-envelope-open fa-3x text-gray-300 mb-3"></i>

                                    <h5>
                                        No messages found
                                    </h5>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            @if ($messages->hasPages())

                <div class="d-flex justify-content-center mt-4">
                    {{ $messages->links() }}
                </div>

            @endif

        </div>

    </div>

@endsection
