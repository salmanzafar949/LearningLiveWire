@extends('layouts.app')
@section('content')
<div class="flex-center position-ref full-height">
                @livewire('counter')
                @livewire('comments')
                @livewire('tickets')
                {{--                //<livewire:comments :comments="$comments"/>--}}

</div>
@endsection
