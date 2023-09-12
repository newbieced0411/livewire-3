<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

class Counter extends Component
{
    use WithPagination;

    public $title = 'Count Users';

    #[Rule('required|min:2')]
    public $name = '';

    #[Rule('required|email|unique:users')]
    public $email = '';

    #[Rule('required|min:8')]
    public $password = '';

    public function createNewUser()
    {
        $validated = $this->validate();

        try {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['name'],
                'password' => Hash::make($validated['password']),
            ]);
    
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        $this->reset(['name', 'email', 'password']);
    }

    public function render()
    {
        return view('livewire.counter',[
            'users' => User::paginate(5),
        ]);
    }
}
