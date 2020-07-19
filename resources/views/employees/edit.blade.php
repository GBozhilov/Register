@extends('layouts.app')

@section('content')
    <div class="m-5">
        <a href="{{route('employees')}}"><input
                    class="bg-blue-400 hover:bg-blue-700 text-white font-bold m-lg-3 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" value="Back"></a>
        <a href="{{route('home')}}"><input
                    class="bg-blue-400 hover:bg-blue-700 text-white font-bold m-lg-3 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit" value="Home"></a>
        <form method="post" id="edit_form" class="border bg-white rounded px-8 pt-6 pb-8 mb-4"
              action="{{route('employee.update',['id' => $employee->id])}}">
            @csrf

            <x-alert/>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">
                    First Name
                </label>
                <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="first_name" name="first_name" placeholder="First Name" value="{{$employee->first_name}}">
                <span class="ml-5 text-gray-700 text-sm font-bold mb-2">The field is required and should be between 3 and 255 symbols</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">
                    Last Name
                </label>
                <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="last_name" name="last_name" placeholder="Last Name" value="{{$employee->last_name}}">
                <span class="ml-5 text-gray-700 text-sm font-bold mb-2">The field should be between 3 and 255 symbols</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    Phone
                </label>
                <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="phone" name="phone" placeholder="Phone" value="{{$employee->phone}}">
                <span class="ml-5 text-gray-700 text-sm font-bold mb-2">The field is not required</span>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth">
                    Date Of Birth
                </label>
                <input class="shadow appearance-none border rounded w-25 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="date_of_birth" name="date_of_birth" type="date" value="{{$employee->date_of_birth}}">
                <span class="ml-5 text-gray-700 text-sm font-bold mb-2">The field is not required</span>
            </div>
            <div class="flex items-center justify-center">
                <input class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                       type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection