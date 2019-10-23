<?php namespace App\Modules\User\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\User\Requests\ProfileRequest;
use App\Modules\User\Repositories\ProfileRepositoryInterface as Profile;

class ProfileController extends Controller {
    private $profile;

    public function __construct ( Profile $profile) {
      $this->profile = $profile;
    }

    public function store ( ProfileRequest $request ) {
      $validatedRecords = $request->validated();

      if ($records = $this->profile->create($validatedRecords)) {
        return response()->json(['success', $records], 200);
      }
    }

}