
<div class="bg-pink-200 w-full h-full font-sans">
    @include('navbar')

    <div class="flex">
        <div class="bg-purple-300 px-2 pt-4 pb-8 h-screen border-r border-pink-700">
            <form wire:submit.prevent="addGroup">
                <div>
                    <input class="appearance-none border-2 border-gray-200 rounded py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"   placeholder="Group name..." type="text" wire:model.lazy="newGroupLabel">
                </div>
    
                <button class="w-full mt-2 shadow bg-purple-800 hover:bg-purple-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Add Group
                  </button>
            </form>
        </div>

        <div class="flex px-4 pt-2 pb-8 items-start h-screen overflow-y-auto" wire:sortable="updateGroupOrder" wire:sortable-group="updateTaskOrder()">
            @foreach ($this->groups as $group)
                <div class="rounded flex-shrink-0 bg-gray-200 w-64 p-2 mr-4 shadow-xl" wire:key="group-{{ $group->id }}" wire:sortable.item="{{ $group->id }}">
                    <div class="flex justify-between py-1">
                        <h4 class="cursor-move  text-purple-800 rounded text-sm font-bold w-full text-center" wire:sortable.handle>{{ $group->name }}</h4>
    
                        <button class="px-2 text-gray-900 cursor-pointer" wire:click="removeGroup({{ $group->id }})">x</button>
                    </div>
    
                    <ul  class="text-sm mt-2" wire:sortable-group.item-group="{{ $group->id }}">
                        @foreach ($group->tasks()->ordered()->get() as $task)
                            <div class="text-sm flex justify-between my-2" wire:key="{{ $task['id'] }}" wire:sortable-group.item="{{ $task['id'] }}">
                                
                                <h4 class="py-1 px-3 cursor-move text-sm bg-green-200 text-green-800 rounded-lg mr-1 shadow-lg" wire:sortable-group.item-group="{{ $group->id }}">{{ $task['name'] }}</h4>

    
                                {{-- <button class="bg-transparent text-red-500 text-sm hover:text-red-400 py-1 px-2 rounded-full" wire:click.self="removeTask({{ $task['id'] }})">
                                    <svg class="fill-current w- 2 h-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
                                    <g id="Page-1" stroke="none" stroke-width="1"  fill-rule="evenodd">
                                        <g id="icon-shape">
                                            <polygon id="Combined-Shape" points="10 8.58578644 2.92893219 1.51471863 1.51471863 2.92893219 8.58578644 10 1.51471863 17.0710678 2.92893219 18.4852814 10 11.4142136 17.0710678 18.4852814 18.4852814 17.0710678 11.4142136 10 18.4852814 2.92893219 17.0710678 1.51471863 10 8.58578644"></polygon>
                                        </g>
                                    </g>
                                    </svg>
                                </button> --}}
                                
                                </div>
                        @endforeach
                        </ul>
    
                    <form class="mt-2" wire:submit.prevent="addTask({{ $group->id }}, $event.target.title.value)">
                        <input class="appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"   placeholder="New task name..." type="text" wire:model.lazy="newGroupTasks.{{ $group->id}}" wire:key="{{ $group->id}}">
    
                        <button class="mt-2 w-full  shadow bg-yellow-200 hover:bg-yellow-100 focus:shadow-outline focus:outline-none text-blue-800 font-extrabold py-2 px-4 rounded" type="submit">Add Task</button>
                    </form>
                </div>
            @endforeach
        </div>

    </div>

</div>
    