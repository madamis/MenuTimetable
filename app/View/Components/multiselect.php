<?php

namespace App\View\Components;

use Illuminate\View\Component;


class multiselect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $items;

    public function __construct($items)
    {
        //
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multiselect');
    }
}
