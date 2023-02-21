<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class ShowPosts extends Component
{

    public $sort = 'id';

    public $direction = 'asc';
    public $search;

    protected $listeners = ['render' => 'render' ];  //Aqui estamos escuchando el evento que se 
                                                    //manda desde createpost, parad despues inicializarlo. (VLW. 8)

   /* public function mount($title){
        $this -> titulo = $title; //Se recibe el titulo que se le manda desde dashboard y 
                                  //se asigna a la variable titulo (VLW. 2)

    }*/
    public function render()
    {
        $post = Post::where('title', 'like', '%'. $this->search . '%')->orWhere('content', 'like', '%'. $this->search. '%')->orderBy( $this->sort, $this->direction) ->get();    
        return view('livewire.show-posts', compact('post'));
    }

    public function ordenar( $sort ){
        if ( $this->sort == $sort ) {
            if ( $this->direction == 'asc' ){ $this->direction = 'desc'; }
            else{ $this->direction = 'asc'; }

        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
        

        $this->sort = $sort;
    }
}
