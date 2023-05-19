<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select id="category" name="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category1">Category One</option>
                <option value="Category2">Category Two</option>
                <option value="Category3">Category Three</option>
                <option value="Category4">Category Four</option>
            </select>
        </div>

        <div class="w-1/3">
            <select id="other_filters" name="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filter1">Filter One</option>
                <option value="Filter2">Filter Two</option>
                <option value="Filter3">Filter Three</option>
                <option value="Filter4">Filter Four</option>
            </select>
        </div>

        <div class="w-2/3 relative">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none px-4 py-2 pl-8 placeholder:text-gray-700">
        </div>
    </div> <!-- end filters -->

    <div class="ideas-container space-y-6 my-6">
        <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="font-bold text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-xxs uppercase rounded-xl px-4 py-3">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officii</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-yellow text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">
                                In Progress
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->

        <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-bold text-2xl text-blue">12</div>
                    <div class="font-bold text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-blue border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-xxs text-white uppercase rounded-xl px-4 py-3">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officiis eveniet Quidem dignissimos error quidem officia provident quaerat Excepturi est soluta veritatis ipsum voluptatem eum voluptatibus? Consectetur quae voluptatibus dignissimos repudiandae nam cumque Voluptates quidem dolor quis laboriosam itaque. Aspernatur facere accusamus doloremque tempora sint! Ullam ullam natus praesentium magnam unde? Iusto ullam ullam praesentium maiores delectus, temporibus? Fugit at voluptate optio velit exercitationem? Odio dolor exercitationem exercitationem deleniti nesciunt voluptatum nostrum in Exercitationem natus ad unde error ut. Voluptatem ea possimus non quam velit. Ipsum accusamus aspernatur eaque error molestiae dolorum! Nobis molestias vitae explicabo ipsa quo, iure Saepe nulla consectetur</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div
                            x-data="{ isOpen: false }"
                            class="flex items-center space-x-2"
                        >
                            <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">
                                Open
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
                                    class="absolute z-10 w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8"
                                >
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Mark as spam</a></li>
                                    <li><a href="#" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">Delete post</a></li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->

        <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="font-bold text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-xxs uppercase rounded-xl px-4 py-3">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officiis eveniet Quidem dignissimos error quidem officia provident quaerat Excepturi est soluta veritatis ipsum voluptatem eum voluptatibus? Consectetur quae voluptatibus dignissimos repudiandae nam cumque Voluptates quidem dolor quis laboriosam itaque. Aspernatur facere accusamus doloremque tempora sint! Ullam ullam natus praesentium magnam unde? Iusto ullam ullam praesentium maiores delectus, temporibus? Fugit at voluptate optio velit exercitationem? Odio dolor exercitationem exercitationem deleniti nesciunt voluptatum nostrum in Exercitationem natus ad unde error ut. Voluptatem ea possimus non quam velit. Ipsum accusamus aspernatur eaque error molestiae dolorum! Nobis molestias vitae explicabo ipsa quo, iure Saepe nulla consectetur</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-red text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">
                                Closed
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->

        <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="font-bold text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-xxs uppercase rounded-xl px-4 py-3">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officiis eveniet Quidem dignissimos error quidem officia provident quaerat Excepturi est soluta veritatis ipsum voluptatem eum voluptatibus? Consectetur quae voluptatibus dignissimos repudiandae nam cumque Voluptates quidem dolor quis laboriosam itaque. Aspernatur facere accusamus doloremque tempora sint! Ullam ullam natus praesentium magnam unde? Iusto ullam ullam praesentium maiores delectus, temporibus? Fugit at voluptate optio velit exercitationem? Odio dolor exercitationem exercitationem deleniti nesciunt voluptatum nostrum in Exercitationem natus ad unde error ut. Voluptatem ea possimus non quam velit. Ipsum accusamus aspernatur eaque error molestiae dolorum! Nobis molestias vitae explicabo ipsa quo, iure Saepe nulla consectetur</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-green text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">
                                Implemented
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->

        <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="font-bold text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-xxs uppercase rounded-xl px-4 py-3">Vote</button>
                </div>
            </div>
            <div class="flex flex-1 px-2 py-6">
                <div class="flex-none">
                    <a href="#">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="mx-4 w-full">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">Elit animi obcaecati minus velit vero libero officiis eveniet Quidem dignissimos error quidem officia provident quaerat Excepturi est soluta veritatis ipsum voluptatem eum voluptatibus? Consectetur quae voluptatibus dignissimos repudiandae nam cumque Voluptates quidem dolor quis laboriosam itaque. Aspernatur facere accusamus doloremque tempora sint! Ullam ullam natus praesentium magnam unde? Iusto ullam ullam praesentium maiores delectus, temporibus? Fugit at voluptate optio velit exercitationem? Odio dolor exercitationem exercitationem deleniti nesciunt voluptatum nostrum in Exercitationem natus ad unde error ut. Voluptatem ea possimus non quam velit. Ipsum accusamus aspernatur eaque error molestiae dolorum! Nobis molestias vitae explicabo ipsa quo, iure Saepe nulla consectetur</div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-purple text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 px-4 py-2">
                                Considering
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 ease-in py-2 px-3">
                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->
    </div> <!-- end ideas-container -->
</x-app-layout>

