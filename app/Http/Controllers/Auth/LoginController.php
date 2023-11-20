<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function login(Request $request)
    {
        // return $request;
        $this->validateLogin($request);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = auth()->user();

            // $userPerms = Route::join('permission_route', 'permission_route.route_id', '=', 'routes.id')
            // ->join('permission_role', 'permission_role.permission_id', '=', 'permission_route.permission_id')
            // ->join('role_user', 'role_user.role_id', '=', 'permission_role.role_id')

            // ->join('device_role', 'device_role.role_id', 'role_user.role_id')
            // ->join('devices', 'device_role.device_id', 'devices.id')
            // ->where('devices.ip', User::getIPAddress())

            // ->where('role_user.user_id', $user->id)->pluck('routes.name', 'routes.id')->toArray();

            // Session::put('userPermissions', $userPerms);
            //redirect the user to the first allowed permission
            //return redirect()->route(reset($userPerms));
            return redirect()->route('dashboard');
        }

        return redirect('dashboard/login')->withSuccess('Login details are not valid');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'email';
    }
}
