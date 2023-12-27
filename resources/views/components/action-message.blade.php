@props(['on'])

<div x-data="{ shown: false }"
     x-init="@this.on('alert', () => { shown = true; toastr.success('Saved successfully.'); })"
     x-show.transition.out.opacity.duration.1500ms="shown"
     x-transition:leave.opacity.duration.1500ms
     style="display: none;"
    {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }}>
</div>
