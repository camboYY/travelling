<?php namespace Sharewithme\User\Requests;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest {

  /**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
  public function rules () {
    if (isset($this->code) && $this->code !== null) {
      return [
        'code' => 'required|string'
      ];
    }
    
    return [
      'email' => 'nullable',
      'phone_number' => 'required|numeric',
    ];
  }

  public function authorize () {
    return true;
  }
}
