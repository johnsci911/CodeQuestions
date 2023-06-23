<div>
    <div class="flex flex-col space-y-4 filters md:flex-row md:space-x-6 md:space-y-0">
        <div class="w-full px-4 md:px-0 md:w-1/3">
            <select wire:model="category" id="category" name="category" class="w-full px-4 py-2 border-none rounded-xl">
                <option value="All Categories">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="w-full px-4 md:px-0 md:w-1/3">
            <select wire:model="filter" id="other_filters" name="other_filters" class="w-full px-4 py-2 border-none rounded-xl">
                <option value="No Filter">No Filter</option>
                <option value="Top Voted">Top Voted</option>
                <option value="My Ideas">My Ideas</option>
                @admin
                <option value="Spam Ideas">Spam Ideas</option>
                @endadmin
            </select>
        </div>

        <div class="relative w-full px-4 md:px-0 md:w-2/3">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg class="w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
            <input wire:model="search" type="search" placeholder="Find an idea"
                class="w-full px-4 py-2 pl-8 bg-white border-none rounded-xl placeholder:text-gray-700">
        </div>
    </div> <!-- end filters -->

    <div class="mx-4 my-6 space-y-6 ideas-container md:mx-0">
        @forelse ($ideas as $idea)
            <livewire:idea-index :key="$idea->id" :idea="$idea" :votesCount="$idea->votes_count" />
        @empty
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('storage/img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto" style="mix-blend-mode: luminosity">
            <div class="text-gray-400 text-center font-bold mt-6">No Ideas were found...</div>
        </div>
        @endforelse

        <div class="my-8">
            {{ $ideas->links() }}
        </div>
    </div> <!-- end ideas-container -->
</div>

