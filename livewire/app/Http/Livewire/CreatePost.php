<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{

    public $open;

    public $title, $content;

    //Creamos reglas de validacion para crear un nuevo post y que los datos de titulo y contenido sean requeridos(VLW. 9)
    protected $rules = [
        'title'   => 'required|max:10',
        'content' => 'required|min:100'
    ];

    //Cada vez que se actualice el contenido de la propiedad, verifica si se cumple con las reglas impuestas (VLW. 9)
    public function updated( $nombrePropiedad ){
        $this->validateOnly( $nombrePropiedad );
    }

    public function crear(){

        $this->validate();

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
