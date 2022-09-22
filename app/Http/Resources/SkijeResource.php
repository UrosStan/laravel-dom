<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SkijeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */


     public static $wrap='skije';
    public function toArray($request)
    {
        // return parent::toArray($request);

        return[
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'description'=>$this->resource->description,
            'price'=>$this->resource->price,
            'type'=>new TypeResource($this->resource->type),
            'user'=>new UserResource($this->resource->user)

        ];
    }
}
