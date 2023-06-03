<div x-data
    @click="const target = $event.target.tagName.toLowerCase()
            const ignores = ['button','svg','path','a', 'img']
            const ideaLink = $event.target.closest('.idea-container').querySelector('.idea-link')

            !ignores.includes(target) && ideaLink.click()"
    class="flex transition duration-150 ease-in bg-white cursor-pointer idea-container hover:shadow-card rounded-xl">
    <div class="hidden px-5 py-8 border-r border-gray-100 md:block">
        <div class="text-center">
            <div class="text-2xl font-bold {{ $hasVoted ? 'text-blue' : 'text-gray-500' }}">{{ $votesCount }}</div>
            <div class="font-bold text-gray-500">Votes</div>
        </div>

        <div class="mt-8">
            @if ($hasVoted)
                <button
                    wire:click.prevent="vote"
                    class="w-20 px-4 py-3 font-bold text-white uppercase transition duration-150 ease-in border border-blue bg-blue hover:bg-blue-hover text-xxs rounded-xl"
                >Voted</button>
            @else
                <button
                    wire:click.prevent="vote"
                    class="w-20 px-4 py-3 font-bold uppercase transition duration-150 ease-in border border-gray-200 bg-gray-200 hover:border-gray-400 text-xxs rounded-xl"
                >Vote</button>
            @endif
        </div>
    </div>
    <div class="flex flex-col flex-1 px-2 py-6 mx-3 md:flex-row md:mx-0">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="flex flex-col justify-between w-full mx-0 mt-2 md:mx-4 md:mt-0">
            <h4 class="text-xl font-semibold">
                <a href="{{ route('idea.show', $idea) }}" class=" idea-link hover:underline">{{ $idea->title }}</a>
            </h4>
            <div class="mt-3 text-gray-600 line-clamp-3">{{ $idea->description }}</div>
            <div class="flex flex-col justify-between mt-6 space-y-3 md:flex-row md:items-center">
                <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                    <div>{{ $idea->created_at->diffForHumans() }}</div>
                    <div>&bull;</div>
                    <div>{{ $idea->category->name }}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 Comments</div>
                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                    <div class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">{{ $idea->status->name }}</div>
                    <button @click="isOpen = !isOpen"
                        class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                        <svg fill="currentColor" width="24" height="6">
                            <path
                                d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                style="color: rgba(163, 163, 163, .5)">
                        </svg>
                        <ul x-cloak x-show="isOpen" x-transition.origin.origin.top.left.duration.100ms
                            @click.away="isOpen = false" @keydown.escape.window="isOpen = false"
                            class="absolute z-10 py-3 font-semibold text-left bg-white w-44 shadow-dialog rounded-xl md:ml-8 top-8 md:top-6 -right-2 md:left-0">
                            <li><a href="#"
                                    class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as
                                    spam</a></li>
                            <li><a href="#"
                                    class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete
                                    post</a></li>
                        </ul>
                    </button>
                </div>

                <div class="flex items-center mt-4 md:hidden md:mt-0">
                    <div class="h-10 px-4 py-2 pr-8 text-center bg-gray-100 rounded-xl">
                        <div class="text-sm font-bold leading-none {{ $hasVoted ? 'text-blue' : 'text-gray-500' }}">{{ $votesCount }}</div>
                        <div class="font-semibold leading-none text-gray-400 text-xxs">Votes</div>
                    </div>
                    @if ($hasVoted)
                        <button
                            wire:click.prevent="vote"
                            class="w-20 bg-blue text-white px-4 py-3 -mx-5 font-bold uppercase transition duration-150 ease-in border border-blue text-xxs rounded-xl hover:bg-blue-hover"
                        >Voted</button>
                    @else
                        <button
                            wire:click.prevent="vote"
                            class="w-20 px-4 py-3 -mx-5 font-bold uppercase transition duration-150 ease-in bg-gray-200 border border-gray-200 text-xxs rounded-xl hover:border-gray-400"
                        >Vote</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div> <!-- end idea-container -->
