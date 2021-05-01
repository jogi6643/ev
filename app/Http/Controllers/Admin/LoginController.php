<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
   

	public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('/admin/login');
    }

    public function adminLogin(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('msg','Try again username password worng')
                    ->withInput($request->only('email', 'remember'));
    }


    protected function createAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->intended('admin/login');
    }


	public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login' );
    }

	// protected function guard($guard)
 	//    {
 	//        return Auth::guard($guard);
	//    }

}
