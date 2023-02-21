<div>
    <x-jet-danger-button wire:click="$set('open', true)">Crear nuevo post</x-jet-danger-button>

    <x-jet-dialog-modal wire:model='open'>

        <x-slot name='title'>
            Crear nuevo post
        </x-slot>

        <x-slot name='content'>

            <div class="mb-4">
                <x-jet-label value="Título del post"/>
                <x-jet-input type="text" class="w-full" wire:model="title"/> {{--El wire:model.defer es para que no se tenga que acutalizar la var title cada vez que se ponga una letra (VLW. 5)--}}

               <x-jet-input-error for='title'/>  {{--Con este componente hacemos que se muestre un mensaje de error al no ser llenado el campo (VLW. 9)--}}

            </div>

            <div class="mb-4">
                <x-jet-label value="Contenido del post"/>
                <textarea rows="6" class="form-control w-full" wire:model="content"></textarea>

                <x-jet-input-error for='content'/>  {{--Con este componente hacemos que se muestre un mensaje de error al no ser llenado el campo (VLW. 9)--}}

            </div>

        </x-slot>
        <x-slot name='footer'>

            <x-jet-secondary-button wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="crear">
                Crear post
            </x-jet-danger-button>
        </x-slot>


    </x-jet-dialog-modal>
</div>
