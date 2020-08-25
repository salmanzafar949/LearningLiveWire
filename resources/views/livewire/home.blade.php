<div>
     {{ Auth::user()->name }}

    @livewire('counter')
    @livewire('comments')
    @livewire('tickets')
    {{--                //<livewire:comments :comments="$comments"/>--}}
</div>
