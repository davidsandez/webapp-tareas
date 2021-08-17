<x-jet-dialog-modal wire:model="open">
    
    <x-slot name="title">
        @if(isset($task) && $task !== "")
            Editar tarea
        @else
            Crear tarea nueva 
        @endif
    </x-slot>

    <x-slot name="content">
        <?php 
            if(!isset($task) || "" === $task):
        ?> 
        
            <div class="flex">
                <div class="flex flex-col items-start mr-2">
                    <x-jet-label> 
                        <span class="text-gray-700 block">
                            Título
                        </span>
                        <x-jet-input type="text" wire:model="title">
                        </x-jet-input>
                    </x-jet-label>

                    <x-jet-label> 
                        <span class="text-gray-700">Descripción</span>
                        <textarea wire:model="description" class="form-textarea mt-1 block w-full" rows="10" cols="30">
                            
                        </textarea>
                    </x-jet-label>
                </div>
                <div class="flex flex-col items-start ml-2">
                    <div>
                        <span class="text-gray-700">
                            Agregar integrantes
                        </span>
                        <select wire:model="new_member" wire:change="addMember" class="form-select block w-full mt-1" name="" id="">
                            <option value="">---</option>
                            <?php if(isset($users) && "" != $users): ?>
                                <?php foreach($users as $user):?>
                                    <option value="<?php echo $user->id; ?>"> <?php echo $user->name; ?>  </option>
                                <?php endforeach;?>
                            <?php endif; ?>
                        </select>
                        <div>
                        </div>
                    </div>
                    
                    <x-jet-label> 
                        <span class="text-gray-700">
                            Fecha de entrega: 
                        </span>
                        <x-jet-input type="date">
                        </x-jet-input>
                    </x-jet-label>

                    <div class="mt-4">
                        <label for="" class="text-gray-700">
                            Cambie el status de la tarea:
                            <select wire:model="status" class="form-select block w-full mt-1" name="" id="">
                                <option value="todo" <?php if("todo" === $status):?> selected <?php endif;?> > todo </option>
                                <option value="in_process" <?php if("in_process" === $status):?> selected <?php endif;?> > in process </option>
                                <option value="completed" <?php if("completed" === $status):?> selected<?php endif;?> > completed </option>
                            </select>    
                        </label>
                        <div class="mt-2">
                            <?php if($status):?>
                                <span>
                                    Status actual:
                                </span>
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?php echo $status; ?>
                                </span>
                            <?php endif; ?>    
                        </div>
                    </div>
                </div>
            </div>        
        <?php endif;?>
        
        <?php 
            if(isset($task) && "" != $task):
        ?> 
        
            <div class="flex">
                <div class="flex flex-col items-start mr-2">
                    <x-jet-label> 
                        <span class="text-gray-700 block">
                            Título
                        </span>
                        <x-jet-input type="text" wire:model="title">
                        </x-jet-input>
                    </x-jet-label>

                    <x-jet-label> 
                        <span class="text-gray-700">Descripción</span>
                        <textarea class="form-textarea mt-1 block w-full" rows="10" cols="30" wire:model="description">
                        </textarea>
                    </x-jet-label>
                </div>
                <div class="flex flex-col items-start mt-4 ml-2">
                    <div>
                        <span class="text-gray-700">
                            Agregar integrantes
                        </span>
                        <select wire:change="addMember" wire:model="new_member" class="form-select block w-full mt-1" name="" id="">
                            <option value=""> --- </option>
                            <?php if(isset($users) && "" != $users): ?>
                                <?php foreach($users as $user):?>
                                    <option value="<?php echo $user->id; ?>"> <?php echo $user->name; ?>  </option>
                                <?php endforeach;?>
                            <?php endif; ?>
                        </select>
                        <div>
                            <?php if(isset($team)):?>
                                <?php foreach($team as $user):?>
                                    <span class="m-6 px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        <?php echo $user['name'];?> 
                                        <span wire:click="deleteUserTeam('<?php echo $user['id']; ?>')" class="p-1 font-semibold leading-tight text-white rounded-full bg-red-700 hover:bg-red- cursor-pointer">x</span>
                                    </span>
                                <?php endforeach;?>
                            <?php endif;?>
                        </div>
                    </div>
                    
                    <x-jet-label class="mt-4"> 
                        <span class="text-gray-700">
                            Fecha de entrega: 
                        </span>
                        <x-jet-input type="date" value="{{$task->delivery_date}}">
                        </x-jet-input>
                    </x-jet-label>

                    <div class="mt-4">
                        <label for="" class="text-gray-700">
                            Cambie el status de la tarea:
                            <select wire:model="status" class="form-select block w-full mt-1" name="" id="">    
                                <option value="">---</option>
                                <option value="todo" <?php if("todo" == $status):?> selected="true" <?php endif;?> > todo </option>
                                <option value="in_process" <?php if("in_process" == $status):?> selected="true" <?php endif;?> > in process </option>
                                <option value="completed" <?php if("completed" == $status):?> selected="true" <?php endif;?> > completed </option>
                            </select>    
                        </label>
                        <div class="mt-2">
                            <?php if($status):?>
                                <span>
                                    Status actual:
                                </span>
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <?php echo $status; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>        
        <?php endif;?>
            
        
    </x-slot>

    <x-slot name="footer">
        <?php if(isset($task) && "" != $task): ?>
            <x-jet-danger-button class="mr-8" wire:click="delete('<?php echo $task->id; ?>')">
                ELIMINAR TAREA
            </x-jet-danger-button>
        <?php endif;?>
        <x-jet-secondary-button wire:click="close">
            Cancelar
        </x-jet-secondary-button>
        <?php if(isset($task) && "" != $task): ?>
            <x-jet-button wire:click="saveChanges('<?php echo $task->id; ?>')">
                Guardar cambios
            </x-jet-button>
        <?php endif;?>
    </x-slot>

</x-jet-dialog-modal>
