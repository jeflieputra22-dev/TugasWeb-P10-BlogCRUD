@props(['title' => null])

<div {{ $attributes->merge(['class' => 'bg-white border border-slate-200 rounded-lg shadow-sm']) }}>
    @if ($title)
        <div class="px-5 pt-4">
            <h2 class="text-lg font-semibold">{{ $title }}</h2>
        </div>
    @endif

    <div class="px-5 py-3 text-slate-600">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="px-5 py-3 border-t border-slate-100 flex flex-wrap items-center gap-3 text-sm">
            {{ $footer }}
        </div>
    @endisset
</div>
