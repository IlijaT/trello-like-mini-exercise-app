<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FooBar extends Component
{

    public $tasks;


    public function mount()
    {
        $this->tasks = session()->remember('tasks', function() {
            return [
                ['id' => 1, 'title' => 'Do a homework'],
                ['id' => 2, 'title' => 'Workout'],
                ['id' => 3, 'title' => 'Give food to the baby'],
            ];
        });
    }

    public function addCard($column)
    {
        $this->columns[$column] = ['id' => rand(200, 3000), 'title' => $this->newCardFields[$column]];
        $this->newCardFields[$column] = '';

        session()->put('columns', $this->columns);
    }

    public function updateTaskOrder($task)
    {
        logger('working....');

        $this->tasks = [];
        // session()->put('tasks', $this->tasks = $task);
    }

    public function removeTask()
    {
        logger('removed....');
    }


    public function render()
    {
        return view('livewire.foo-bar');
    }
}
