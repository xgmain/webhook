<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Webhooks\MailgunWebhook;
use App\Models\Message;
use Illuminate\Http\Request;

class MailgunWebhookController extends Controller
{
    public function __construct()
    {
        $this->middleware(MailgunWebhook::class);
    }

    public function __invoke(Request $request)
    {
        $data = $request->get('event-data');
        $message_id = $data['message']['headers']['message-id'];

        if ($email = Message::whereMessageId($message_id)->first()) {
            $email->update(["{$data['event']}_at" => now()]);
        }
    }
}
