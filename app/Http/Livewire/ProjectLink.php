<?php

namespace App\Http\Livewire;

use App\Models\Data;
use Livewire\Component;

class ProjectLink extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.project-link', [
            'data' => Data::where('name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}