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

</div>