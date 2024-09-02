<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class UsersPage extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.users-page')->title($this->user->name);
    }
}
