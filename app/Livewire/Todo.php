<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Todo extends Component
{
    public $title = 'To Do List';

    #[Rule('required|min:5|max:50')]
    public $name, $search = '';

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
        ]);
    }

    public function resetBtn()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function createTodo()
    {
        $validated = $this->validate();

        // request()->session('success');
        $this->reset(['name']);
    }

    public function render()
    {
        return view('livewire.todo', [
            'todos' => ModelsTodo::get()
        ]);
    }
}
