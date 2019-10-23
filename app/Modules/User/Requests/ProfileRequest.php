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
      'title' => 'required|unique:posts|max:255',
      'body' => 'required',
    ];
  }

  public function authorize () {
    return true;
  }
}
