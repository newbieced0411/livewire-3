<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

// File Upload
class Register extends Component 
{
    use WithFileUploads;

    public $title = 'Register';

    #[Rule('required|min:3|max:50')]
    public $name;

    #[Rule('required|min:3|email|unique:users')]
    public $email;

    #[Rule('required|min:3')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create()
    {
        sleep(1);

        $validated = $this->validate();

        if($this->image){
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        try {
            User::create($validated);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        
        $this->reset('name', 'email', 'password', 'image');
        $this->dispatch('user-created', message: 'User created successfully!');

    }

    public function render()
    {
        return view('livewire.register');
    }
}
