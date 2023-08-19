<?php

namespace App\Http\Controllers;
use App\Models\Company; // Import the Company model


use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all(); // Get all companies

        return view('employees.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('employee_image')) {
            $imagePath = $request->file('employee_image')->store('employees', 'public');
            $validatedData['employee_image'] = $imagePath;
        }

        Employee::create($validatedData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee','companies'));
    }

    public function update(EmployeeRequest $request, Employee $employee)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('employee_image')) {
            Storage::disk('public')->delete($employee->employee_image);
            $imagePath = $request->file('employee_image')->store('employees', 'public');
            $validatedData['employee_image'] = $imagePath;
        }

        $employee->update($validatedData);

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->employee_image) {
            Storage::disk('public')->delete($employee->employee_image);
        }

        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
