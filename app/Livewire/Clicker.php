<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{
    public function createNewUser(){
        User::create([
            'name' => 'User '.rand(1,100),
            'email' => 'user'.rand(1,100).'@gmail.com',
            'password' => bcrypt('password')
        ]);

    }
    public function render()
    {
        $title = 'Clicker';
        $users = User::all();
        return view('livewire.clicker',[
            'title' => $title,
            'users' => $users
            ]
        );
    }
}
