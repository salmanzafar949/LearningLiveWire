<div>
    {{ $comment }}
        <input type="text" name="comment" wire:model="comment" placeholder="add comment">
        <button wire:click="addComment">Add Comment</button>
    @forelse($comments as $comment)
    <div>
        {{ $comment['name'] }}
        {{ $comment['comment'] }}
        {{ $comment['createdAt'] }}
    </div>
    @empty
    @endforelse
</div>
