<?php

namespace App\Http\Controllers;

use App\Models\CallbackRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class CallbackRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fio' => 'required|string|max:255',
            'phone' => 'required|string'
        ]);

        $callbackRequest = null;

        try {
            $callbackRequest = CallbackRequest::create($validated);
        } catch (Throwable $exception) {
            Log::warning('Callback request could not be persisted.', [
                'error' => $exception->getMessage(),
                'fio' => $validated['fio'] ?? null,
                'phone' => $validated['phone'] ?? null,
            ]);
        }

        $callbackRequestTo = (string) config('mail.callback_request_to', '');
        $recipients = array_values(array_filter(array_map('trim', explode(',', $callbackRequestTo))));

        if (empty($recipients)) {
            Log::warning('Callback request email recipient is not configured.', [
                'fio' => $validated['fio'] ?? null,
                'phone' => $validated['phone'] ?? null,
            ]);
        } else {
            $subjectPrefix = trim((string) config('mail.callback_request_subject_prefix', ''));
            $subject = 'Новая заявка на обратный звонок';

            if ($subjectPrefix !== '') {
                $subject = $subjectPrefix . ' ' . $subject;
            }

            try {
                Mail::raw(
                    "Новая заявка на обратный звонок.\nИмя: {$validated['fio']}\nТелефон: {$validated['phone']}",
                    function ($message) use ($recipients, $subject) {
                        $message->to($recipients)
                            ->subject($subject);
                    }
                );
            } catch (Throwable $exception) {
                Log::warning('Callback request email could not be sent.', [
                    'error' => $exception->getMessage(),
                    'fio' => $validated['fio'] ?? null,
                    'phone' => $validated['phone'] ?? null,
                    'email' => $recipients,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Заявка отправлена! Мы свяжемся с вами в ближайшее время.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CallbackRequest $callbackRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CallbackRequest $callbackRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CallbackRequest $callbackRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CallbackRequest $callbackRequest)
    {
        //
    }
}
