<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    @include('partials.theme-head')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-app-admin-page px-6 font-sans text-app-content antialiased transition-colors duration-500">
    <button type="button" data-theme-toggle
        class="fixed end-4 top-4 rounded-lg border border-app-line bg-app-admin-surface p-1.5 text-app-content transition hover:bg-app-surface-hover sm:end-6 sm:top-6 sm:p-2"
        aria-label="Toggle dark mode" aria-pressed="false">
        <svg class="theme-icon-dark h-4.5 w-4.5 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
        </svg>
        <svg class="theme-icon-light h-4.5 w-4.5 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/>
        </svg>
    </button>

    <div class="w-full max-w-sm">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-semibold text-app-content">Admin Login</h1>
            <p class="mt-1 text-sm text-app-content-subtle">Sign in to manage your portfolio</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4 rounded-2xl border border-app-line bg-app-admin-surface p-6 shadow-app-card">
            @csrf

            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" autofocus
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
                @error('email')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Password</label>
                <input type="password" name="password"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>

            <label class="flex items-center gap-2 text-xs text-app-content-subtle">
                <input type="checkbox" name="remember" class="rounded border-app-line bg-app-admin-surface">
                Remember me
            </label>

            <button type="submit" class="w-full rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
                Sign in
            </button>

            <a href="{{ route('home') }}" class="block text-center text-xs text-app-content-subtle hover:text-app-content">
                &larr; Back to site
            </a>
        </form>
    </div>
</body>
</html>
