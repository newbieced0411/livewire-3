<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Todo extends Component
{
    use WithPagination;

    public $title = 'To Do List';

    #[Rule('required|min:5|max:50')]
    public $name, $search = '';

    public $editToDoId;

    #[Rule('required|min:5|max:50')]
    public $editName;

    public function updated($field)
    {
        $this->validateOnly($field, [
            'name' => 'required',
        ]);
    }

    public function createTodo()
    {
        $validated = $this->validateOnly('name');
        ModelsTodo::create($validated);
        session()->flash('success', 'Saved');
        $this->reset(['name']);
        $this->resetPage();
        $this->resetBtn();
        $this->reset('editToDoId', 'editName');
    }

    public function updateTodo()
    {
        $this->validateOnly('editName');

        try {

            ModelsTodo::findOrFail($this->editToDoId)->update([
                'name' => $this->editName
            ]);
    
            $this->cancelEdit();
        } catch (\Exception $e) {
            session()->flash('error', 'Data has been deleted.');
            return;
        }
    }

    public function delete($id)
    {
        try {
            ModelsTodo::findOrFail($id)->delete();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete');
            return;
        }
    }

    // UX snippets
    public function edit($id)
    {
        try {
            $this->editToDoId = $id;
            $this->editName = ModelsTodo::findOrFail($id)->name;
        } catch (\Exception $e) {
            session()->flash('error', 'Data has been deleted.');
            return;
        }
    }

    public function toggle($id)
    {
        $todo = ModelsTodo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function cancelEdit()
    {   
        $this->resetBtn();
        $this->reset('editToDoId', 'editName');
    }

    public function resetBtn()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.todo', [
            'todos' => ModelsTodo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
