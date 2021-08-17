<div class="w-full overflow-hidden rounded-lg shadow-xs">
          
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Usuarios</th>
                    <th class="px-4 py-3">Email</th>
                </tr>    
            </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($users as $user)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                        
                            <div>
                                <p class="font-semibold">{{ $user->name }}</p>
                            </div>

                        </div>
                    </td>
                    
                    <td class="px-4 py-3 text-xs">
                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                            {{ $user->email }}
                        </span>
                    </td>
                </tr>                
            @endforeach
          </tbody>
      </table>
    </div>

  {{--   {{$users->links()}} --}}


</div>
