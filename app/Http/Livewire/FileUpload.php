<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

/**
 * Class FileUpload
 * @package App\Http\Livewire
 */
class FileUpload extends Component
{
    use WithFileUploads;

    public $file = null;

    public $files = [];

    public function updatedFile()
    {
        $this->file->store('', ['disk' => 'public']);

        $this->reset([
            'file',
        ]);
    }

    public function updatedFiles()
    {
        collect($this->files)
            ->each(function ($file) {
                $file->store('', ['disk' => 'public']);
            });

        $this->reset([
            'files',
        ]);
    }

    public function render()
    {
        $savedFiles = collect(Storage::disk('public')->allFiles());

        return view('livewire.file-upload')
            ->with('savedFiles', $savedFiles);
    }
}
