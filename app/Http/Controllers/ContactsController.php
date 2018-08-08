<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Libraries\Crud\Crud;
use App\Models\Contacts;

class ContactsController extends Controller
{
	
	public function get()
	{
		return Contacts::select('*')->get();
	}

	public function add(Request $request)
	{
		//Convert to uppercase only if exist
		!$request->input('region') ?: $request->merge(['region' => strtoupper($request->input('region'))]);

		$validation = [
		'name' => 'required|max:90',
		'email' => 'required|unique:contacts,email|max:40|email',
		'phone' => 'required|regex:/(0)[0-9]{10}/',
		'country' => 'max:20',
		'city' => 'max:40',
		'region' => 'nullable|size:2|alpha',
		'postal_code' => 'max:10'
		];

		return Crud::add(new Contacts, $request, $validation);
	}

	public function edit(Request $request)
	{
		//Convert to uppercase only if exist
		!$request->input('region') ?: $request->merge(['region' => strtoupper($request->input('region'))]);

		$validation = [
		'id' => 'required|exists:contacts,id',
		 'name' => 'required|max:90',
		'email' => 'required|unique:contacts,email|max:40|email',
		'phone' => 'required|regex:/(0)[0-9]{10}/',
		'country' => 'max:20',
		'city' => 'nullable|size:2|alpha',
		'region' => 'max:20',
		'postal_code' => 'max:10'
		];

		return Crud::edit(new Contacts, $request, $validation);
	}

	public function delete(Request $request)
	{
		$validation = [
		'id' => 'required|exists:contacts,id',
		];

		return Crud::delete(new Contacts, $request, $validation);
	}
}
