<div>
    @if ($comments->isNotEmpty())
        <div class="comments-container relative pt-4 mx-4 my-8 mt-1 space-y-6 md:mr-0 md:ml-22">
            @foreach ($comments as $comment)
                <livewire:idea-comment
                    :key="$comment->id"
                    :comment="$comment"
                    :ideaUserId="$idea->user->id"
                />
            @endforeach

        </div> <!-- comments-container -->

        <div class="my-8 md:ml-22">
            {{ $comments->onEachSide(1)->links() }}
        </div>
    @else
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('storage/img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto" style="mix-blend-mode: luminosity">
            <div class="text-gray-400 text-center font-bold mt-6">No comments yet.</div>
        </div>
    @endif
</div>
