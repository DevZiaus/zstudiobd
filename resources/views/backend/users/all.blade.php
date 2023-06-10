@extends('layouts.admin')
@section('content')
<section class="flex bg-gray-50 dark:bg-gray-900">
  <div class="w-full mt-4 max-w-screen-xl px-4 mx-auto lg:px-12">
    <!-- Start coding here -->
    <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
      <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
        <div>
          <h5 class="mr-3 font-semibold dark:text-white">All Users</h5>
          <p class="text-gray-500 dark:text-gray-400">View all your existing users</p>
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
            <thead>
                <tr class="text-center text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                  <th class="px-4 py-3">SN</th>
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Username</th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Phone</th>
                  <th class="px-4 py-3">Role</th>
                  <th class="px-4 py-3">Manage</th>
                </tr>
            </thead>
            <tbody class=" text-center bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              @foreach($allUser as $user)
              <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">{{$loop->iteration}}</td>
                  <td class="px-4 py-3 text-sm">
                    <div class="flex items-center text-sm">
                    <div>
                        <p class="font-semibold">{{$user->name}}</p>
                    </div>
                </td>
                <td class="px-4 py-3 text-xs"> {{$user->username}} </td>
                <td class="px-4 py-3 text-xs"> {{$user->email}} </td>
                <td class="px-4 py-3 text-sm"> {{$user->phone}} </td>
                <td class="px-4 py-3 text-sm"> {{$user->roleInfo->role_name}} </td>
                <td class="px-4 py-3 text-sm">
                  <a href="{{route('view.user',[$user->id])}}" type="button" class="text-gray-800 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:text-white dark:focus:ring-green-800">View</a>
                  @if((Auth::user()->role == '1'))
                    <a a href="{{route('edit.user',[$user->id])}}" type="button" class="text-gray-800 bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:text-white dark:focus:ring-yellow-900">Edit</a>
                    <a a href="#" type="button" class="text-gray-800 bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:text-white dark:focus:ring-red-900">Delete</a>
                  @endif
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
</section>
@endsection