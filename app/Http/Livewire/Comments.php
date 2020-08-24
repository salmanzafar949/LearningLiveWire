<?php

namespace App\Http\Livewire;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    //public $comments = [];
    public $comment = "";

    public $tickedId;

    // if we have listener name as function name then we don't have to define key value pair
    protected $listeners = [
        'ticketSelected' => 'ticketSelected'
    ];

    public function ticketSelected($ticketId)
    {
        $this->tickedId = $ticketId;
    }

    public function mount()
    {
        //$this->comments = Comment::latest()->paginate(2);
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
                'comment' => $this->comment,
                'support_ticket_id' => $this->tickedId,
          ]);

        //$this->comments->push($newComment);
       // $this->comments->prepend($newComment);
        $this->comment = "";

        session()->flash('success','Comment Added.');
    }

    public function delComment($comment)
    {
        //$this->comments = $this->comments->where('id','!=', $comment->id);
       // $this->comments = $this->comments->except($comment);

        Comment::find($comment)->delete();

        session()->flash('success','Comment deleted ☺ ');


    }

    public function render()
    {
        $comments = Comment::where('support_ticket_id', $this->tickedId)
            ->latest()
            ->paginate(2);

        return view('livewire.comments', compact('comments'));
    }
}
