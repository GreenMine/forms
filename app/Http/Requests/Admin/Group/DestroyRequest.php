<?php

namespace App\Http\Requests\Admin\Group;

use Illuminate\Foundation\Http\FormRequest;

class DestroyRequest extends FormRequest
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
		$this->merge([
			'form_id' => $this->route('formId'),
			'group_id' => $this->route('groupId')
		]);
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
			'group_id' => 'exists:question_groups,id',
        ];
    }
}
