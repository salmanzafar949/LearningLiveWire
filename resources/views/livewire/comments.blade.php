<div>
    <form wire:submit.prevent="addComment">
        <input type="text" name="comment" wire:model.lazy="comment" placeholder="add comment">
        <button type="submit">Add Comment</button>
    </form>

    @forelse($comments as $comment)
    <div>
        {{ $comment->user->name }}
        {{ $comment->comment }}
        {{ $comment->created_at->diffForHumans() }}
    </div>
    @empty
    @endforelse
</div>
