<div class="container">
    Tickets Section
    @forelse($tickets as $ticket)
        <div class="{{$active === $ticket->id ? "btn btn-danger" : ""}}" wire:click="$emit('ticketSelected', {{ $ticket->id }})">
            {{ $ticket->question }}
            {{ $ticket->created_at->diffForHumans() }}
        </div> <br/>
    @empty
    @endforelse
{{--    {{ $tickets->links() }}--}}
</div>
