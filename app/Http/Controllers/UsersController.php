<?php



namespace App\Http\Controllers;

use App\Profile_model;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;    
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    public function index(){
        return view('users.login_register');    
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            /*echo "<pre>"; print_r($data); die;*/
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                $userStatus = User::where('email',$data['email'])->first();
                if($userStatus->status == 0){
                    return redirect()->back()->with('flash_message_error','Your account is not activated! Please confirm your email to activate.');    
                }
                Session::put('frontSession',$data['email']);

                if(!empty(Session::get('session_id'))){
                    $session_id = Session::get('session_id');
                    DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                }

                return redirect('/viewcart');
            }else{
                return redirect()->back()->with('flash_message_error','Invalid Username or Password!');
            }
        }
    }

    public function register(Request $request){
       $this->validate($request,[
         'name'=>'required|string|max:255',
         'email'=>'required|string|email|unique:users,email',
         'password'=>'required|min:6|confirmed',
     ]);
       if($request->isMethod('post')){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
            // Check if User already exists
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
            return redirect()->back()->with('flash_message_error','Email already exists!');
        }else{

            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

                /*// Send Register Email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name']];
                Mail::send('emails.register',$messageData,function($message) use($email){
                    $message->to($email)->subject('Registration with E-com Website');
                });*/

                // Send Confirmation Email
                $email = $data['email'];
                $messageData = ['email'=>$data['email'],'name'=>$data['name'],'code'=>base64_encode($data['email'])];
                Mail::send('emails.confirmation',$messageData,function($message) use($email){
                    $message->to($email)->subject('Confirm your E-com Account');
                });

                return redirect()->back()->with('flash_message_success','Please confirm your email to activate your account!');

                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                    Session::put('frontSession',$data['email']);

                    if(!empty(Session::get('session_id'))){
                        $session_id = Session::get('session_id');
                        DB::table('cart')->where('session_id',$session_id)->update(['user_email' => $data['email']]);
                    }

                    return redirect('/viewcart');
                }
            }   
        }
    }

    public function confirmAccount($email){
        $email = base64_decode($email);
        $userCount = User::where('email',$email)->count();
        if($userCount > 0){
            $userDetails = User::where('email',$email)->first();
            if($userDetails->status == 1){
                return redirect('login_page')->with('flash_message_success','Your Email account is already activated. You can login now.');
            }else{
                User::where('email',$email)->update(['status'=>1]);

                // Send Welcome Email
                $messageData = ['email'=>$email,'name'=>$userDetails->name];
                Mail::send('emails.welcome',$messageData,function($message) use($email){
                    $message->to($email)->subject('Welcome to E-com Website');
                });

                return redirect('login_page')->with('flash_message_success','Your Email account is activated. You can login now.');
            }
        }else{
            abort(404);
        }
    }

    public function account(){
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('users.account',compact('countries','user_login'));
    }
    public function updateprofile(Request $request,$id){
        $this->validate($request,[
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'mobile'=>'required',
        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update(['name'=>$input_data['name'],
            'address'=>$input_data['address'],
            'city'=>$input_data['city'],
            'state'=>$input_data['state'],
            'country'=>$input_data['country'],
            'pincode'=>$input_data['pincode'],
            'mobile'=>$input_data['mobile']]);
        return back()->with('message','Update Profile already!');

    }
    public function chkUserPassword(Request $request){
        $data = $request->all();
        /*echo "<pre>"; print_r($data); die;*/
        $current_password = $data['current_pwd'];
        $user_id = Auth::User()->id;
        $check_password = User::where('id',$user_id)->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo "false"; die;
        }
    }

    public function updatepassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $data=$request->all();
        if(Hash::check($data['password'],$oldPassword->password)){
            $this->validate($request,[
             'newPassword'=>'required|min:6|max:12|confirmed'
         ]);
            $new_pass=Hash::make($data['newPassword']);
            User::where('id',$id)->update(['password'=>$new_pass]);
            return back()->with('message','Update Password Success!');
        }else{
            return back()->with('oldpassword','Old Password is Inconrrect!');
        }
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('session_id');
        return redirect('/');
    }

    public function checkEmail(Request $request){
        // Check if User already exists
        $data = $request->all();
        $usersCount = User::where('email',$data['email'])->count();
        if($usersCount>0){
            echo "false";
        }else{
            echo "true"; die;
        }       
    }

    public function viewUsers(){
        $users = User::get();
        return view('backEnd.users.view_users')->with(compact('users'));
    }
}
