<div class="container">
    @error('comment')
     <div class="alert-danger">
         {{ $message }}
     </div>
    @enderror
    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    @endif
    <form wire:submit.prevent="addComment">
        <input type="text" name="comment" wire:model="comment" placeholder="add comment">
{{--        <input type="text" name="comment" wire:model.lazy="comment" placeholder="add comment">--}}
{{--        <input type="text" name="comment" wire:model.debounce.500ms="comment" placeholder="add comment">--}}
        <button type="submit">Add Comment</button>
    </form>

    @forelse($comments as $comment)
    <div>
        {{ $comment->user->name }}
        {{ $comment->comment }}
        {{ $comment->created_at->diffForHumans() }}
        <button wire:click="delComment({{$comment->id}})">
            Delete
        </button>
    </div>
    @empty
    @endforelse
    {{ $comments->links() }}
</div>
