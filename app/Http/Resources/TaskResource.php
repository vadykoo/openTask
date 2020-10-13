<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'title' => $this->title,
            'content' => $this->content,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'labels' => LabelResource::collection($this->labels),
            'images' => $this->image()->first(),
            'user' => $this->user()->first(['id', 'name']),
        ];
    }
}
