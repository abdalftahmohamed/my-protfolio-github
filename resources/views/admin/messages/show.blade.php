<x-admin-layout title="Message">
    <div class="rounded-2xl border border-app-line bg-app-admin-surface p-6">
        <div class="mb-6 flex items-start justify-between">
            <div>
                <h2 class="text-lg font-semibold text-app-content">{{ $message->subject ?: 'No subject' }}</h2>
                <p class="mt-1 text-sm text-app-content-subtle">
                    From <span class="text-app-content">{{ $message->name }}</span>
                    &lt;<a href="mailto:{{ $message->email }}" class="text-app-brand hover:text-app-brand-ink">{{ $message->email }}</a>&gt;
                </p>
                <p class="mt-1 text-xs text-app-content-subtle">{{ $message->created_at->format('M j, Y \a\t g:i A') }}</p>
            </div>
            <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-sm text-app-error hover:opacity-80">Delete</button>
            </form>
        </div>

        <p class="whitespace-pre-line text-sm leading-relaxed text-app-content">{{ $message->message }}</p>
    </div>

    <a href="{{ route('admin.messages.index') }}" class="mt-6 inline-block text-sm text-app-content-subtle hover:text-app-content">&larr; Back to messages</a>
</x-admin-layout>
