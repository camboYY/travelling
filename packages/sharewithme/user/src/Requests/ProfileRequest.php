<?php namespace Sharewithme\User\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {

  /**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
  public function rules () {
    return [
      'first_name' => 'nullable',
      'last_name' => 'nullable',
      'middle_name' => 'nullable',
      'place_of_birth' => 'nullable',
      'date_of_birth' => 'nullable|date',
    ];
  }

  public function authorize () {
    return true;
  }
}
