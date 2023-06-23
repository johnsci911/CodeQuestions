<div class="relative flex mt-4 bg-white is-admin comment-container rounded-xl">
    <div class="flex flex-col flex-1 px-4 py-6 md:flex-row">
        <div class="flex-none w-14">
            <a href="#">
                <img src="{{ $comment->user->getAvatar() }}" alt="avatar"
                    class="w-14 h-14 rounded-xl">
            </a>
            <div class="mt-1 font-bold text-center uppercase text-blue text-xxs">{{ $comment->user->name }}</div>
        </div>
        <div class="w-full md:mx-4">
            <h4 class="text-xl font-semibold">
                <a href="#" class="hover:underline">Temp owner's name</a>
            </h4>
            <div class="mt-3 text-gray-600 line-clamp-3">{{ $comment->body }}</div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center space-x-2 text-xs font-semibold text-gray-400">
                    <div class="font-bold text-blue">{{ $comment->user->name }}</div>
                    <div>&bull;</div>
                    <div>{{ $comment->created_at->diffForHumans() }}</div>
                </div>
                <div x-data="{ isOpen: false }" class="flex items-center space-x-2">
                    <div class="relative">
                        <button @click="isOpen = !isOpen"
                            class="relative px-3 py-2 transition duration-150 ease-in bg-gray-100 border rounded-full hover:bg-gray-200 h-7">
                            <svg fill="currentColor" width="24" height="6">
                                <path
                                    d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                    style="color: rgba(163, 163, 163, .5)">
                            </svg>
                        </button>
                        <ul x-cloak x-show="isOpen" x-transition.origin.origin.top.left.duration.100ms
                            @click.away="isOpen = false" @keydown.escape.window="isOpen = false"
                            class="absolute right-0 z-10 py-3 font-semibold text-left bg-white w-44 shadow-dialog rounded-xl md:ml-8 top-8 md:left-0"
                        >
                            <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Mark as spam</a></li>
                            <li><a href="#" class="block px-5 py-3 transition duration-150 ease-in hover:bg-gray-100">Delete post</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end comment-container -->

