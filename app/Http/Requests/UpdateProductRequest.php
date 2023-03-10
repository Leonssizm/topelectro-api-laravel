<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *

	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, mixed>
	 */
	public function rules()
	{
		return [
			'name'           => 'required',
			'price'          => 'required|decimal:2,4',
			'wholesale_price'=> 'required|decimal:2,4',
			'sq'             => 'required',
			'color'          => 'required',
			'details'        => 'required',
			'category_ids'   => 'required|array|min:1',
		];
	}
}
