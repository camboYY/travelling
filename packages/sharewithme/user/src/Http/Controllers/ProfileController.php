<?php 
namespace Sharewithme\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sharewithme\User\Http\Requests\ProfileRequest;
use Sharewithme\User\Http\Resources\ProfileResource;
use Sharewithme\User\Repositories\Contracts\ProfileRepositoryInterface as Profile;

class ProfileController extends Controller {
    private $profile;

    public function __construct ( Profile $profile) {
      $this->profile = $profile;
    }
    
    public function get ( $profileId ) {
      if ( $profile = $this->profile->get($profileId) )
      return new ProfileResource($profile);

      return response()->json(['success' => false, 'message' => 'Unable to retrieve profile']);
    }

    public function all (Request $request) {
      $perPage = $request->perPage;
      if (!$perPage) {
        $perPage = null;
      }

      return ProfileResource::collection($this->profile->all($perPage));
    }

    public function store ( ProfileRequest $request ) {
      if ($records = $this->profile->create($request->all())) {
        return new ProfileResource ( $records );
      }
      return response()->json(['success' => false, 'error' => 'Unable to create profile']);
    }
    
    public function edit ( $profileId, ProfileRequest $request ) {

      if ($records = $this->profile->update($profileId, $request->all())) {
        return new ProfileResource ( $records );
      }
      return response()->json(['success' => false, 'error' => 'Unable to update profile']);
    }

    public function delete ( $profileId ) {
      if ($this->profile->delete($profileId)) {
        return response()->json(['success' => true, 'message' => 'profile deleted'], 200);
      }
      return response()->json(['success' => false, 'message' => 'Unable to delete profile'], 404);
    }

}