<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Todos extends Component
{
    public $todo = "";

    public $state = "";

    public $todos = array(
        array("id" => 1, "name" => "One", "completed" => true),
        array("id" => 2, "name" => "Two", "completed" => false)
    );

    public $selectedTodos = [];

    #[Computed]
    public function getTodos()
    {
        if ($this->state == "") {
            return $this->todos;
        } else {
            return array_filter($this->todos, function($todo) {
                return $todo['completed'] == $this->state;
            });
        }
    }
    
    public function addTodo() {
        $this->todos[] = array("id" => count($this->todos), "name" => $this->todo, "completed" => false);
        $this->reset('todo');
    }

    public function deleteTodo($id) {
        foreach ($this->todos as $key => $todo) {
            if ($todo['id'] == $id) {
                unset($this->todos[$key]);
                break;
            }
        }
        $this->todos = array_values($this->todos);
    }

    public function changeState($state) 
    {
        $this->state = $state;
    }

    public function selectTodo($selected)
    {
        $isSelected = false;
        $key = 0;

        // dd($selected);

        foreach ($this->todos as $key => $value) {
            if($value["id"]==$selected) {
                $value["completed"] = !$value["completed"];
                $this->todos[$key] = $value;
                break;
            }
        }
        $this->todos = array_values($this->todos);

        foreach ($this->selectedTodos as $todo) {
            if ($todo == $selected) {
                $isSelected = true;
                unset($this->selectedTodos[$key]);
                break;
            }
            $key++;
        }
        if ($isSelected) {
            $this->todos = array_values($this->todos);
        } else {
            $this->selectedTodos[] = $selected;
        }

    }

    public function render()
    {
        return view('livewire.todos');
    }
}


