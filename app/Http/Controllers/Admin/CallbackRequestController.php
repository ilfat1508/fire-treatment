<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CallbackRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CallbackRequestController extends Controller
{
    /**
     * Display callback requests by active tab.
     */
    public function index(Request $request): View
    {
        $tab = $request->query('tab', 'unread');
        $tab = in_array($tab, ['unread', 'read'], true) ? $tab : 'unread';

        $callbackRequests = CallbackRequest::query()
            ->when($tab === 'read', fn ($query) => $query->read())
            ->when($tab === 'unread', fn ($query) => $query->unread())
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.callback_requests.index', compact('callbackRequests', 'tab'));
    }

    /**
     * Mark request as read.
     */
    public function markAsRead(CallbackRequest $callbackRequest): RedirectResponse
    {
        $callbackRequest->markAsRead();

        return back()->with('status', 'Заявка помечена как прочитанная.');
    }

    /**
     * Mark request as unread.
     */
    public function markAsUnread(CallbackRequest $callbackRequest): RedirectResponse
    {
        $callbackRequest->markAsUnread();

        return back()->with('status', 'Заявка помечена как непрочитанная.');
    }
}
