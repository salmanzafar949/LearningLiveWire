<?php

namespace App\Http\Livewire;

use App\Comment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [];
    public $comment = "";

    public function mount()
    {
        $this->comments = Comment::latest()->get();
    }

    public function updated($field)
    {
        $this->validateOnly($field,[
            'comment' => ['required','min:5']
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'comment' => ['required','min:5']
        ]);

      $newComment = Auth::user()
          ->comments()
          ->create([
                'comment' => $this->comment
          ]);

        //$this->comments->push($newComment);
        $this->comments->prepend($newComment);
        $this->comment = "";

        session()->flash('success','Comment Added.');
    }

    public function delComment($comment)
    {
        //$this->comments = $this->comments->where('id','!=', $comment->id);
        $this->comments = $this->comments->except($comment);

        Comment::find($comment)->delete();
//        $comment->delete();

        session()->flash('success','Comment deleted ☺ ');


    }

    public function render()
    {
        return view('livewire.comments');
    }
}
