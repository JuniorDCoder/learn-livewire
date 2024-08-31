<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Clicker extends Component
{

    use WithPagination;
    #[Rule('required|min:2|string')]
    public $name;
    #[Rule('email|unique:users|required|min:2')]
    public $email;
    #[Rule('required|min:2')]
    public $password;
    public function createNewUser(){
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
        $this->reset(['name','email','password']);

        request()->session()->flash('message', 'User Created Successfully.');

    }
    public function render()
    {
        $users = User::paginate(5);
        return view('livewire.clicker',[
            'users' => $users
            ]
        );
    }
}
