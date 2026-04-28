<?php

use App\Mail\CallbackRequestSubmitted;
use App\Models\CallbackRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

it('stores a callback request and sends a notification email', function () {
    Mail::fake();
    Config::set('services.callback_requests.notification_to', 'manager@example.com');

    $response = $this->postJson(route('callback.store'), [
        'fio' => 'Иван Иванов',
        'phone' => '+7 999 123-45-67',
    ]);

    $response->assertOk()
        ->assertJson([
            'success' => true,
            'message' => 'Заявка отправлена! Мы свяжемся с вами в ближайшее время.',
        ]);

    $this->assertDatabaseHas(CallbackRequest::class, [
        'fio' => 'Иван Иванов',
        'phone' => '+7 999 123-45-67',
    ]);

    Mail::assertSent(CallbackRequestSubmitted::class, function (CallbackRequestSubmitted $mail) {
        return $mail->hasTo('manager@example.com')
            && $mail->callbackRequest->fio === 'Иван Иванов'
            && $mail->callbackRequest->phone === '+7 999 123-45-67';
    });
});
