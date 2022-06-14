<?php

  

namespace App\Http\Controllers\Auth;

  

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Models\User;
use App\Models\Prof;

use Hash;

  

class AuthController extends Controller

{

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index()

    {

        return view('auth.login');

    }  

    public function loginAdmin()
    {
        return view('auth.loginAdmin');
    }

    public function loginPostAdmin(Request $request)
    {
        $fields=$request->validate([
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $Owner=User::where('email',$fields['email'])->first();
            if($Owner && $fields['password']==$Owner->password){
                 //send response
                return view('layoutAdmin');
            }else{
                return redirect("login");
            }
        
    }
    

    public function AddProf()
    {
        return view('AddProf');
    }
    
    

    public function AddPostProf(Request $request)
    {
        $fields=$request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'departement' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);
        $request->request->add(['type'=> 'Prof']);// in order to add the user type
        $owner= User::create([
            'login'=>$request->login,
            'password'=>$request->password,
            'type'=>$request->type,
        ]);
        $owner= Prof::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'departement'=>$request->departement,
            'login'=>$owner->id,
        ]);
        
        return view('AddProf');
    }
      

    public function AddStudent()
    {
        return view('AddStudent');
    }

    
    public function loginProf()
    {
        return view('auth.loginProf');
    }
    public function RegisterProf()
    {
        return view('adminSpace.registerProf');
    }

    public function loginStudent()
    {
        return view('auth.loginStudent');
    }
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function registration()

    {

        return view('auth.registration');

    }

      

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postLogin(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);

   

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboard')

                        ->withSuccess('You have Successfully loggedin');

        }

  

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }

    public function postLoginAdmin(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);

   

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboardAdmin')

                        ->withSuccess('You have Successfully loggedin');

        }

  

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }
    
    public function postLoginStudent(Request $request)

    {

        $request->validate([

            'email' => 'required',

            'password' => 'required',

        ]);

   

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('dashboardAdmin')

                        ->withSuccess('You have Successfully loggedin');

        }

  

        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');

    }

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function postRegistration(Request $request)

    {  

        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'password' => 'required|min:6',

        ]);

           

        $data = $request->all();

        $check = $this->create($data);

         

        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function dashboard()

    {

        if(Auth::check()){

            return view('dashboard');

        }

  

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    public function dashboardAdmin()
    {
        if(Auth::check()){

            return view('dashboardAdmin');

        }

  

        return redirect("login")->withSuccess('Opps! You do not have access');

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function create(array $data)

    {

      return User::create([

        'name' => $data['name'],

        'email' => $data['email'],

        'password' => Hash::make($data['password'])

      ]);

    }

    

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function logout() {

        Session::flush();

        Auth::logout();

  

        return Redirect('login');

    }

}