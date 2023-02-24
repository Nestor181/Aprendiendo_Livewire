<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Mail\Mailables\Content;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditPost extends Component
{
    USE WithFileUploads;

    public $open;

    public $post,$image, $identificador;

    //Se hace esta regla de validacion para poder acceder al contenido de ese objeto en el blade mediante wire:model (VLW. 13)
    protected $rules =[
        'post.title' => 'required',
        'post.content' => 'required'
    ];
    public function mount( Post $post){
        $this->post = $post;
        $this->identificador = rand();

    }

    public function cancelar(){
        $this->open = false;

    }

    public function guardar(){
        $this->validate();

        if($this->image){
            Storage::delete( [$this->post->image] );
            // $this->post->image = Storage::url( $this->image );
            $this->post->image = $this->image->store( 'public/storage/posts' );
        }

        $this->post->save();

        $this->reset( ['open', 'image'] );
        $this->identificador = rand();
        $this->emitTo('show-posts', 'render'); //Es para que se actualice la tabla que muestra los datos
        $this->emit( 'alert', 'El post se actualizo satisfactoriamente' );
    }

    public function render()
    {
        return view('livewire.edit-post');
    }
}
