<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required|string|max:255')]
    public string $name;


    public function save(): void
    {
        $this->validate();
        Task::create([
            'name' => $this->name,
        ]);
        session()->flash('success', 'Task created successfully');
        $this->reset('name');
        $this->redirectRoute('tasks.index', navigate:true);
    }


    public function render()
    {
        return view('livewire.tasks.create');
    }
}
