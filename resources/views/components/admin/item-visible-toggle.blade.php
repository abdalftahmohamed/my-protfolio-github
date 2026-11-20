@props(['item', 'resource'])

<form method="POST" action="{{ route('admin.items.visible', [$resource, $item->id]) }}">
    @csrf
    @method('PATCH')
    <button type="submit"
        class="inline-flex items-center gap-1.5 rounded-md border px-2 py-1 text-xs font-semibold transition {{ $item->visible ? 'border-app-success/40 text-app-success hover:bg-app-success/10' : 'border-app-line text-app-content-subtle hover:border-app-brand hover:text-app-brand' }}"
        title="{{ $item->visible ? 'Click to hide from the website' : 'Click to show on the website' }}">
        <span class="h-1.5 w-1.5 rounded-full {{ $item->visible ? 'bg-app-success' : 'bg-app-content-subtle' }}"></span>
        {{ $item->visible ? 'Visible' : 'Hidden' }}
    </button>
</form>
