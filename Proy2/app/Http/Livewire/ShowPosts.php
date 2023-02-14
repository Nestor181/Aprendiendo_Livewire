<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class ShowPosts extends Component
{

   /* public function mount($title){
        $this -> titulo = $title; //Se recibe el titulo que se le manda desde dashboard y 
                                  //se asigna a la variable titulo (VLW. 2)

    }*/

    public $titulo;
    public $search = "Aqui ";

    public function render()
    {
        $post = Post::where('title', 'like', '%'.  $this->search . '%')->get();    
        //$post = Post::all();
        return view('livewire.show-posts', compact('post'));
    }
}
