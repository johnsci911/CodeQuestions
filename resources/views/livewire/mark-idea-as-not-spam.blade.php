<x-modal-confirm
    event-to-open-modal="custom-show-mark-idea-as-not-spam-modal"
    event-to-close-modal="ideaWasMarkedAsNotSpam"
    modal-title="Reset Spam Counter"
    modal-description="Are you sure you want to mark this idea as not spam?"
    modal-confirm-button-text="Reset Spam counter"
    wire-click="markAsNotSpam"
/>
