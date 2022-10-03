<?php
use App\Http\Controllers\Webhooks\MailgunWebhookController;

Route::post('/email/webhook', MailgunWebhookController::class);