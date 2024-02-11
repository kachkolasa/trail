<?php

namespace App\Livewire;

use Livewire\Component;

class DropdownSelect extends Component
{
    public $selected = null;
    public $options = [];
    public $name = null;
    public $id = null;
    public $placeholder = null;
    public $class = null;
    public $width = null;
    public $dropdown_shown = false;
    public $type = 'text';
    public $min = null;
    public $max = null;

    public function render()
    {
        return view('livewire.components.dropdown-select');
    }

    public function select()
    {
        $this->dispatch("dropdown-select-value-changed", [
            'name' => $this->name,
            'value' => $this->selected
        ]);
    }
}
