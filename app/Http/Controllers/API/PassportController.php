<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser as StoreUser;
use App\User;
use Auth;

class PassportController extends Controller
{
  public $successStatus = 200;

  public function login()
  {
  	if (Auth::attempt(['email' => request('email'), 'password' => request('password')]))
    {
      $user = Auth::user();
      $success['token'] = $user->createToken('MyApp')->accessToken;
      return response()->json(['success' => $success], $this->successStatus);
    }
    else
    {
      return response()->json (['error' => 'Unauthorised'], 401);
    }
  }
  public function register(Request $request)
  {

    $newUser = new User;

    $newUser->name = $request->name;
    $newUser->email = $request->email;
    $newUser->password = bcrypt($request->password);
    // $newUser->c_password = $request->c_password;

    $newUser->pokemon = $request->pokemon;
    $newUser->codigo = $request->codigo;

	  $success['token'] = $newUser->createToken('MyApp')->accessToken;
	  $success['name'] = $newUser->name;

    $newUser->save();

	  return response()->json(['success' => $success], $this->successStatus);
  }

  public function getDetails()
  {
    $user = Auth::user();
    return response()->json(['success' => $user], $this->successStatus);
  }

}
