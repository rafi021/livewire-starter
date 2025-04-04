<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('nullable|boolean')]
    public bool $is_completed;

    #[Validate('nullable|date')]
    public string $due_date;

    #[Validate('nullable|file|max:10240')]
     public $media;

    public Task $task;

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->task->load('media');
        $this->name = $task->name;
        $this->due_date = $task->due_date? $task->due_date->format('Y-m-d') : null;
        $this->is_completed = $task->is_completed;
    }

    public function save(){
        $this->validate();

        $this->task->update([
            'name' => $this->name,
            'due_date' => $this->due_date,  // Convert string date to MySQL date format before saving
            'is_completed' => $this->is_completed,
        ]);


        if ($this->media) {
            $this->task->getFirstMedia()?->delete();
            $this->task->addMedia($this->media)->toMediaCollection();
        }

        session()->flash('message', 'Task updated successfully');

        $this->redirectRoute('tasks.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.tasks.edit');
    }
}
