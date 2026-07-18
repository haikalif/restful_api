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
            'deskripsi' => 'sometimes|string',
            'selesai' => 'required|boolean',
            'tanggal_selesai' => 'sometimes|date',
            'prioritas' => 'sometimes|in:low,normal,high',
            'kategori' => 'sometimes|string|max:255',
        ];
    }

    #[Override]
    public function messages(): array
    {
        return [
            'selesai.required' => 'adoi wang, nak isi boolean pon kau malas, kau tingal buat 1 dengan 0 je malas juga, memang lah kau ni'
        ];
    }
}
