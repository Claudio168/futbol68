<div>
    <nav class="dark:bg-green-900">
        <div class="max-w-screen-xl flex flex-wrap mx-auto p-4">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('premier-league') }}">
                    <img src="{{ asset('logo.png') }}" class="logo">
                </a>
            </div>


            <div class="flex items-center lg:order-2 space-x-1 lg:space-x-0 rtl:space-x-reverse ml-auto">
                @guest
                <a href="{{ route('login') }}" class="text-gray-900 dark:text-white">Login</a>
                @else
                @php
                $fullName = Auth::user()->name;
                $nameParts = explode(' ', $fullName);
                $firstName = $nameParts[0];
            
                $initial = strtoupper(substr($nameParts[0], 0, 1));
                $initial2 = strtoupper(substr($nameParts[1], 0, 1));
                $name = isset($nameParts[0]) ? ucfirst(strtolower(substr($nameParts[0], 0, 12))) : '';
                $lastName = isset($nameParts[1]) ? ucfirst(strtolower(substr($nameParts[1], 0, 12))) : '';

                $nameLength = strlen($firstName);
                @endphp

                <button type="button" data-dropdown-toggle="language-dropdown-menu" class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">


                    <div class="hidden md:block font-medium text-base">
                      {{$fullName}} 
                    </div>
                    <div class="block md:hidden">
                        {{  $fullName}}
                    </div>
                   
        
                    <span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 12.293l-5.293-5.293a1 1 0 00-1.414 1.414l6 6a1 1 0 001.414 0l6-6a1 1 0 00-1.414-1.414L10 12.293z" clip-rule="evenodd" />
                        </svg>
                    </span>


                </button>
                @endguest
                <!-- Dropdown -->

                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-400 rounded-lg shadow dark:bg-gray-700" id="language-dropdown-menu">
                    <ul class="py-2 font-medium" role="none">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-100">
                            {{ __('Manage Account') }}
                        </div>
                        <li>
                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </li>

                    </ul>
                </div>
                <button data-collapse-toggle="navbar-language" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-200 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-300 dark:focus:ring-gray-300" aria-controls="navbar-language" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>

            </div>


            <div class="items-center  justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-language" x-data="{ open: false }">
                <ul class="flex flex-col font-medium p-4 lg:p-0 mt-4 border lg:space-x-9 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0  dark:bg-green-900">
                    <x-nav-link href="{{ route('premier-league') }}" :active="request()->is('premier-league', 'premier-league-corners','dashboard', 'premier-league-ambos-marcan', 'premier-league-resultado','premier-league-ht-ft','premier-league-tarjetas','premier-league-disparo-arco','premier-league-fouls')">
                        <img src="{{ asset('banderas/inglaterra.jpg') }}" class="w-5 h-4 rounded-full mr-1">{{ __('Premier League') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('la-liga') }}" :active="request()->is('la-liga', 'la-liga-corners', 'la-liga-ambos-marcan', 'la-liga-resultado','la-liga-ht-ft','la-liga-tarjetas','la-liga-disparo-arco','la-liga-fouls')">
                        <img src="{{ asset('banderas/espania.jpg') }}" class="w-5 h-4 rounded-full mr-1">{{ __('La Liga') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('el-calcio') }}" :active="request()->routeIs('el-calcio', 'el-calcio-corners','el-calcio-ambos-marcan', 'el-calcio-resultado','el-calcio-ht-ft','el-calcio-tarjetas','el-calcio-disparo-arco','el-calcio-fouls')">
                        <img src="{{ asset('banderas/italia.jpg') }}" class="w-5 h-4 rounded-full mr-1">{{ __('El Calcio') }}
                    </x-nav-link>
                    <x-nav-link href="bundesliga" :active="request()->routeIs('bundesliga','bundesliga-corners','bundesliga-ambos-marcan', 'bundesliga-resultado','bundesliga-ht-ft','bundesliga-tarjetas','bundesliga-disparo-arco','bundesliga-fouls')">
                        <img src="{{ asset('banderas/alemania.jpg') }}" class="w-5 h-4 rounded-full mr-1">{{ __('La Bundesliga') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('ligue1') }}" :active="request()->routeIs('ligue1','ligue1-corners','ligue1-ambos-marcan', 'ligue1-resultado','ligue1-ht-ft','ligue1-tarjetas','ligue1-disparo-arco','ligue1-fouls')">
                        <img src="{{ asset('banderas/francia.jpg') }}" class="w-5 h-4 rounded-full mr-1"> {{ __('Ligue 1') }}
                    </x-nav-link>
                    <li class="relative" @click.away="open = false" x-data="{ open: false }">
                        <x-nav-link class="relative" @click="open = !open">
                            <span>{{ __('Más') }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 12.293l-5.293-5.293a1 1 0 00-1.414 1.414l6 6a1 1 0 001.414 0l6-6a1 1 0 00-1.414-1.414L10 12.293z" clip-rule="evenodd" />
                            </svg>
                        </x-nav-link>
                        <!--Agregar para que en el scroll desaparesca @scroll.window="open = false" -->
                        <ul x-show="open" @click.away="open = false" class="lg:fixed z-50 mt-2 p-2 w-100 bg-white rounded-lg shadow-lg" x-cloak>
                            <!-- Contenido del super menú aquí -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/world.jpg') }}" class="w-5 h-5 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Mundo</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 300px; z-index: 10;">
                                    <li class="py-2 flex items-center"><a href="{{ route('champion-league') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/2.png" class="w-5 h-5 mr-1 rounded-full"> Champion League</a></li>
                                    <li class="py-2 flex items-center"><a href="{{ route('europa-league') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/3.png" class="w-5 h-5 mr-1 rounded-full"> Europa League</a></li>
                                    <li class="py-2 flex items-center"><a href="{{ route('europa-conference-league') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/848.png" class="w-5 h-5 mr-1 rounded-full"> Europa Conference League</a></li>

                                </ul>
                               
                            </li>
                            <!-- Contenido del super menú aquí -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/portugal.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Portugal</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">
                                    <li class="py-2 flex items-center"><a href="{{ route('primeiraliga') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/94.png" class="w-6 h-5 mr-1 rounded-full"> Primeira liga</a></li>

                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/paisesbajos.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Paises Bajos</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">
                                    <li class="py-2 flex items-center"><a href="{{ route('eredivisie') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/88.png" class="w-6 h-5 mr-1 rounded-full"> Eredivisie</a></li>
                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/chile.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Chile</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">

                                    <li class="py-2 flex items-center"><a href="{{ route('chile-primera-division') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/265.png" class="w-6 h-5 mr-1 rounded-full"> Chile Primera División </a></li>
                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/argentina.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Argentina</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">

                                    <li class="py-2 flex items-center"><a href="{{ route('copa-de-la-liga-argentina') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/1032.png" class="w-6 h-5 mr-1 rounded-full"> Copa de la liga </a></li>
                                    <li class="py-2 flex items-center"><a href="{{ route('super-liga-argentina') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/1032.png" class="w-6 h-5 mr-1 rounded-full"> Superliga Argentina  </a></li>
                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/brasil.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Brasil</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">

                                    <li class="py-2 flex items-center"><a href="{{ route('brasileirao') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/71.png" class="w-6 h-5 mr-1 rounded-full"> Brasileirao</a></li>
                                    <li class="py-2"><a href="#"></a></li>
                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/francia.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Francia</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">

                                    <li class="py-2 flex items-center"><a href="{{ route('ligue1') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/61.png" class="w-6 h-5 mr-1 rounded-full"> ligue 1</a></li>
                                    <li class="py-2"><a href="#"></a></li>
                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/colombia.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Colombia</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">
                                    <li class="py-2 flex items-center"><a href="{{ route('colombia-primera-a') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/239.png" class="w-6 h-5 mr-1 rounded-full"> Primera A</a></li>

                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/mexico.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Mexico</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">

                                    <li class="py-2 flex items-center"><a href="{{ route('liga-mx') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/262.png" class="w-6 h-5 mr-1 rounded-full"> Liga MX</a></li>

                                </ul>
                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                            <li class="flex items-center relative" @click.away="subMenuOpen = false" x-data="{ subMenuOpen: false }">
                                <img src="{{ asset('banderas/inglaterra.jpg') }}" class="w-5 h-4 rounded-full">
                                <a class="px-2 py-2 hover:text-gray-400 text-gray-800" @click.prevent="subMenuOpen = !subMenuOpen">Inglaterra</a>
                                <!-- Submenú -->
                                <ul x-show="subMenuOpen" class="absolute left-0 top-full mt-2 p-2 bg-white rounded-lg shadow-lg" x-cloak style="min-width: 200px; z-index: 10;">
                                    <li class="py-2 flex items-center"><a href="{{ route('premier-league') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/39.png" class="w-6 h-5 mr-1 rounded-full">Premier League</a></li>
                                    <li class="py-2 flex items-center"><a href="{{ route('fa-cup') }}" class="flex items-center space-x-2" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><img src="https://media.api-sports.io/football/leagues/45.png" class="w-6 h-5 mr-1 rounded-full">FA Cup</a></li>
                                </ul>

                            </li>
                            <!-- Repite el mismo patrón para los demás elementos <li> -->
                        </ul>
                    </li>


                </ul>
            </div>

        </div>
    </nav>


</div>