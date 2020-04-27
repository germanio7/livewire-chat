<?php

namespace App\Http\Livewire;

use App\Chat;
use Livewire\Component;

class ChatList extends Component
{
    public $usuario;
    public $mensajes;
    protected $ultimoId;

    protected $listeners = ['mensajeRecibido'];

    public function mount()
    {
        $this->mensajes = Chat::orderBy("created_at", "desc")->take(5)->get();
    }

    public function mensajeRecibido()
    {
        $this->mensajes = Chat::orderBy("created_at", "desc")->take(5)->get();
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
