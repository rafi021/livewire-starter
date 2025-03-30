<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{


    public function delete(int $id): void
    {
        Task::find($id)->delete();
        session()->flash('success', 'Task deleted successfully');
    }

    public function render()
    {
        return view('livewire.tasks.index', [
            'tasks' => Task::latest()->get(),
        ]);
    }
}
