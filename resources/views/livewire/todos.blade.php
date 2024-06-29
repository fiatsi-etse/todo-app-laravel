<div>
    <h1 class="title">todos</h1> 
    <div class="todoapp">
        
        <header class="header">
            
            <form wire:submit="addTodo" id="todo-form">
                <input id="todo-input" wire:model="todo" class="new-todo" placeholder="What needs to be done?" autofocus>
            </form>
        </header>
        @if(count($this->getTodos)>0)
            <section class="main">
                <input id="toggle-all" class="toggle-all" type="checkbox">
                <ul class="todo-list">
                    @foreach ($this->getTodos as $todo)
                        <li class="todo-item">
                            <input wire:click="selectTodo({{$todo["id"]}})" type="checkbox" class="toggle" >
                            @if($todo["completed"]) 
                                <span class="todo-text completed">{{$todo['name']}}</span>
                            @else
                                <span class="todo-text">{{$todo['name']}}</span>
                            @endif
                            <button wire:click="deleteTodo({{$todo["id"]}})" class="delete-btn">x</button>
                        </li>
                    @endforeach
                </ul>
            </section>
            <footer class="footer">
                <span class="todo-count"><strong x-text="{{count($this->getTodos())}}"></strong> items left</span>
                @if(count($this->selectedTodos)>0)
                    <button x-on:click="$wire.set('selectedTodos', [])" class="delete-all">Clear completed</button>
                @endif
                <ul class="filters">
                    <li><a wire:click="changeState('')" href="#/" class="selected">All</a></li>
                    <li><a wire:click="changeState({{true}})" href="#/active">Active</a></li>
                    <li><a wire:click="changeState(0)" href="#/active">Completed</a></li>
                </ul>
            </footer>
        @endif
    </div>
    {{-- <footer class="info">
        <p>Double-click to edit a todo</p>
        <p>Created by the TodoMVC Team</p>
        <p>Part of TodoMVC</p>
    </footer> --}}

</div>