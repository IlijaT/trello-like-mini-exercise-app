<div class="bg-gray-400">
    <ul class="bg-indigo-500 p-6 m-6" wire:sortable="updateTaskOrder" >
        @foreach ($tasks as $task)
            <li class="bg-gray-300 text-orange-400 p-4" wire:sortable.item="{{ $task['id'] }}" wire:key="task-{{ $task['id'] }}">
                <h4 class="text-gray-800 cursor-pointer"  wire:sortable.handle>{{ $task['title'] }}</h4>
                <button class="rounded bg-indigo-900 text-white" wire:click="removeTask({{ $task['id'] }})">Remove</button>
            </li>
        @endforeach
    </ul>

    <div wire:sortable.handle>
        here goes item
    </div>
</div>
