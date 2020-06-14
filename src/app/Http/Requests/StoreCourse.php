<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
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
            'name' => 'required|max:255',
            'date_time' => 'required|date',
            'short_description' => 'required|max:255',
            'max_enrollments' => 'required|integer|min:0',
            'price' => 'required|min:0|'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la clase es obligatorio.',
            'name.max' => 'El nombre de la clase no puede superar los 255 caracteres.',
            'date_time.required'  => 'La fecha y hora en que dará la clase, son obligatorias.',
            'date_time.date' => 'La fecha y hora de la clase deben ser válidas.',
            'max_enrollments.required' => 'La cantidad máxima de participantes es obligatoria.',
            'max_enrollments.integer' => 'La cantidad máxima de participantes debe ser un número entero.',
            'max_enrollments.min' => 'La cantidad máxima de participantes debe ser mayor a 0.',
            'price.required' => 'El precio de la clase es obligatorio.',
            'price.min' => 'El precio de la clase puede ser 0 (si es gratis) o un número mayor (si tiene costo).'
        ];
    }
}
