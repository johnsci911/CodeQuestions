<x-app-layout>
    <div class="mx-3 md:mx-0">
        <a class="flex items-center font-semibold hover:underline" href="/">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All Ideas</span>
        </a>
    </div>

    <div class="idea-container bg-white rounded-xl flex mt-4 mx-3 md:mx-0">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="md:mx-4 mt-3 md:mt-0 w-full">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">{{ $idea->title }}</a>
                </h4>
                <div class="text-gray-600 mt-3">{{ $idea->description }}</div>
                <div class="flex flex-col md:flex-row md:items-center space-y-3 md:space-y-0 justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">{{ $idea->user->name }}</div>
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
                        <div class="{{ $idea->status->classes }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">
                            {{ $idea->status->name }}
                        </div>
                        <button
                            @click="isOpen = !isOpen"
                            class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                x-cloak
                                x-show="isOpen"
                                x-transition.origin.origin.top.left.duration.100ms
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                                class="absolute z-10 w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-10 md:top-6 -right-2 md:left-0"
                            >
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Delete post</a></li>
                            </ul>
                        </button>
                    </div>

                    <div class="flex items-center md:hidden mt-4 md:mt-0">
                        <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                            <div class="text-sm font-bold leading-none">12</div>
                            <div class="text-xxs font-semibold leading-none text-gray-400">Votes</div>
                        </div>
                        <button class="w-20 bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-xl hover:border-gray-400 transition duration-150 ease-in px-4 py-3 -mx-5">
                            Voted
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->

    <div class="buttons-container flex items-center justify-between mt-6">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center w-32 h-11 text-sm bg-blue font-semibold text-white rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                >
                    <span class="ml-1">Reply</span>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left.duration.100ms
                    @click.away.window="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
                >
                    <form action="#" class="space-y-4 px-4 py-6">
                        <textarea id="post_comment" name="post_comment" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Go ahead, don't be shy. Share your thoughts..." cols="30" rows="4"></textarea>
                        <div class="flex flex-col md:flex-row items-center md:space-x-3 space-y-2 md:space-y-0">
                            <button
                                type="button"
                                class="flex items-center justify-center w-full md:w-1/2 h-11 text-sm bg-blue font-semibold text-white rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                Post Comment
                            </button>
                            <button
                                type="button"
                                class="flex items-center justify-center w-full md:w-32 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                            >
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center w-36 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-3 md:mt-0"
                >
                    <span>Set Status</span>
                    <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <div
                    x-cloak
                    x-show="isOpen"
                    x-transition.origin.top.left.duration.100ms
                    @click.away.window="isOpen = false"
                    @keydown.escape.window="isOpen = false"
                    class="absolute z-20 w-64 md:w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
                >
                    <form action="#" class="space-y-4 px-4 py-6">
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked class="bg-gray-200 text-gray-900 border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="bg-gray-200 text-purple border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="bg-gray-200 text-yellow border-none" name="radio-direct" value="1">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="bg-gray-200 text-green border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" class="bg-gray-200 text-red border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <textarea id="update_comment" name="update_comment" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" cols="30" rows="3" placeholder="Add or update comment (Optional)"></textarea>
                        </div>

                        <div class="flex flex-col md:flex-row items-center justify-between md:space-x-3 space-y-2 md:space-y-0">
                            <button
                                type="button"
                                class="flex items-center justify-center w-full md:w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                            >
                                <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>

                                <span class="ml-1">Attach</span>
                            </button>
                            <button
                                type="submit"
                                class="flex items-center justify-center w-full md:w-1/2 h-11 text-xs bg-blue font-semibold text-white rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >Update</button>
                        </div>

                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input type="checkbox" name="notify_voters" class="rounded bg-gray-200 border-none">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">12</div>
                <div class="text-gray-400 text-xs leading-none">Votes</div>
            </div>
            <button
                type="button"
                class="w-32 h-11 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
            >
                <span class="ml-1">Vote</span>
            </button>
        </div>
    </div> <!-- End buttons-container -->

    <div class="comments-container relative space-y-6 mx-4 md:mr-0 md:ml-22 pt-4 my-8 mt-1">
        <div class="is-admin comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="w-14 flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                    <div class="text-center text-blue uppercase text-xxs font-bold mt-1">Admin</div>
                </div>
                <div class="md:mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">Status changed to under consideration</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officii</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-blue">John Karlo</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2"
                        >
                            <button
                                @click="isOpen = !isOpen"
                                class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3"
                            >
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                <ul
                                    x-cloak
                                    x-show="isOpen"
                                    x-transition.origin.origin.top.left.duration.100ms
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen = false"
                                    class="absolute z-10 w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8 top-8 right-0 md:left-0"
                                >
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment-container -->

        <div class="comment-container relative bg-white rounded-xl flex mt-4">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=5" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="md:mx-4 w-full">
                    <!-- <h4 class="text-xl font-semibold"> -->
                    <!--     <a href="#" class="hover:underline">Status changed to under consideration</a> -->
                    <!-- </h4> -->
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officii</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="font-bold text-gray-900">Drake</div>
                            <div>&bull;</div>
                            <div>10 hours ago</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end comment-container -->
    </div> <!-- comments-container -->
</x-app-layout>

