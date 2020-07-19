<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * EmployeeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('employees.index', compact('employees'));
    }

    /**
     * @param EmployeeCreateRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeCreateRequest $request): RedirectResponse
    {
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'user_id' => auth()->user()->id,
        ]);

        return redirect(route('employees'))
            ->with('message', 'Employee created successfully');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $employee = Employee::find($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * @param EmployeeCreateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(EmployeeCreateRequest $request, $id): RedirectResponse
    {
        $employee = Employee::find($id);
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->phone = $request->phone;
        $employee->date_of_birth = $request->date_of_birth;
        $employee->save();

        return redirect(route('employees'))
            ->with('message', 'Employee updated successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $employee = Employee::find($id);
        $employee->delete($id);
        $msg = "Record $employee->first_name was deleted";

        return redirect()->back()->with('message', $msg);
    }

    /**
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function fire(Employee $employee): RedirectResponse
    {
        $employee->update(['fired' => true]);
        $msg = "$employee->first_name is fired. You are a bad person. 😞";

        return redirect()->back()->with('error', $msg);
    }


    /**
     * @param Employee $employee
     * @return RedirectResponse
     */
    public function hire(Employee $employee): RedirectResponse
    {
        $employee->update(['fired' => false]);
        $msg = "$employee->first_name is hired again. You are a nice guy. 😀";

        return redirect()->back()->with('message', $msg);
    }
}
