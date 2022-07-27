<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "item_name" => "required",
            "item_price" => "required",
            "item_date" => "required",
            "item_number" => "required",
            "item_type" => "required"
        ];
    }

    public function messages(){
        return[
            "item_name.required" => "El nombre es requerido",
            "item_price.required" => "El precio es requerido",
            "item_date.required" => "La fecha es requerida",
            "item_number.required" => "La cantidad de articulo es requerido",
            "item_type.required" => "El tipo de articulo es requerido"
        ];
    }
}
