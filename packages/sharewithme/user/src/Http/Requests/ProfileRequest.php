<?php 
namespace Sharewithme\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest {

  /**
 * Get the validation rules that apply to the request.
 *
 * @return array
 */
  public function rules () {
    return [
      'first_name' => 'required',
      'last_name' => 'required',
      'middle_name' => 'nullable',
      'place_of_birth' => 'nullable',
      'date_of_birth' => 'required|date|date_format:Y-m-d',
    ];
  }

  public function authorize () {
    return true;
  }
}
