<?php

namespace Wireable\Todo;

use Livewire\Wireable;


class Todo implements Wireable
{
    public $id;
    public $name;
    public $completed;

    public function __construct($id, $name, $completed) {
        $this->id = $id;
        $this->name = $name;
        $this->completed = $completed;
    }

    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'completed' => $this->completed,
        ];
    }
 
    public static function fromLivewire($value)
    {
        $id = $value['id'];
        $name = $value['name'];
        $completed = $value['completed'];
 
        return new static($id, $name, $completed);
    }
}

?>