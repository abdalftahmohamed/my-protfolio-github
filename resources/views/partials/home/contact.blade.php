@php
    $addressData = array_filter([
        $profile?->location ? ['title' => 'Address', 'description' => $profile->location, 'icon' => 'location'] : null,
        $profile?->email ? ['title' => 'My Email', 'description' => $profile->email, 'icon' => 'envelope'] : null,
        $profile?->phone ? ['title' => 'Call Me Now', 'description' => $profile->phone, 'icon' => 'phone'] : null,
    ]);
@endphp

<div class="reveal relative -bottom-10 -mt-10 z-10 w-full px-4 sm:px-6 xxl:px-10">
    <div class="w-full surface-card relative overflow-hidden rounded-3xl p-6 sm:p-10 lg:p-16" id="contact">
        <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-transparent via-app-brand to-transparent"></div>
        <div class="ambient-orb -right-20 -top-24 h-64 w-64 bg-app-brand/10"></div>

        <div class="relative z-10 grid gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <span class="section-kicker mb-4">Get in touch</span>
                <p class="text-2xl sm:text-3xl lg:text-[38px] leading-tight font-semibold text-app-content">
                    Let's discuss your <span class="gradient-text">next project</span>
                </p>
                <p class="mt-4 max-w-md text-[13px] xs:text-[14px] sm:text-base leading-relaxed font-normal text-app-content-muted">
                    I'm available for freelance and full-time backend work. Drop me a line if you have a project I'd be a good fit for.
                </p>

                @if (count($addressData))
                    <div class="mt-8 space-y-3">
                        @foreach ($addressData as $item)
                            <div class="group flex items-center gap-4 rounded-2xl border border-app-line bg-app-page/50 p-4 transition-all duration-300 hover:border-app-brand/40 hover:shadow-app-card">
                                <div class="icon-tile h-11 w-11 shrink-0 group-hover:bg-app-brand group-hover:text-white transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        @switch($item['icon'])
                                            @case('location')
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0Z"/><circle cx="12" cy="10" r="3"/>
                                                @break
                                            @case('envelope')
                                                <rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-10 6L2 7"/>
                                                @break
                                            @case('phone')
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z"/>
                                        @endswitch
                                    </svg>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-[12px] md:text-[13px] text-app-content-subtle font-medium">{{ $item['title'] }}</p>
                                    <p class="text-[14px] md:text-[16px] text-app-content font-semibold break-words">{{ $item['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="relative z-10 rounded-2xl border border-app-line bg-app-page/40 p-5 sm:p-7">
                @if (session('contact_success'))
                    <p class="mb-5 flex items-center gap-2 rounded-xl border border-app-success/30 bg-app-success/10 px-4 py-3 text-sm text-app-success">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m20 6-11 11-5-5"/>
                        </svg>
                        {{ session('contact_success') }}
                    </p>
                @endif

                <p class="mb-5 text-lg font-semibold text-app-content">Send a message</p>

                <form method="POST" action="{{ route('contact.store') }}" class="flex flex-col gap-4">
                    @csrf

                    <div>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name*"
                            class="input input-lg form-field border-0 border-b-2 focus:outline-none w-full rounded-none px-0">
                        @error('name')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email address*"
                            class="input input-lg form-field border-0 border-b-2 focus:outline-none w-full rounded-none px-0">
                        @error('email')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Subject"
                            class="input input-lg form-field border-0 border-b-2 focus:outline-none w-full rounded-none px-0">
                        @error('subject')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <textarea name="message" rows="3" placeholder="Tell me about your project*"
                            class="textarea textarea-lg form-field border-0 border-b-2 focus:outline-none w-full rounded-none px-0">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 w-fit gap-3 rounded-full px-7 text-[13px] md:text-[15px] font-semibold">
                        Send message
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-4 md:w-5 aspect-square" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
