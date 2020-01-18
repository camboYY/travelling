<?php 
namespace Sharewithme\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
      return [
          'id' => $this->id,
          'first_name' => $this->first_name,
          'last_name' => $this->last_name,
          'date_of_birth' => $this->date_of_birth,
          'middle_name' => $this->middle_name,
          'place_of_birth' => $this->place_of_birth
      ];
    }
}