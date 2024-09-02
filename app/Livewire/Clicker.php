<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Clicker extends Component
{

    use WithPagination, WithFileUploads;
    #[Rule('required|min:2|string')]
    public $name;
    #[Rule('email|unique:users|required|min:2')]
    public $email;
    #[Rule('required|min:2')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;
    public function createNewUser(){
       $validated = $this->validate();

        if($this->image){
            $validated['image'] = $this->image->store('images','public');
        }
        $user = User::create($validated);
        $this->reset(['name','email','password']);

        request()->session()->flash('message', 'User Created Successfully.');

        $this->dispatch('user-created', $user);

    }

    public function reloadList(){
        $this->dispatch('user-created');
    }
}
