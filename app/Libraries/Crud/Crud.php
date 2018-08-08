<?php

namespace App\Libraries\Crud;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Crud 
{

	public static function add(Model $model, Request $request, $validation = [], \Closure $postvalidation = NULL, $postvalidationinput = NULL)
	{
		$validator = \Validator::make($request->all(), $validation);

		if ($validator->fails()) {
			return response()->json(['error' => call_user_func_array('array_merge', array_values($validator->errors()->messages()))], 422);
		}

		if ($postvalidation) {
			$postvalidation($postvalidationinput);
		}

		try {
			$model->create($request->only(array_keys($validation)));

			return response()->json(['success' => 'success'], 200);
		} catch (\Exception $e) {
			return response()->json(['error' => $e->getMessage()], 500);
		}
	}

	public static function edit(Model $model, Request $request, $validation = [], $key = 'id')
	{
		$validator = \Validator::make($request->all(), $validation);

		if ($validator->fails()) {
			return response()->json(['error' => call_user_func_array('array_merge', array_values($validator->errors()->messages()))], 422);
		}

		try {
			$model::where($key, $request->input($key))
				->update($request->only(array_keys($validation)));

			return response()->json(['success' => 'success'], 200);
		} catch (\Exception $e) {
			return response()->json(['error' => $e->getMessage()], 500);
		}
	}

	public static function delete(Model $model, Request $request, $validation = [], $key = 'id')
	{
		$validator = \Validator::make($request->all(), $validation);

		if ($validator->fails()) {
			return response()->json(['error' => call_user_func_array('array_merge', array_values($validator->errors()->messages()))], 422);
		}

		try {
			$model::where($key, $request->input($key))
				->delete();

			return response()->json(['success' => 'success'], 200);
		} catch (\Exception $e) {
			return response()->json(['error' => $e->getMessage()], 500);
		}
	}
}