<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|image|max:1024',
        ]);
    }

    public function save()
    {
        $this->file->store('files', 'public');

        $this->file = "";
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
