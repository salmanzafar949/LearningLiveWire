<?php

namespace App\Http\Livewire;

use App\SupportTicket;
use Livewire\Component;

class Tickets extends Component
{
    public $active;

    protected $listeners = [
        'ticketSelected'
    ];

    public function ticketSelected($id)
    {
        $this->active = $id;
    }

    public function render()
    {
        return view('livewire.tickets',[
            'tickets' => SupportTicket::latest()->get()
        ]);
    }
}
