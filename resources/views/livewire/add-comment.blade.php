<div
    x-data="{ isOpen: false }"
    x-init="Livewire.on('commentWasAdded', () => {
        isOpen = false
        Livewire.hook('message.processed', (message, component) => {
            if (['gotoPage', 'previousPage', 'nextPage'].includes(message.updateQueue[0].method)) {
                const firstComment = document.querySelector('.comment-container:first-child')
                firstComment.scrollIntoView({ behavior: 'smooth'})
            }

            if (message.updateQueue[0].payload.event === 'commentWasAdded'
                && message.component.fingerprint.name === 'idea-comments') {
                const lastComment = document.querySelector('.comment-container:last-child')
                lastComment.scrollIntoView({ behavior: 'smooth' })
                lastComment.classList.add('bg-green-50')
                setTimeout(() => {
                    lastComment.classList.remove('bg-green-50')
                }, 5000)
            }
        })
    })"
    class="relative"
>
    <button
        @click="
            isOpen = !isOpen
            if (isOpen) {
                $nextTick(() => $refs.comment.focus())
            }
        "
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
        @auth
            <form wire:submit.prevent="addComment" action="#" class="px-4 py-6 space-y-4">
                <textarea x-ref="comment" wire:model="comment" id="post_comment" name="post_comment" class="w-full px-4 py-2 text-sm placeholder-gray-900 bg-gray-100 border-none rounded-xl" placeholder="Go ahead, don't be shy. Share your thoughts..." cols="30" rows="4" required></textarea>
                @error('comment')
                    <div class="text-red text-xs">{{ $message }}</div>
                @enderror
                <div class="flex flex-col items-center space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                    <button
                        type="submit"
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
        @else
            <div class="px-4 py-6">
                <p class="font-normal">Please login or create an account to post a comment.</p>
                <div class="flex items-center space-x-3 mt-8">
                    <a href="{{ route('login') }}" class="w-1/2 text-sm text-center bg-blue text-white font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">Login</a>
                    <a href="{{ route('register') }}" class="w-1/2 text-sm text-center bg-gray-200 font-semibold border border-gray-200 rounded-xl hover:border-gray-400 transition duration-150 ease-in px-6 py-3">Register</a>
                </div>
            </div>
        @endauth
    </div>
</div>

