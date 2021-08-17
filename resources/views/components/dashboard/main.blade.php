<div class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid pb-8 mb-8">
        
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
          Tareas
        </h2>

        @livewire('create-task')

        <!-- Task Editor (modal) -->
        @livewire('task-editor')
        <!-- Task Table -->
        <div class="my-5">
          @livewire('task-table')
        </div>  
    </div>    
</div>