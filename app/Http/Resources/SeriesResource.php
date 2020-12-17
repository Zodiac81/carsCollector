<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'reference' => $this->reference,
            'line' => $this->line,
            'released' => $this->released,
            'finished' => $this->finished,
            'description' => $this->description,
            'position' => $this->position ?? null,
            'parent_id' => $this->parent_id ?? null,
            'categories' => new  CategoryCollection($this->categories)
        ];
    }
}
