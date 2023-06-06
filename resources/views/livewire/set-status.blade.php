<div
    x-data="{ isOpen: false }"
    class="relative"
    x-init="
        window.livewire.on('statusWasUpdated', () => {
            isOpen = false
        })
    "
>
    <button
        @click="isOpen = !isOpen"
        type="button"
        class="flex items-center justify-center px-6 py-3 mt-3 text-sm font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 w-36 h-11 rounded-xl hover:border-gray-400 md:mt-0"
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
        class="absolute z-20 w-64 mt-2 text-sm font-semibold text-left bg-white md:w-76 shadow-dialog rounded-xl"
    >
        <form wire:submit.prevent="setStatus" action="#" class="px-4 py-6 space-y-4">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" checked class="text-gray-900 bg-gray-200 border-none" name="radio-direct" value="1">
                        <span class="ml-2">Open</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 border-none text-purple" name="radio-direct" value="2">
                        <span class="ml-2">Considering</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 border-none text-yellow" name="radio-direct" value="3">
                        <span class="ml-2">In Progress</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 border-none text-green" name="radio-direct" value="4">
                        <span class="ml-2">Implemented</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 border-none text-red" name="radio-direct" value="5">
                        <span class="ml-2">Closed</span>
                    </label>
                </div>
            </div>

            <div>
                <textarea id="update_comment" name="update_comment" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" cols="30" rows="3" placeholder="Add or update comment (Optional)"></textarea>
            </div>

            <div class="flex flex-col items-center justify-between space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                <button
                    type="button"
                    class="flex items-center justify-center w-full px-6 py-3 text-xs font-semibold transition duration-150 ease-in bg-gray-200 border border-gray-200 md:w-1/2 h-11 rounded-xl hover:border-gray-400"
                >
                    <svg class="w-4 text-gray-600 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                    </svg>

                    <span class="ml-1">Attach</span>
                </button>
                <button
                    type="submit"
                    class="flex items-center justify-center w-full px-6 py-3 text-xs font-semibold text-white transition duration-150 ease-in border md:w-1/2 h-11 bg-blue rounded-xl border-blue hover:bg-blue-hover"
                >Update</button>
            </div>

            <div>
                <label class="inline-flex items-center font-normal">
                    <input type="checkbox" name="notify_voters" class="bg-gray-200 border-none rounded">
                    <span class="ml-2">Notify all voters</span>
                </label>
            </div>
        </form>
    </div>
</div>

