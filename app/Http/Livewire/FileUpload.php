<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
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
        $url = $this->file->store('files', 'public');

        $this->file = null;
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
