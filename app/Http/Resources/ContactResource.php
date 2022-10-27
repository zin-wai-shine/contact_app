<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company' => $this->company,
            'jop_title' => $this->job_title,
            'birthday' => $this->birthday,
            'note' => $this->note,
            'time' => $this->created_at->format("h:i A"),
            'date' => $this->created_at->format("d/M/Y"),
            'contact_img' => Storage::url($this->featured_img),
            'owner' => new UserResource($this->user),
        ];
    }
}
