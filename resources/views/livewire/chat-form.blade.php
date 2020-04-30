<div class="">
    <!-- Mensaje de Chat a Enviar -->
    <div class="form-group">
        <label for="mensaje"><strong>Mensaje</strong></label>
        <input type="text" wire:model="mensaje" wire:keydown.enter="enviarMensaje" class="form-control" id="mensaje">

        <!-- Validación -->
        @error("mensaje")
        <small class="text-danger">{{ $message }}</small>
        @else
        <small class="text-muted">Escribe tu mensaje y teclea <code>ENTER</code> para enviarlo</small>
        @enderror
    </div>

    <div class="row">

        <div class="col-6 pt-2 text-right">
            <button class="btn btn-primary" wire:click="enviarMensaje" wire:loading.attr="disabled" wire:offline.attr="disabled">Enviar Mensaje</button>
        </div>
    </div>

    <div>
        <video id="video" width="360" height="360" autoplay></video>
        <button class="btn btn-success" onclick="activar()">Activar Camara</button>
        <button class="btn btn-danger" onclick="desactivar()">Desactivar</button>
    </div>

    <script>
        function desactivar() {
            video.srcObject.getTracks()[0].stop();
            video.stream = ""
        }

        function activar() {
            const video = document.getElementById('video');
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({
                    video: true,
                }).then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                });
            }
        }
    </script>

</div>