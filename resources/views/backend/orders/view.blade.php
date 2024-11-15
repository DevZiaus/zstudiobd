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
                    <td class="px-4 py-3 text-xs"><a href="{{ optional($order->mediaInfo)->external_url }}" target="_blank" rel="noopener noreferrer">{{ optional($order->mediaInfo)->title }}</a></td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">File</td>
                    <td>:</td>
                  <td class="px-4 py-3 text-sm">{{ optional($order->mediaInfo)->file_path }}</td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Client</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm">{{ $order->uploader->name }}</td>
                </tr>

                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-xs">Bill</td>
                  <td>:</td>
                  <td class="px-4 py-3 text-sm">
                    <form action="{{route('update.bill')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$order->id}}">
                      <input type="text" class="w-18 p-1 rounded bg-white dark:bg-gray-700 text-center mr-2 mb-2 dark:text-white dark:focus:ring-green-800" id="" name="bill" value="{{$order->bill}}">
                      <button type="submit" class="rounded-full text-green-800 bg-white">
                      <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#023020" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </button>
                    </form>
                  </td>
                </tr>

                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-xs">ETA</td>
                  <td>:</td>
                  <td class="px-4 py-3 text-sm">
                    <form action="{{route('update.eta')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$order->id}}">
                      <input type="text" class="w-1/2 p-1 rounded bg-white dark:bg-gray-700 text-center mr-2 mb-2 dark:text-white dark:focus:ring-green-800" id="" name="eta" value="{{$order->eta}}">
                      <button type="submit" class="rounded-full text-green-800 bg-white">
                      <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#023020" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    </button>
                    </form>
                  </td>
                </tr>

                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Order Status</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm"> 
                      {{$order->osInfo->os_name}}
                      <form class="inline-block" action="{{route('update.os')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$order->id}}">
                      <button type="submit" class="rounded-full text-green-800 bg-white">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#023020" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </button>
                    </form> 
                    </td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Payment Status</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm"> 
                    {{$order->psInfo->ps_name}}
                    <form class="inline-block" action="{{route('update.ps')}}" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$order->id}}">
                      <button href="#" type="submit" class="rounded-full text-green-800 bg-white">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#023020" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                      </button>
                    </form> 
                  </td>
                    
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Transaction ID</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm">{{$order->tr_id}}</td>
                </tr>
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-xs">Complete File</td>
                    <td>:</td>
                    <td class="px-4 py-3 text-sm">
                      <form class="w-full" method="post" action="{{route('update.order')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$order->id}}">
                        <textarea id="txtarea" name="complete_file" rows="8" class="block  p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Paste Your transcript here...">{{ $order -> complete_file }}</textarea>
                        <button href="#" type="submit" class="text-gray-800 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-xs px-3 py-2 text-center mr-2 mb-2 dark:text-white dark:focus:ring-green-800">Save</button>
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