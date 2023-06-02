<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ URL::asset('favicon.png') }}" type="image/png"/>
    <title>{{ config('app.name', 'ZStudio') }} Admin Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('custom/backend')}}/assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('custom/backend')}}/assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="{{asset('custom/backend')}}/assets/js/charts-lines.js" defer></script>
    <script src="{{asset('custom/backend')}}/assets/js/charts-pie.js" defer></script>
    <link rel="stylesheet" href="{{asset('custom')}}/styles.css" />
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6"
            href="{{route('admin.dashboard')}}"
          >
            <img class="flex justify-center mx-auto" style="width: 50%;" src="{{asset('logo.png')}}" alt="Logo">
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{route('admin.dashboard')}}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
          <ul>
          <li class="relative px-6 py-3">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu"
                aria-haspopup="true"
              >
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor">
                    <g>
                      <g>
                        <path d="M337.118,269.871c25.13,19.968,45.376,48.935,57.969,83.351c66.033-3.371,112.442-19.337,112.442-19.337    c0-61.853-25.654-116.077-64.162-146.426c-16.932,20.482-42.531,33.537-71.18,33.537c-8.823,0-17.355-1.242-25.436-3.554    c0.387,3.415,0.593,6.884,0.593,10.402C347.345,242.999,343.651,257.29,337.118,269.871z"/>
                        <path d="M174.883,269.871c-6.532-12.581-10.227-26.872-10.227-42.027c0-3.51,0.205-6.971,0.59-10.378    c-7.717,2.093-15.833,3.218-24.213,3.218c-28.649,0-54.25-13.055-71.181-33.537C31.344,217.495,5.69,271.719,5.69,333.572    c0,0,44.998,16.175,111.316,19.4C129.605,318.666,149.814,289.791,174.883,269.871z"/>
                      </g>
                      <path d="M391.343,433.041c0-61.853-25.654-116.077-64.162-146.426c-16.932,20.482-42.531,33.537-71.18,33.537   c-28.649,0-54.25-13.055-71.181-33.537c-38.508,30.349-64.163,84.573-64.163,146.426c0,0,55.51,19.959,134.096,19.959   S391.343,433.041,391.343,433.041z"/>
                      <circle cx="256.001" cy="227.844" r="74.844"/>
                      <path d="M372.188,53.844c-41.336,0-74.845,33.508-74.845,74.844c0,6.554,0.849,12.909,2.431,18.967   c19.537,10.687,34.737,28.307,42.3,49.551c9.217,4.057,19.397,6.325,30.114,6.325c41.334,0,74.844-33.508,74.844-74.844   S413.522,53.844,372.188,53.844z"/>
                      <path d="M213.452,147.323c1.579-6.053,2.425-12.401,2.425-18.948c0-41.336-33.51-74.844-74.844-74.844   c-41.336,0-74.845,33.508-74.845,74.844s33.509,74.844,74.845,74.844c10.484,0,20.461-2.164,29.52-6.057   C178.2,175.716,193.632,157.968,213.452,147.323z"/>
                    </g>
                    </svg>
                  <span class="ml-4">Users</span>
                </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{route('all.users')}}">All Users</a>
                  </li>
                  @if((Auth::user()->role == '1'))
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a class="w-full" href="#">Create User</a>
                    </li>
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a class="w-full" href="{{route('all.roles')}}">User Role</a>
                    </li>
                  @endif
                </ul>
              </template>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('all.clients')}}"
              >
              <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                  <path d="M168,288c61.938,0,112-50.141,112-112S229.938,64,168,64c-61.875,0-112,50.141-112,112S106.125,288,168,288z M140,120   c16.125,16.156,28,56,112,56c0,46.328-37.688,84-84,84s-84-37.672-84-84C84,176,116.594,156.281,140,120z"/>
                  <polygon points="168,316 140,344 168,456 196,344  "/>
                  <path d="M280,316h-72.438L227,335.406L182.875,512H280h28c15.469,0,28-12.531,28-28V372C336,341.063,310.969,316,280,316z"/>
                  <path d="M128.406,316H56c-30.875,0-56,25.063-56,56v112c0,15.469,12.5,28,28,28h28h97.156L109,335.406L128.406,316z"/>
                  <path d="M292.875,105.688C316.438,97.063,344,76.641,344,28c0,0,0,84.875,84,84c0,46.391-37.625,84-84,84   c-11.625,0-22.688-2.359-32.75-6.641c-1.156,12.063-3.781,23.672-7.75,34.641H428c15.469,0,28-12.531,28-28v-84   C456,50.156,405.844,0,344,0c-41.375,0-77.125,22.719-96.5,56.094C266.375,68.672,281.688,85.859,292.875,105.688z"/>
                  <path d="M456,252h-70l28,28l-51.625,61.938C365.813,351.375,368,361.406,368,372v76h88h28c15.469,0,28-12.531,28-28V308   C512,277.063,486.938,252,456,252z"/>
                </g>
                </svg>
                <span class="ml-4">Clients</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('all.orders')}}"
              >
              <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                  <g>
                    <polygon points="447.992,336 181.555,336 69.539,80 0.008,80 0.008,48 90.477,48 202.492,304 447.992,304   "/>
                  </g>
                  <path d="M287.992,416c0,26.5-21.5,48-48,48s-48-21.5-48-48s21.5-48,48-48S287.992,389.5,287.992,416z"/>
                  <path d="M447.992,416c0,26.5-21.5,48-48,48s-48-21.5-48-48s21.5-48,48-48S447.992,389.5,447.992,416z"/>
                  <g>
                    <polygon points="499.18,144 511.992,112 160.008,112 172.805,144   "/>
                    <polygon points="211.195,240 223.992,272 447.992,272 460.805,240   "/>
                    <polygon points="486.398,176 185.602,176 198.398,208 473.586,208   "/>
                  </g>
                </g>
                </svg>
                <span class="ml-4">Orders</span>
              </a>
            </li>
          </ul>
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
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
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
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="{{route('admin.dashboard')}}"
          >
          <img class="flex justify-center mx-auto" style="width: 25%;" src="{{asset('logo.png')}}" alt="Logo">
          </a>
          <ul class="mt-6">
            <li class="relative px-6 py-3">
              <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                aria-hidden="true"
              ></span>
              <a
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="{{route('admin.dashboard')}}"
              >
                <svg
                  class="w-5 h-5"
                  aria-hidden="true"
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                  ></path>
                </svg>
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>
          <ul>
          <li class="relative px-6 py-3">
              <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                @click="togglePagesMenu"
                aria-haspopup="true"
              >
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve" stroke="currentColor">
                    <g>
                      <g>
                        <path d="M337.118,269.871c25.13,19.968,45.376,48.935,57.969,83.351c66.033-3.371,112.442-19.337,112.442-19.337    c0-61.853-25.654-116.077-64.162-146.426c-16.932,20.482-42.531,33.537-71.18,33.537c-8.823,0-17.355-1.242-25.436-3.554    c0.387,3.415,0.593,6.884,0.593,10.402C347.345,242.999,343.651,257.29,337.118,269.871z"/>
                        <path d="M174.883,269.871c-6.532-12.581-10.227-26.872-10.227-42.027c0-3.51,0.205-6.971,0.59-10.378    c-7.717,2.093-15.833,3.218-24.213,3.218c-28.649,0-54.25-13.055-71.181-33.537C31.344,217.495,5.69,271.719,5.69,333.572    c0,0,44.998,16.175,111.316,19.4C129.605,318.666,149.814,289.791,174.883,269.871z"/>
                      </g>
                      <path d="M391.343,433.041c0-61.853-25.654-116.077-64.162-146.426c-16.932,20.482-42.531,33.537-71.18,33.537   c-28.649,0-54.25-13.055-71.181-33.537c-38.508,30.349-64.163,84.573-64.163,146.426c0,0,55.51,19.959,134.096,19.959   S391.343,433.041,391.343,433.041z"/>
                      <circle cx="256.001" cy="227.844" r="74.844"/>
                      <path d="M372.188,53.844c-41.336,0-74.845,33.508-74.845,74.844c0,6.554,0.849,12.909,2.431,18.967   c19.537,10.687,34.737,28.307,42.3,49.551c9.217,4.057,19.397,6.325,30.114,6.325c41.334,0,74.844-33.508,74.844-74.844   S413.522,53.844,372.188,53.844z"/>
                      <path d="M213.452,147.323c1.579-6.053,2.425-12.401,2.425-18.948c0-41.336-33.51-74.844-74.844-74.844   c-41.336,0-74.845,33.508-74.845,74.844s33.509,74.844,74.845,74.844c10.484,0,20.461-2.164,29.52-6.057   C178.2,175.716,193.632,157.968,213.452,147.323z"/>
                    </g>
                    </svg>
                  <span class="ml-4">Users</span>
                </span>
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>
              <template x-if="isPagesMenuOpen">
                <ul
                  x-transition:enter="transition-all ease-in-out duration-300"
                  x-transition:enter-start="opacity-25 max-h-0"
                  x-transition:enter-end="opacity-100 max-h-xl"
                  x-transition:leave="transition-all ease-in-out duration-300"
                  x-transition:leave-start="opacity-100 max-h-xl"
                  x-transition:leave-end="opacity-0 max-h-0"
                  class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                  aria-label="submenu"
                >
                  <li
                    class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  >
                    <a class="w-full" href="{{route('all.users')}}">All Users</a>
                  </li>
                  @if((Auth::user()->role == '1'))
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a class="w-full" href="#">Create User</a>
                    </li>
                    <li
                      class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    >
                      <a class="w-full" href="{{route('all.roles')}}">User Role</a>
                    </li>
                    @endif
                </ul>
              </template>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('all.clients')}}"
              >
              <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                  <path d="M168,288c61.938,0,112-50.141,112-112S229.938,64,168,64c-61.875,0-112,50.141-112,112S106.125,288,168,288z M140,120   c16.125,16.156,28,56,112,56c0,46.328-37.688,84-84,84s-84-37.672-84-84C84,176,116.594,156.281,140,120z"/>
                  <polygon points="168,316 140,344 168,456 196,344  "/>
                  <path d="M280,316h-72.438L227,335.406L182.875,512H280h28c15.469,0,28-12.531,28-28V372C336,341.063,310.969,316,280,316z"/>
                  <path d="M128.406,316H56c-30.875,0-56,25.063-56,56v112c0,15.469,12.5,28,28,28h28h97.156L109,335.406L128.406,316z"/>
                  <path d="M292.875,105.688C316.438,97.063,344,76.641,344,28c0,0,0,84.875,84,84c0,46.391-37.625,84-84,84   c-11.625,0-22.688-2.359-32.75-6.641c-1.156,12.063-3.781,23.672-7.75,34.641H428c15.469,0,28-12.531,28-28v-84   C456,50.156,405.844,0,344,0c-41.375,0-77.125,22.719-96.5,56.094C266.375,68.672,281.688,85.859,292.875,105.688z"/>
                  <path d="M456,252h-70l28,28l-51.625,61.938C365.813,351.375,368,361.406,368,372v76h88h28c15.469,0,28-12.531,28-28V308   C512,277.063,486.938,252,456,252z"/>
                </g>
                </svg>
                <span class="ml-4">Clients</span>
              </a>
            </li>
            <li class="relative px-6 py-3">
              <a
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="{{route('all.orders')}}"
              >
              <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                  <g>
                    <polygon points="447.992,336 181.555,336 69.539,80 0.008,80 0.008,48 90.477,48 202.492,304 447.992,304   "/>
                  </g>
                  <path d="M287.992,416c0,26.5-21.5,48-48,48s-48-21.5-48-48s21.5-48,48-48S287.992,389.5,287.992,416z"/>
                  <path d="M447.992,416c0,26.5-21.5,48-48,48s-48-21.5-48-48s21.5-48,48-48S447.992,389.5,447.992,416z"/>
                  <g>
                    <polygon points="499.18,144 511.992,112 160.008,112 172.805,144   "/>
                    <polygon points="211.195,240 223.992,272 447.992,272 460.805,240   "/>
                    <polygon points="486.398,176 185.602,176 198.398,208 473.586,208   "/>
                  </g>
                </g>
                </svg>
                <span class="ml-4">Orders</span>
              </a>
            </li>
        </div>
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  placeholder="Search"
                  aria-label="Search"
                />
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              <li class="flex">
                <button
                  class="rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>
              <!-- Notifications menu -->
              <!-- <li class="relative">
                <button
                  class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleNotificationsMenu"
                  @keydown.escape="closeNotificationsMenu"
                  aria-label="Notifications"
                  aria-haspopup="true"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"
                    ></path>
                  </svg> -->
                  <!-- Notification badge -->
                  <!-- <span
                    aria-hidden="true"
                    class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"
                  ></span>
                </button>
                <template x-if="isNotificationsMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeNotificationsMenu"
                    @keydown.escape="closeNotificationsMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Messages</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          13
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Sales</span>
                        <span
                          class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600"
                        >
                          2
                        </span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <span>Alerts</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li> -->
              <!-- Profile menu -->
              <li class="relative">
                <button
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <!-- <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                    alt=""
                    aria-hidden="true"
                  /> -->
                  <p>{{ Auth::user()->name }}</p>
                </button>
                
                <template x-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="{{route('profile.edit')}}"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          ></path>
                        </svg>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="{{route('dashboard')}}"
                      >
                      <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          ></path>
                          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>User Home</span>
                      </a>
                    </li>
                    <li class="flex">
                    <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()";
                      >
                      <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span>Logout</span>
                      </a>
                      <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        
        @yield('content')

        @include('layouts.footer')
      </div>
    </div>
  </body>
</html>
