@props(['type' => 'info'])

@php
    $styles = [
        'success' => 'bg-green-50 border-green-300 text-green-800',
        'danger'  => 'bg-red-50 border-red-300 text-red-800',
        'info'    => 'bg-blue-50 border-blue-300 text-blue-800',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'border rounded-lg px-4 py-3 text-sm ' . ($styles[$type] ?? $styles['info'])]) }} role="alert">
    {{ $slot }}
</div>
