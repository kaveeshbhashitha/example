<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate if a file is uploaded
        if ($request->hasFile('photo')) {
            $requestdata = $request->all();
            $fileName = time() . $request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('img', $fileName, 'public');
            $requestdata['photo'] = '/storage/' . $path;
            Employee::create($requestdata);
            return redirect('employee')->with('flash_message', 'Employee added successfully');
        } else {
            // Handle case where no file is uploaded
            return redirect()->back()->with('error_message', 'Please upload a photo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the image
        ]);

        $employee = Employee::findOrFail($id);

        // Update employee data
        $employee->name = $request->input('name');
        $employee->address = $request->input('address');
        $employee->mobile = $request->input('mobile');

        // Check if a new photo has been uploaded
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $path = $request->file('photo')->storeAs('img', $fileName, 'public');
            $employee->photo = '/storage/' . $path;
        }

        // Save the changes to the database
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employee.index')->with('success', 'Employee deleted successfully');
    }

    public function publish($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->status = 'published';
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee published successfully');
    }

    public function unpublish($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->status = 'unpublished';
        $employee->save();

        return redirect()->route('employee.index')->with('success', 'Employee unpublished successfully');
    }
}
