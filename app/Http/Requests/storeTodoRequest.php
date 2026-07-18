<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Override;

class storeTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::guard('sanctum')->check()){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'selesai' => 'required|boolean',
            'tanggal_selesai' => 'nullable|date',
            'prioritas' => 'required|in:low,normal,high',
            'kategori' => 'nullable|string|max:255',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'judul.required' => 'dompet boleh kosong, kolom ini jangan woi',
            'selesai.required' => 'masa ngetik boolean 1 sama 0 aja males, isi aja napa',
        ];
    }
}
