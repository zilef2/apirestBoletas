<?php

namespace App\Http\Resources;
use App\Models\Boleta;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\Resource;

class BoletaResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this->id);
        return [
            'id' => $this->id,
            'codigo' => $this->codigo,
            // 'Boleta' => new BoletaResource($this->Boleta)
        ];
        // return parent::toArray($request);
    }
}