<?php

namespace App\Http\Requests\Task;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(['common_ops', 'invoice_ops', 'custom_ops'])],
            'country' => ['required_if:type,common_ops', 'prohibited_unless:type,common_ops', 'string'],
            'amount.currency' => [
                'required_if:type,invoice_ops', 'prohibited_unless:type,invoice_ops', 'string',
                Rule::in(['€', '₺', '$', '£'])
            ],
            'amount.quantity' => ['required_if:type,invoice_ops', 'prohibited_unless:type,invoice_ops', 'int'],
            'prerequisites.*' => ['sometimes', 'numeric', 'exists:tasks,id', 'different:id'],
            'prerequisites' => ['sometimes', 'array'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()->all()], 422));
    }
}
