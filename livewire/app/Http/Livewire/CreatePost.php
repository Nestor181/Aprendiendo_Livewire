<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{

    USE WithFileUploads;
    public $open;

    public $title, $content, $image, $identificador;

    public function mount(){
        $this->identificador = rand();
    }

    //Creamos reglas de validacion para crear un nuevo post y que los datos de titulo y contenido sean requeridos(VLW. 9)
    protected $rules = [
        'title'   => 'required',
        'content' => 'required',
        'image' => 'required|image|max:2048'
    ];

    //Cada vez que se actualice el contenido de la propiedad, verifica si se cumple con las reglas impuestas (VLW. 9)
    // public function updated( $nombrePropiedad ){
    //     $this->validateOnly( $nombrePropiedad );
    // }

    public function crear(){

        $this->validate();

        $image = $this->image->store('public/storage/posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->emit( 'render' ); //Este es un evento para mandarlo a showpost y renderize la lista de showpost.(VLW. 8)

        $this->reset( ['open', 'title', 'content', 'image' ] ); //Este metodo sirve para resetear todas esas variables. (VLW. 8)

        $this->identificador = rand(); //Este es para que guarde un nuevo identificador en el id del input file y así no muestra el mismo (VLW. 12)

        $this->emit( 'alert', 'El post se creo satisfactoriamente' );
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
