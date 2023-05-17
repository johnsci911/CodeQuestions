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
        <div class="idea-container bg-white rounded-xl flex">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 transition duration-150 ease-in font-bold text-xs uppercase rounded-xl px-4 py-3">Vote</button>
                </div>
            </div>
        </div> <!-- end idea-container -->
    </div> <!-- end ideas-container -->
</x-app-layout>

