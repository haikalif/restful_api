<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class todoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_tugas' => $this->id,
            'judul_todo' => $this->judul,
            'desrkipsi_tugas' => $this->deskripsi,
            'status_tugas' => $this->selesai ? 'done coy' : 'kerjain nih belum kelar',
            'level_prioritas' => $this->prioritas,
            'tanggal_dibuat' => $this->created_at->format('d-m-Y H:i')
        ];
    }
}
