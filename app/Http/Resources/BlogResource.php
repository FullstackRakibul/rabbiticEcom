<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'blogTitle' => $this->blogTitle,
            'blogContent' => $this->blogContent,
            'blogImage' => $this->blogImage,
            'blogCategory' => $this->blogCategory,
            'status' => $this->status,
            'created_at' => $this->created_at->format('M d , y')
        ];
    }
}
