<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class CardPublicacionOferta extends Component
{
    public $publicacion;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $publicacion)
    {
        $this->publicacion = $publicacion;   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card-publicacion-oferta');
    }
}
