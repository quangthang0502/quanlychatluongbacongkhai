<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
	public function rules()
	{
		return [
			'name' => 'required|min:5|max:191',
			'email' => 'required|min:5|max:191',
			'type' => 'required',
			'school_name' => 'max:191',
			'password' => 'max:20',
			'password_confirmation' => 'same:password'
		];
	}

	public function messages() {
		return [
			'password.required' => "Mật khẩu không được để trống!",
			'password_confirmation.required' => "Mật khẩu không được để trống!",
			'password_confirmation.same' => 'Mật khẩu nhập lại không trùng!'
		];
	}
}
