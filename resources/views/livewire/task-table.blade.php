<div class="w-full overflow-hidden rounded-lg shadow-xs mb-8 mt-8">
          
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
          <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3"> Id </th>
                <th class="px-4 py-3">Título</th>
                <th class="px-4 py-3">Equipo a cargo</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Fecha de entrega</th>
                <th class="px-4 py-3">Acciones</th>
              </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($tasks as $task)
                <tr class="text-gray-700 dark:text-gray-400">

                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            {{ $task->id }}
                        </div>
                    </td>

                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <div>
                                <p class="font-semibold">{{ $task->title }}</p>
                            </div>
                        </div>
                    </td>

                    <td class="px-4 py-3 text-sm">
                        @foreach ($task->users as $user)
                            <small>{{ $user->name }}</small>
                            <br>
                        @endforeach
                    </td>
                    
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{ $task->status }}
                        </span>
                    </td>
                    
                    <td class="px-4 py-3 text-sm">
                       {{ $task->delivery_date }}
                    </td>

                    <td>
                        @livewire('update-task', [ 'task' => $task->id ])
                    </td>
                </tr>                
            @endforeach
          </tbody>
      </table>
    </div>
            <div class="flex ">{{$tasks->links()}}</div>
            


</div>
