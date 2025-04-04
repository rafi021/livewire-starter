<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name='';

    #[Validate('nullable|date')]
    public string $due_date='';

    #[Validate('nullable|file')]
    public $media;


    public function save(): void
    {
        $this->validate();
        $task = Task::create([
            'name' => $this->name,
            'due_date' => $this->due_date,
        ]);

        if($this->media) {
            $task->addMedia($this->media)->toMediaCollection();
        }

        session()->flash('success', 'Task created successfully');
        $this->reset('name');
        $this->redirectRoute('tasks.index', navigate:true);
    }


    public function render()
    {
        return view('livewire.tasks.create');
    }
}
