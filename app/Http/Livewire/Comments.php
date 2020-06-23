<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [];
    public $comment = "";

    public function mount($comments)
    {
        $this->comments = $comments;
    }
    public function addComment()
    {
        array_unshift($this->comments, [
            'name' => 'Salman Zafar',
            'comment' => $this->comment,
            'createdAt' => Carbon::now()->diffForHumans()
        ]);

        $this->comment = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
