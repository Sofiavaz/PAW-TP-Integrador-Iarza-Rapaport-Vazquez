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
            'duration_mins' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'course_img'=> 'required||mimes:jpeg,png,jpg,gif,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campo obligatorio',
//            'name.required' => 'El nombre de la clase es obligatorio.',
            'name.max' => 'El nombre de la clase no puede superar los 255 caracteres.',
//            'date_time.required'  => 'La fecha y hora son obligatorias.',
            'date_time.date' => 'La fecha y hora de la clase deben ser válidas.',
//            'short_description.required' => 'Una breve descripción de la clase es obligatoria',
//            'max_enrollments.required' => 'La cantidad máxima de participantes es obligatoria.',
            'max_enrollments.integer' => 'La cantidad máxima de participantes debe ser un número entero.',
            'max_enrollments.min' => 'La cantidad máxima de participantes debe ser mayor a 0.',
//            'duration_mins.required' => 'La duración de la clase es obligatoria.',
            'duration_mins.numeric' => 'La duración de la clase debe ser un número válido.',
            'duration_mins.min' => 'La duración de la clase debe ser mayor que 0.',
//            'price.required' => 'El precio de la clase es obligatorio.',
            'price.min' => 'El precio de la clase puede ser 0 (si es gratis) o un número mayor (si tiene costo).',
//            'img.required' => 'La imagen es obligatoria.',
            'img.image' => 'La imagen debe tener un formato válido(jpeg, png, bmp, gif, svg, o webp).',
            'img.max' => 'La imagen debe tener un tamaño máximo de 2048KB'
        ];
    }
}
