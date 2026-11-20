<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            return redirect()->route('home')
                ->fragment('contact')
                ->withErrors($validator)
                ->withInput();
        }

        ContactMessage::create($validator->validated());

        return redirect()->route('home')
            ->fragment('contact')
            ->with('contact_success', 'Thanks for reaching out! I\'ll get back to you soon.');
    }
}
