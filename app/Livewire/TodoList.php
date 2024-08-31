<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|string|min:3')]
    public $name;

    public $search;

    public $editingTodoId;

    #[Rule('required|string|min:3')]
    public $editingTodoName;

    public function create(){
        $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name', 'search');


        session()->flash('message', 'Todo created successfully.');
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name','Like', "%{$this->search}%")->paginate(5)
        ]);
    }
    public function delete($id){
        try {
            Todo::findOrFail($id)->delete();
        } catch (\Exception $e) {
            session()->flash('error', 'Cannot delete todo that is not found.');
            return;
        }

    }

    public function toggle($id){
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit($id){
        $todo = Todo::find($id);
        $this->editingTodoId = $todo->id;
        $this->editingTodoName = $todo->name;
    }

    public function cancel(){
        $this->reset('editingTodoId', 'editingTodoName');
    }

    public function update(){
        $this->validateOnly('editingTodoName');
        Todo::find($this->editingTodoId)->update([
            'name' => $this->editingTodoName
        ]);

        $this->cancel();
    }
}
