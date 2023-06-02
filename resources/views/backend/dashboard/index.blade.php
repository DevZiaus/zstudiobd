@extends('layouts.admin')
@section('content')

<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"> Admin Dashboard </h2>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
        <svg class="w-5 h-5" fill="currentColor" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 512 512" xml:space="preserve">
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
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"> Total Users </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"> 6389 </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
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
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"> Total clients </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"> 6389 </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"> Total Orders </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"> 376 </p>
        </div>
      </div>
      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"> Pending Orders </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"> 35 </p>
        </div>
      </div>
    </div>

</main>

@endsection