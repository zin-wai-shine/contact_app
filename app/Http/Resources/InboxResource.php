<?php

namespace App\Http\Resources;

use App\Models\Contact;
use Illuminate\Http\Resources\Json\JsonResource;

class InboxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $contact = Contact::find($this->contact_id);
        return[
            'id' => $this->id,
            'from' => $this->from,
            'to' => $this->to,
            'data' => new ContactResource($contact),
            'time' => $this->created_at->format("h:i A"),
            'date' => $this->created_at->format("d/M/Y"),
        ];
    }
}
