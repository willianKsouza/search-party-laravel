@props(['mobile' => false])

{{-- <ul {{ $attributes->merge(['class' => $mobile ? 'flex items-center gap-2 overflow-x-auto scrollbar-custom py-1' : 'flex items-center gap-2 flex-wrap']) }}>
    {{ $slot }}
</ul> --}}

<ul 
    {{ $attributes->merge([
        'class' => $mobile 
            ? 'flex items-center gap-2 overflow-x-auto whitespace-nowrap scrollbar-custom py-1' 
            : 'flex items-center gap-2 flex-wrap'
    ]) }}
>
    {{ $slot }}
</ul>


