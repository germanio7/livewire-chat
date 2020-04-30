<?php

namespace App\Http\Livewire;

use App\Chat;
use Livewire\Component;

class ChatList extends Component
{
    public $mensajes;
    public $conexion;

    protected $listeners = ['mensajeRecibido'];

    public function mount()
    {
        $this->mensajes = Chat::orderBy("created_at", "desc")->take(5)->get();
    }

    public function mensajeRecibido()
    {
        $this->mensajes = Chat::orderBy("created_at", "desc")->take(5)->get();
    }

    public function prueba()
    {
        $ultimo = Chat::all()->last();
        $this->conexion = $ultimo['created_at']->diffForHumans();
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
