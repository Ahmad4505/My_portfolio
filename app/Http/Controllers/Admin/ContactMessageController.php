<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMe;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        $messages = ContactMe::latest()
            ->paginate(15);

        return view(
            'Admin.messages.index',
            compact('messages')
        );
    }

    public function show(ContactMe $message): View
    {
        if (!$message->is_read) {
            $message->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return view(
            'Admin.messages.show',
            compact('message')
        );
    }

    public function markUnread(ContactMe $message): RedirectResponse
    {
        $message->update([
            'is_read' => false,
            'read_at' => null,
        ]);

        return redirect()
            ->route('Admin.messages.index')
            ->with('success', 'Message marked as unread.');
    }

    public function destroy(ContactMe $message): RedirectResponse
    {
        $message->delete();

        return redirect()
            ->route('Admin.messages.index')
            ->with('success', 'Message deleted successfully.');
    }
}
