@extends('layouts.admin')
@section('content')
<section class="flex bg-gray-50 dark:bg-gray-900">
  <div class="w-full mt-4 max-w-screen-xl px-4 mx-auto lg:px-12">
    <!-- Start coding here -->
    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
        <div>
          <h5 class="mr-3 font-semibold dark:text-white">Orders No {{$order->id}}</h5>
          <p class="text-gray-500 dark:text-gray-400">View and upload completed file for order of {{$order->userInfo->name}}</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="flex h-screen bg-gray-50 dark:bg-gray-900">
  <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4 max-w-screen-xl px-4 mx-auto lg:px-12">
      <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <tbody class=" text-center bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Order ID</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-xs">{{$order->id}}</td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Link</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-xs"><a href="{{$order->link}}" target="_blank" rel="noopener noreferrer">{{$order->link}}</a></td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">File</td>
                    <td>:</td>
                  <td class="px-4 py-3 text-sm">{{$order->file}}</td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Client</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm">{{$order->userInfo->name}}</td>
                </tr>
                
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Order Status</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm"> {{$order->osInfo->os_name}} </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3 text-xs">Payment Status</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm"> {{$order->psInfo->ps_name}} </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Complete File</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm">
                      <form class="w-full" method="post" action="{{route('update.order')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <textarea name="complete_file" rows="8" class="block  p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Paste Your transcript here...">{{ $order -> complete_file }}</textarea>
                        <button href="#" type="submit" class="text-gray-800 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-xs px-3 py-2 text-center mr-2 mb-2 dark:text-white dark:focus:ring-green-800">Complete</button>
                        <a href="{{route('all.orders')}}" type="button" class="text-gray-800 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-xs px-3 py-2 text-center mr-2 mb-2 dark:text-white dark:focus:ring-green-800">Cancel</a>
                      </form>

                    </td>
                </tr>
          </tbody>
        </table>
        <div class=" flex items-center justify-center border-t-2 border-neutral-100 px-6 py-3 dark:border-neutral-600 dark:text-neutral-50">
          
          </div>
      </div>
    </div>
</section>
@endsection