<?php

namespace App\Http\Livewire;

use App\Group;
use App\Task;
use Livewire\Component;

class Board extends Component
{

    public $newGroupTasks = [];
    public $newGroupLabel;
    public $groups;

    public function mount()
    {
        $this->groups = Group::ordered()->get();
    }

    public function addTask($groupId)
    {
        Task::create([
            'name' => $this->newGroupTasks[$groupId], 
            'group_id' => $groupId
            ]);

        $this->groups = Group::ordered()->get();

        $this->newGroupTasks[$groupId] = '';
    }

    public function addGroup()
    {
        Group::create([
            'name' => $this->newGroupLabel, 
            ]);

        $this->groups = Group::ordered()->get();

        $this->newGroupLabel = '';
    }
    
    public function removeTask()
    {
        dd('removing////');
        $task = Task::findOrFail($taskId);
        Task::destroy($taskId);
        $this->groups = Group::ordered()->get();
    }

    public function updateTaskOrder($tasks)
    {
        $groups = collect($tasks)->groupBy('value')->map(function($collection){ return $collection[0]; });

        $taskOrder = 1;
        foreach ($groups as $group) {
            foreach ($group['items'] as $task) {
                $task = Task::findOrFail($task['value']);
                $task->update([
                    'group_id' => $group['value'],
                    'order_column' => $taskOrder
                    ]);
                    $taskOrder++;
            }
        }
       
        $this->groups = Group::ordered()->get();
    }

    public function updateGroupOrder($items)
    {
        Group::setNewOrder(collect($items)->pluck('value')->toArray());
        $this->groups = Group::ordered()->get();
    }

    public function removeGroup($groupId)
    {
        $group = Group::findOrFail($groupId);
        $group->tasks()->delete();
        $group->delete();
        $this->groups = Group::ordered()->get();
    }

    public function render()
    {
        return view('livewire.board');
    }
}
