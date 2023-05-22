<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
              'name' => ['required', 'string', 'min:3']
            , 'alias' => ['nullable', 'string', 'min:2']
            , 'category_id' => ['required', Rule::exists('categories', 'id')]
            , 'price' => ['required', 'string', 'min:1']
            , 'register_number' => ['nullable', 'string']
            , 'accounting_number' => ['nullable', 'string']
            , 'inventory_date' => ['nullable', 'string']
            , 'responsible_user_signature' => ['nullable', 'string']
            , 'section_id' => ['required', Rule::exists('sections', 'id')]
        ];
    }
}
