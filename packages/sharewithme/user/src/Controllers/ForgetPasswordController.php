<?php namespace Sharewithme\User\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Sharewithme\User\Requests\PasswordResetRequest;
use Sharewithme\User\Resources\PasswordResetResource;
use Sharewithme\User\Repositories\ResetPasswordRepositoryInterface as PasswordReset;


class ForgetPasswordController extends Controller {

  protected $passwordReset;

  public function __construct (PasswordReset $passwordReset ) {
    $this->passwordReset = $passwordReset;
  }

  public function reset( PasswordResetRequest $passwordResetRequest) {
    if (User::where('phone_number', $passwordResetRequest->phone_number)->get()) {
        $collections = collect($passwordResetRequest)->put('code', bcrypt('verifiedCode'));
      if ($recordsCreated = $this->passwordReset->reset($collections->toArray())) {
        return new PasswordResetResource ($recordsCreated);
      }

      return response()->json(['error' => 'Unable to create reset password'], 401);
    }
    return response()->json(['error' => 'Your phone number is unregistered'], 401);
  }

  public function verify (PasswordResetRequest $passwordResetRequest) {
    if ($verifiedCode = $this->passwordReset->verify ($passwordResetRequest->code)) {
      return new PasswordResetResource ($verifiedCode);
    }
    return response()->json(['error' => 'Code entered does not match'], 401);
  }
} 