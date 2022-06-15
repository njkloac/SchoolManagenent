<?php

  

namespace App\Http\Controllers\Auth;

  

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Models\User;
use App\Models\Filiere;
use App\Models\Eleve;
use App\Models\Module;
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
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $Owner=User::where('login',$fields['login'])->first();
            if($Owner && $fields['password']==$Owner->password  && $Owner->type=='Admin'){
                 //send response
                return view('layoutAdmin');
            }else{
                return redirect("loginAdmin");
            }
        
    }

    public function loginPostProf(Request $request)
    {
        $fields=$request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $Owner=User::where('login',$fields['login'])->first();
            if($Owner && $fields['password']==$Owner->password && $Owner->type=='Prof'){
                 //send response
                 $students=Eleve::all();
                return view('indexProf', ['students' => $students]);
            }else{
                return redirect("login");
            }
        
    }

    public function loginPostStudent(Request $request)
    {
        $fields=$request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);
        $Owner=User::where('login',$fields['login'])->first();
            if($Owner && $fields['password']==$Owner->password && $Owner->type=='Student'){
                 //send response
                $notes=Eleve::where('code_eleve',$Owner->code);
                return view('indexStudent',['notes' => $notes]);
            }else{
                return redirect("login");
            }
        
    }

    public function AddNote($id)
    {
        $eleve=Eleve::where('code',$id)->first();
        $filiere=Filiere::where('code',$eleve->code_fil)->first();
        $modules=Module::where('code_fil',$filiere->code)->get();
        return view('AddStudentNote',['modules'=>$modules]); 
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

    public function AddPostStudent(Request $request)
    {
        $fields=$request->validate([
            'code' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'niveau' => 'required',
            'code_fil' => 'required',
            'login' => 'required',
            'password' => 'required',
        ]);
        $request->request->add(['type'=> 'Student']);// in order to add the user type
        $owner= User::create([
            'login'=>$request->login,
            'password'=>$request->password,
            'type'=>$request->type,
        ]);
        Eleve::create([
            'code'=>$request->code,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'niveau'=>$request->niveau,
            'code_fil'=>$request->code_fil,
            'login'=>$owner->id,
        ]);
        
        return view('AddStudent');
    }
    
   

    public function AddFiliere()
    {
        return view('AddFiliere');
    }
    
   

    public function AddModule()
    {
        return view('AddModule');
    }

    public function AddPostFiliere(Request $request)
    {
        $fields=$request->validate([
            'code' => 'required',
            'designation' => 'required',
            'responsable' => 'required',
        ]);
        $owner= Filiere::create([
            'code'=>$request->code,
            'designation'=>$request->designation,
            'responsable'=>$request->responsable,
        ]);
        
        return view('AddFiliere');
    }

    public function AddPostModule(Request $request)
    {
        $fields=$request->validate([
            'code' => 'required',
            'designation' => 'required',
            'niveau' => 'required',
            'semestre' => 'required',
            'code_fil' => 'required',
        ]);
        $owner= Module::create([
            'code'=>$request->code,
            'designation'=>$request->designation,
            'niveau'=>$request->niveau,
            'semestre'=>$request->semestre,
            'code_fil'=>$request->code_fil,
        ]);
        
        return view('AddModule');
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

    // public function logout() {

    //     Session::flush();

    //     Auth::logout();

    //     return Redirect('logout');

    // }

}