<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReplyResource extends Resource
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
            'reply' => $this->body,
            'user' => $this->user->name,
            'created_at' => $this->created_at->diffForHumans(),

        ];
    }
}
