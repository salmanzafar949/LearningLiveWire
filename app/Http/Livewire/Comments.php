<?php

namespace App\Http\Livewire;

use Illuminate\Support\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'name' => 'Salman',
            'comment' => 'abcdeff',
            'createdAt' => '2020-06-12'
        ]
    ];
    public $comment = "";

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
