<div class="container idea-and-buttons">
    <div class="flex mx-3 mt-4 bg-white idea-container rounded-xl md:mx-0">
        <div class="flex flex-col flex-1 px-4 py-6 md:flex-row">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mt-3 md:mx-4 md:mt-0">
                <h4 class="text-xl font-semibold">
                    {{ $idea->title }}
                </h4>
                <div class="mt-3 text-gray-600">{{ $idea->description }}</div>
                <div class="flex flex-col justify-between mt-6 space-y-3 md:flex-row md:items-center md:space-y-0">
                    <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                        <div class="hidden font-bold text-gray-900 md:block">{{ $idea->user->name }}</div>
                        <div class="hidden md:block">&bull;</div>
                        <div>{{ $idea->created_at->diffForHumans() }}</div>
                        <div>&bull;</div>
                        <div>{{ $idea->category->name }}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 Comments</div>
                    </div>
                    <div
                        x-data="{ isOpen: false }"
                        class="flex items-center space-x-2"
                    >
                        <div
                            @class([
                                'bg-gray-200' => $idea->status->id === 1,
                                'bg-purple text-white' => $idea->status->id === 2,
                                'bg-yellow text-white' => $idea->status->id === 3,
                                'bg-green text-white' => $idea->status->id === 4,
                                'bg-red text-white' => $idea->status->id === 5,
                                "text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4"
                            ])
                        >
                            {{ $idea->status->name }}
                        </div>
                        <button
                            @click="isOpen = !isOpen"
                            class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.origin.top.left.duration.100ms
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="absolute z-10 py-3 font-semibold text-left bg-white w-44 shadow-dialog rounded-xl md:ml-8 top-10 md:top-6 -right-2 md:left-0"
                            >
                                <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as spam</a></li>
                                <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete post</a></li>
                            </ul>
                        </button>
                    </div>

                    <div class="flex items-center mt-4 md:hidden md:mt-0">
                        <div class="h-10 px-4 py-2 pr-8 text-center bg-gray-100 rounded-xl">
                            <div class="text-sm font-bold {{ $hasVoted ? 'text-blue' : 'text-gray-500' }} leading-none">{{ $votesCount }}</div>
                            <div class="font-semibold leading-none text-gray-400 text-xxs">Votes</div>
                        </div>
                        @if ($hasVoted)
                            <button
                                wire:click.prevent="vote"
                                class="w-20 bg-blue text-white px-4 py-3 -mx-5 font-bold uppercase transition duration-150 ease-in border border-blue text-xxs rounded-xl hover:bg-blue-hover"
                            >
                                Voted
                            </button>
                        @else
                            <button
                                wire:click.prevent="vote"
                                class="w-20 px-4 py-3 -mx-5 font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 text-xxs rounded-xl hover:border-gray-400"
                            >
                                Vote
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="flex items-center justify-between mt-6 buttons-container">
        <div class="flex flex-col items-center space-x-4 md:flex-row md:ml-6">
            <div
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center w-32 px-6 py-3 text-sm font-semibold text-white transition duration-150 ease-in border h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover"
                >
                    <span class="ml-1">Reply</span>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left.duration.100ms
                    @click.away.window="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-10 w-64 mt-2 text-sm font-semibold text-left bg-white md:w-104 shadow-dialog rounded-xl"
                >
                    <form action="#" class="px-4 py-6 space-y-4">
                        <textarea id="post_comment" name="post_comment" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Go ahead, don't be shy. Share your thoughts..." cols="30" rows="4"></textarea>
                        <div class="flex flex-col items-center space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                            <button
                                type="button"
                                class="flex items-center justify-center w-full px-6 py-3 text-sm font-semibold text-white transition duration-150 ease-in border md:w-1/2 h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover"
                            >
                                Post Comment
                            </button>
                            <button
                                type="button"
                                class="flex items-center justify-center w-full px-6 py-3 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 md:w-32 h-11 rounded-xl hover:border-gray-400"
                            >
                                <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @auth
                @if (auth()->user()->isAdmin())
                    <livewire:set-status :idea="$idea" />
                @endif
            @endauth
        </div>
        <div class="items-center hidden space-x-3 md:flex">
            <div class="px-3 py-2 font-semibold text-center bg-white rounded-xl">
                <div class="text-xl {{ $hasVoted ? 'text-blue' : 'text-gray-500' }} leading-snug">{{  $votesCount  }}</div>
                <div class="text-xs leading-none text-gray-400">Votes</div>
            </div>
            @if ($hasVoted)
                <button
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 bg-blue text-white px-6 py-3 text-xs font-semibold uppercase transition duration-150 ease-in border border-blue h-11 rounded-xl hover:bg-blue-hover"
                >
                    <span class="ml-1">Voted</span>
                </button>
            @else
                <button
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 px-6 py-3 text-xs font-semibold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 h-11 rounded-xl hover:border-gray-400"
                >
                    <span class="ml-1">Vote</span>
                </button>
            @endif
        </div>
    </div> <!-- End buttons-container -->
</div> <!-- End Idea and Buttons container -->
