<?php namespace App\Modules\User\Controllers;
use App\Http\Controllers\Controller;
use App\Modules\User\Requests\ProfileRequest;
use App\Modules\User\Resource\ProfileResource;
use App\Modules\User\Repositories\ProfileRepositoryInterface as Profile;

class ProfileController extends Controller {
    private $profile;

    public function __construct ( Profile $profile) {
      $this->profile = $profile;
    }
    
    public function get ( $profileId ) {
      return new ProfileResource($this->profile->get($profileId));
    }

    public function all () {
      return ProfileResource::collection($this->profile->all());
    }

    public function store ( ProfileRequest $request ) {
      $validatedRecords = $request->validated();

      if ($records = $this->profile->create($validatedRecords)) {
        return new ProfileResource ( $records );
      }
      return response()->json(['error' => 'Unable to create profile']);
    }
    
    public function edit ( ProfileRequest $request ) {
      $validatedRecords = $request->validated();

      if ($records = $this->profile->update($validatedRecords)) {
        return new ProfileResource ( $records );
      }
      return response()->json(['error' => 'Unable to update profile']);
    }

    public function delete ( $profileId ) {
      if ($this->profile->delete($profileId)) {
        return response()->json(['success' => 'profile deleted'], 200);
      }
      return response()->json(['error' => 'Unable to delete profile']);
    }

}