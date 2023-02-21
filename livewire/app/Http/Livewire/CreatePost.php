<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open;

    public $title, $content;

    public function crear(){
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->emit( 'render' ); //Este es un evento para mandarlo a showpost y renderize la lista de showpost.(VLW. 8)

        $this->reset( ['open', 'title', 'content' ] ); //Este metodo sirve para resetear todas esas variables. (VLW. 8)
        $this->emit( 'alert', 'El post se creo satisfactoriamente' );
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
