<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'publisher' => $this->publisher,
            'edition' => $this->edition,
            'publish_year' => $this->publish_year,
            'price' => $this->price,
            'subjects' => $this->subjects,
            'authors' => $this->authors,
        ];
    }
}
