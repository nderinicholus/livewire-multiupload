<?php

namespace App\Livewire;

use App\Models\Multiupload;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Imageupload extends Component
{
    use WithFileUploads;
    
    #[Rule(['required'])]
    #[Rule(['images.*' => 'image|max:2048'])]
    public $images;

    public function uploadImages() {
        $validated = $this->validate();

        if(is_array($this->images)) {
            foreach($this->images as $image) {
                $validated['images'] = $image->store('images', 'public');

                Multiupload::create($validated);
            }
        }
        
        session()->flash('session', 'Upload successful');
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.imageupload');
    }
}