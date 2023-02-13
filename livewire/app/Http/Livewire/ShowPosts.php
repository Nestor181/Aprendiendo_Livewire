<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class ShowPosts extends Component
{

    public $titulo;
    public $search = "Aqui se buscará";

   /* public function mount($title){
        $this -> titulo = $title; //Se recibe el titulo que se le manda desde dashboard y 
                                  //se asigna a la variable titulo (VLW. 2)

    }*/
    public function render()
    {
        $post = Post::where('title', 'like', '%'. $this->search . '%')->get();    
        return view('livewire.show-posts', compact('post'));
    }
}
