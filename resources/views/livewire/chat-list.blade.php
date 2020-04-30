<div class="mt-3">

    <div class="flex">
        <h3><strong>Últimos 5 mensajes</strong></h3>
        <div wire:poll.5s="prueba">
            <small class="text-muted">Ultima conexion: {{$conexion}}</small>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @foreach($mensajes as $mensaje)
            <div>
                @if($mensaje["usuario"] != auth()->user()->name)
                <div class="alert alert-warning" style="margin-right: 50px;">
                    <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                    <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                </div>
                @else
                <div class="alert alert-success" style="margin-left: 50px;">
                    <strong>{{$mensaje["usuario"]}}</strong><small class="float-right">{{$mensaje["fecha"]}}</small>
                    <br><span class="text-muted">{{$mensaje["mensaje"]}}</span>
                </div>
                @endif
            </div>
            @endforeach
        </div>

    </div>

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('86cd8c29e417d5da7ac8', {
            cluster: 'us2',
            forceTLS: true
        });

        var channel = pusher.subscribe('chat-channel');

        channel.bind('chat-event', function(data) {
            window.livewire.emit('mensajeRecibido', data);
        });
    </script>
</div>