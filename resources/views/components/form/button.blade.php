<button
    {{ $attributes->merge(["class" => "flex justify-center items-center px-4 py-2 rounded-md text-primary hover:text-white border border-border hover:bg-background-hover"]) }}
>
    {{ $slot }}
</button>
