<?php

namespace App\Http\Livewire;

use App\Chat;
use App\Events\EnviarMensaje;
use Livewire\Component;

class ChatForm extends Component
{
    public $usuario;
    public $mensaje;
    protected $updatesQueryString = ['usuario'];

    public function mount()
    {
        $this->usuario = request()->query('usuario', auth()->user()->name);
        $this->mensaje = $this->faker->realtext(20);
    }

    public function updated($field)
    {
        $validatedData = $this->validateOnly($field, [
            'usuario' => 'required',
            'mensaje' => 'required',
        ]);
    }

    public function enviarMensaje()
    {
        $validatedData = $this->validate([
            'usuario' => 'required',
            'mensaje' => 'required',
        ]);

        Chat::create([
            "usuario" => $this->usuario,
            "mensaje" => $this->mensaje
        ]);

        event(new EnviarMensaje());

        $this->emit('mensajeEnviado');
        $this->emit('mensajeRecibido');

        $this->mensaje = '';
    }

    public function render()
    {
        return view('livewire.chat-form');
    }
}
