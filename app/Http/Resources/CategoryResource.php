<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'id'=> $this->id,
            'categoryName' => $this->categoryName,
            'categorySlug'=>$this->categorySlug,
            'categoryImage'=>$this->categoryImage,
            'categoryParent'=>$this->categoryParent,
            'categoryDesc'=>$this->categoryDesc,
            'categoryStatus'=>$this->categoryStatus,
        ];
    }
}
