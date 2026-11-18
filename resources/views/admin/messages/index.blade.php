<x-admin-layout title="Messages">
    @if ($messages->isEmpty())
        <p class="text-sm text-app-content-subtle">No messages yet.</p>
    @else
        <div class="divide-y divide-app-line rounded-2xl border border-app-line bg-app-admin-surface">
            @foreach ($messages as $message)
                <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center justify-between gap-4 px-5 py-4 hover:bg-app-surface-hover">
                    <div>
                        <p class="text-sm font-medium text-app-content">
                            {{ $message->name }}
                            @unless ($message->is_read)
                                <span class="ml-2 rounded-full bg-app-brand/20 px-2 py-0.5 text-xs text-app-brand-ink">New</span>
                            @endunless
                        </p>
                        <p class="text-xs text-app-content-subtle">{{ $message->email }} &middot; {{ $message->subject ?: 'No subject' }}</p>
                    </div>
                    <span class="shrink-0 text-xs text-app-content-subtle">{{ $message->created_at->diffForHumans() }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $messages->links() }}
        </div>
    @endif
</x-admin-layout>
