<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
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
            'nim' => ['required', 'numeric', 'max:10'],
            'nama' => ['required', 'string', 'max:50'],
            'kelas' => ['required', 'string', 'max:5'],
            'jurusan' => ['required', 'string', 'max:35'],
        ];
    }
}
