<?php

namespace App\Http\Requests\Admin\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
	
	public function prepareForValidation() {
		$this->merge(['form_id' => $this->route('formId')]);
	}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
			'form_id' => 'exists:forms,id',
			'type' => 'required|int'//TODO: Custom validator for QuestionType enum
        ];
    }
}
