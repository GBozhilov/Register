@extends('employees.layout')

@section('content')

    <div class="flex items-center justify-center mb-3">
        <a href="{{route('home')}}">
            <input class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                   type="submit" value="Back To Home">
        </a>
    </div>
    <div class="text-center">
        <x-alert/>
        @if($employees->count() > 0)
            <h1 class="text-2xl mb-4">All Your Employees</h1>
        @else
            <h1 class="text-2xl mb-4">You Have Not Any Employees</h1>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Action</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Date Of Birth</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>
                        @if($employee->fired)
                            <a href="{{route('employee.hire', $employee)}}"
                               class="btn btn-secondary btn btn-success btn-sm">Hire an employee</a>
                        @else
                            <a href="{{route('employee.fire', $employee)}}"
                               class="btn btn-secondary btn btn-danger btn-sm">Fire an employee</a>
                        @endif
                    </td>
                    <td class="{{ $employee->fired ? 'line-through' : '' }}">{{$employee->first_name}}</td>
                    <td class="{{ $employee->fired ? 'line-through' : '' }}">{{$employee->last_name}}</td>
                    <td class="{{ $employee->fired ? 'line-through' : '' }}">{{$employee->phone}}</td>
                    <td class="{{ $employee->fired ? 'line-through' : '' }}">{{$employee->date_of_birth}}</td>
                    <td>
                        <a href="{{route('employee.edit', ['id'=>$employee->id])}}"
                           class="btn btn-secondary btn-sm">Update</a>
                    </td>
                    <td>
                        <a href="{{route('employee.delete', ['id'=>$employee->id])}}"
                           class="btn btn-danger btn-sm"
                           onclick="if(!confirm('Are you really want to delete?')){
                                event.preventDefault();
                           }">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $employees->links() }}
@endsection