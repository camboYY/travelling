<?php 
namespace Sharewithme\User\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PasswordResetResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
      return [
          'phone_number' => $this->phone_number,
          'email' => $this->email,
          'code' => $this->code,
          'created_at' => $this->created_at,
      ];
    }
}