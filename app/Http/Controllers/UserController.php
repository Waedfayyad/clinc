<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{    
    function sidenav(){return view('layout.sidenav');}
    function UnderConstruction(){return view('UnderConstruction');}
    function welcome(){return view('welcome');}
    function welcome1(){return view('welcome1');}
    function login(){return view('login'); $posts = \App\Models\Post::all();
    }
    function aboute(){return view('aboute');}
    function contact(){return view('contact');}
    function registration(){return view('registration');}

    function user1()
        {
            if(Auth::check())
            {
                return view('doctor');
            }
            return redirect('login')->with('success', 'ليس لديك صلاحية الوصول');
        }
    function user2()
        {
            if(Auth::check())
            {
                return view('secretary');
            }
            return redirect('login')->with('success', 'ليس لديك صلاحية الوصول');
        }
    function user3()
        {
            if(Auth::check())
            {
                return view('serviec_table');
            }
            return redirect('login')->with('success', 'ليس لديك صلاحية الوصول');
        }
    function validate_registration(Request $request)
        {
            $request->validate([
                'user_full_name'         =>   'required',
                'email'        =>   'required|email|unique:users',
                'password'     =>   'required|min:6',
                'user_type' => 'required'
            ]);

            $data = $request->all();

            User::create([
                'user_full_name'  =>  $data['user_full_name'],
                'email' =>  $data['email'],
                'password' => Hash::make($data['password']),
                'user_type' =>  $data['user_type'],
            ]);

            return redirect('login')->with('success', 'تم التسجيل في الموقع بنجاح يمكنك الآن تسجيل الدخول');
        }
    function validate_login(Request $request)
        {
            $request->validate([
                'email' =>  'required',
                'password'  =>  'required'
            ]);

            $credentials = $request->only('email', 'password');

            if(Auth::attempt($credentials))
            {
                // Retrieve the authenticated user
                $user = Auth::user();
/*                 $s=new SearchController;
                $data= $s->getTodayCustomers($user->id);
            dd($data);
 */                // Get the user type from the authenticated user
                $userType = $user->user_type;
                $user_mobil=$user->user_mobile;
                // Use the user type to redirect the user to a specific page 
                $the_route='';
                if ($user_mobil == null){
                    $the_route='users.edit';
                }elseif ($userType == '1') {
                    $the_route='user1';
                } elseif ($userType == '2') {
                    $the_route='user2';
                } elseif ($userType == '3') {
                    $the_route='user3';
                } else {
                    $the_route='welcome';
                }
                return redirect()->route($the_route ,$user->id);
            }

            return redirect('login')->with('success', 'يرجى التأكد من صحة البريد الإلكتروني وكلمة المرور');
        }
    function dashboard()
        {
            if(Auth::check())
            {
                return view('dashboard');
            }

            return redirect('login')->with('success', 'ليس لديك صلاحية الوصول');
        }
    function logout()
        {
        Session::flush();

            Auth::logout();

            return Redirect('login');
        }
    function verifyUser()
        {
                // Retrieve the authenticated user
                if (Auth::check()) {
                    $user = Auth::user();
                    $userType = $user->user_type;
                    // Use the user type to redirect the user to a specific page 
                    $the_route='';
                    if ($userType == '1') {
                        $the_route='user1';
                    } elseif ($userType == '2') {
                        $the_route='user2';
                    } elseif ($userType == '3') {
                        $the_route='user3';
                    } 
                    // Access the authenticated user's information here
                } else { 
                    $the_route='welcome';
                    // Redirect the user to the login page or show an error message
                } 
                // Get the user type from the authenticated user
                    return redirect()->route($the_route);
    
        }
        public function index()
        {
            $users = User::all();
            return view('users.index', compact('users'));
        }
        public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('users.edit', compact('user'));
        }
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);
                $user->user_full_name = $request->input('user_full_name');
                $user->user_mobile = $request->input('user_mobile');
                $user->user_birth_date = $request->input('user_birth_date');
                $user->user_specialty = $request->input('user_specialty');
                $user->user_gender = $request->input('user_gender');
                $user->save();
                return redirect()->route('users.show', $user->id)->with('success', 'User information has been updated successfully!');
        }
        public function create()
        {
            return view('users.create');
        }
        public function show($id)
        {
            $user = User::find($id);
            return view('users.show', compact('user'));
        }
        public function store(Request $request)
        {
            $request->validate([
                'user_full_name'         =>   'required',
                'email'        =>   'required|email|unique:users',
                'password'     =>   'required|min:6',
                'user_type' => 'required'
            ]);

            $user = new User;
            $user->user_full_name = $request->input('user_full_name');
            $user->user_mobile = $request->input('user_mobile');
            $user->clinic_id = $request->input('clinic_id');
            $user->user_type = $request->input('user_type');
            $user->user_birth_date = $request->input('user_birth_date');
            $user->user_gender = $request->input('user_gender');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return view('users.show', compact('user'))->with('success', 'User created successfully.');
        }
        public function destroy($id)
        {
                $user = User::findOrFail($id);
                $user->delete();
    
                return redirect()->route('users.index')->with('success', 'Clinic deleted successfully');
        }

    }
