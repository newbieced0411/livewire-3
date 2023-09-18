<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class View extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('livewire.skeleton.user-list');
    }

    public function render()
    {
        sleep(2);
        return view('livewire.user.view', [
            'users' => User::latest()->paginate(5),
            'userCount' => User::all()->count(),
        ]);
    }
}
