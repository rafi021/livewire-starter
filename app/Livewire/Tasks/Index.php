<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.tasks.index', [
            'tasks' => Task::all(),
        ]);
    }
}
