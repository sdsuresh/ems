<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
    	$employees = Employee::all();
    	return View('index', compact('employees'));
    }

    public function edit($id){
    	$employee = Employee::find($id);
    	return View('edit', compact('employee'));
    }

    public function update(EmployeeUpdateRequest $request){
    	Employee::updateorCreate([
            'id' => $request->get('id')
        ], [
        	'id' => $request->get('id'),
          'name' => $request->get('name'),
          'age' => $request->get('age')
        ]);
    	return redirect('/')->with('success', 'Employee detail updated.');
    }
}
