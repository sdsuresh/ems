<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeUpdateRequest extends FormRequest{

	 public function authorize()
    {
        return true;
    }

    public function rules(){
    	return [
    		'name' => 'required',
    		'age'  => 'required'
    	];
    }

    public function messages(){
    	return [
    		'name.required' => 'Name is required',
    		'age.required' => 'Age is required'
    	];
    }
}