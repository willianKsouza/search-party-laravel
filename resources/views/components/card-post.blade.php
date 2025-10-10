@props(['post'])
<div
    class="relative bg-white dark:bg-background rounded-lg shadow-lg p-4 flex flex-col justify-between"
>
    <div>
        <div>
            <h2
                class="text-lg font-semibold text-gray-900 dark:text-orange-500"
            >
                {{ $post->title }}
            </h2>
        </div>
        <p class="text-gray-700 dark:text-gray-300 mt-2">
            {{ $post->title }}
        </p>
    </div>
    <div class="mt-4 flex justify-between">
        <x-form.button
            x-on:click="openPostModal({{ $post->id }})"
        >
            {{ __('components.more_information_post_modal.buttons.view_more') }}
        </x-form.button>
    </div>
</div>
