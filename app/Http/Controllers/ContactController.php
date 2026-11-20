<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageSubmitted;
use App\Models\ContactMessage;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        if ($validator->fails()) {
            return redirect()->to(route('home').'#contact')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        ContactMessage::create($data);

        $profile = Profile::first();
        $recipient = $profile?->email ?: config('mail.from.address');

        if ($recipient) {
            try {
                Mail::to($recipient, $profile?->name)
                    ->send(new ContactMessageSubmitted(
                        senderName: $data['name'],
                        senderEmail: $data['email'],
                        subjectLine: $data['subject'] ?? null,
                        messageBody: $data['message'],
                    ));
            } catch (Throwable $exception) {
                report($exception);
            }
        }

        return redirect()->to(route('home').'#contact')
            ->with('contact_success', 'Thanks for reaching out! I\'ll get back to you soon.');
    }
}
