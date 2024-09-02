<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{

    use WithPagination;

    public $search;

    #[On('user-created')]
    public function updateList($user=null){
    }

    public function placeholder(){
        return view('placeholder');
    }

    public function mount($search){
        $this->search = $search;
    }

    // Computed Property
    #[Computed()]
    public function users(){
        return User::where('name', 'like', "%{$this->search}%")->paginate(5);
    }

    public function render()
    {

        return view('livewire.users-list', [
            'count' => User::count(),
        ]);
    }
}
