<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Override;

class updateTodoRequest extends FormRequest
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
            'judul' => 'sometimes|string|max:255',
            'deskripsi' => 'nullable|string',
            'selesai' => 'required|boolean',
            'tanggal_selesai' => 'nullable|date',
            'prioritas' => 'nullable|in:low,normal,high',
            'kategori' => 'nullable|string|max:255',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'judul.sometimes' => 'bagian ini bisa berubah bisa tetap menggunakan data lama jika tidak di replace',
            'prioritas.in' => 'cuma ada 3 pilihan low,normal,high. jangan aneh aneh ygy',
        ];
    }
}
