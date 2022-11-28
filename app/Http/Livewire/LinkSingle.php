<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LinkSingle extends Component
{

    public $value;

    public function mount($value)
    {
        $this->value = $value;
    }

    public function render()
    {
        return view('livewire.link-single');
    }
}
