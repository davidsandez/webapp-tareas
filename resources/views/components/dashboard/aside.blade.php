<div> 
  <!-- Desktop sidebar -->
  <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0" style="height:100%;">
      <div class="py-4 text-gray-500 dark:text-gray-400">
          
          <a class="ml-6 mb-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{route('dashboard')}}">
            Dashboard
          </a>
          
          <!-- lista de ítems de menu -->
          <ul class="mt-6">
              
              @foreach ($menu as $item)
                  <x-dashboard.aside.menu :link="$item['link']" :name="$item['name']">
                  </x-dashboard.aside.menu>
              @endforeach

          </ul>

          <form class="px-6 my-6" method="POST" action="{{ route('logout') }}">
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                            this.closest('form').submit();">
                Cerrar sesión
            </x-jet-dropdown-link>
          </form>
          
          <div class="px-6 my-6">
              <button
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Generar api token
                  <span class="ml-2" aria-hidden="true">+</span>
              </button>
          </div>
      
      </div>
  </aside>


  <!-- Mobile sidebar -->
  <!-- Backdrop -->
  <div
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
  </div>


  <aside
    class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
    x-show="isSideMenuOpen"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20"
    @click.away="closeSideMenu"
    @keydown.escape="closeSideMenu">
      <div class="py-4 text-gray-500 dark:text-gray-400">
    
          <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="{{route('dashboard')}}">
            Dashboard
          </a>
          
          <ul class="mt-6">
              
              <li class="relative px-6 py-3">
                  <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"> 
                  </span>
                  <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100" href="{{'dashboard'}}">
                      <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        ></path>
                      </svg>
                      <span class="ml-4">Dashboard</span>
                  </a>
              </li>
            
          </ul>
          
          <ul>

              {{--@foreach ($menu as $item)
                    <x-dashboard.aside.menu-mobile>
                    </x-dashboard.aside.menu-mobile>
                  @endforeach --}}

          </ul>
      
          <div class="px-6 my-6">
              <button
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  Generar api token
                  <span class="ml-2" aria-hidden="true">+</span>
              </button>
          </div>
    
      </div>
  </aside>
</div>