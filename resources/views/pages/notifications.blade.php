@extends('layouts.default')
@section('content')
    <x-container>
        <div class="flex items-center justify-between h-[50px] px-4 border-b border-primary">
            <h2 class="text-primary font-bold" href="{{ route('pages.home') }}">
                Notifications
            </h2>

            <div class="flex items-center gap-1">
                <a class="inline-block hover:bg-white/50 border border-primary text-primary rounded-full px-2" href="#">
                    Mark all
                </a>
            </div>
        </div>
        <ul class="relative *:font-semibold space-y-2 *:py-2  h-[600px] overflow-y-auto scrollbar-custom]">
            <template x-for="notification in notifications" :key="notification.id">
                <li class="border-b border-primary">
                    <h2 class="whitespace-nowrap">
                        You have new messages in the post:
                    </h2>
                    <h3 x-text="notification.post_title"></h3>
                    <a class="inline-block hover:bg-white/50 border border-primary rounded-full px-2 mt-2" href="#">
                        Mark as read
                    </a>
                </li>
            </template>
            @foreach ($notificationsFormated as $notication)
                <li class="{{ $loop->last ? '' : 'border-b border-primary' }}">
                    <h2 class="whitespace-nowrap text-primary">
                        You have new messages in the post:
                    </h2>
                    <h3 class="text-primary">{{ $notication['post_title'] }}</h3>
                    <a class="inline-block hover:bg-white/50 text-white border border-primary rounded-full px-2 mt-2" href="#">
                        Mark as read
                    </a>
                </li>
            @endforeach
        </ul>
        </div>
    </x-container>
@endsection
