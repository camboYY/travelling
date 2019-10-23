<?php namespace App\Modules\User\Requests;
use Illuminate\Http\Request;

class ProfileRequest extends Request {

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
