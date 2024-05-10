<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
/**
 * CRUD User controller
 */
class CrudUserController extends Controller
{

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
    }

  

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user(); // Lấy thông tin của người dùng đã đăng nhập thành công
            return redirect()->intended('index')->withSuccess('Signed in');
        }
    
        return redirect("login")->withSuccess('Login details are not valid');
    }
    
    /**
     * Registration page
     */
    public function createUser()
    {
        
        return view('crud_user.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        //kiem tra du lieu  dau vao
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);
         //Kiem tra tep tin co truong du lieu avatar hay kh
         if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();//Lay ten mo rong .jpg, .png...
            $filename = time().'.'.$extension;//
            $file->move('avatar/',$filename) ;  
        }

     
        $data = $request->all();

        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'avatar' => $filename ?? NULL,
            // 'avatar' => $avatarName ?? NULL,

        ]);

        return redirect("login");
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['user' => $user]);
    }
    public function readProduct_id_user(Request $request)
    {
        $user_id_post = $request->get('id');
        $user_id = Product::find($user_id_post);
        return view('crud_product.readProduct', ['user_id' => $user_id]);
       
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }





    public function updateUser(Request $request)
    {
        //tim user theo id
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6',
            'phone' => 'required|min:10',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);



       $user = User::find($input['id']);
       $user->name = $input['name'];
       $user->email = $input['email'];
       $user->password = $input['password'];
       $user->phone = $input['phone'];
          //Kiem tra tep tin co truong du lieu avatar hay kh
          if($request->hasFile('avatar')){

            //co file dinh kem trong form update thi tim file cu va xoa di
            //Neu $anhcu ton tai thi xoa no di , neu kh co thi kh xoa
            $anhcu = 'avatar/' . $user->avatar;
            if(File::exists($anhcu)){
                File::delete($anhcu);
            }

            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();//Lay ten mo rong .jpg, .png...
            $filename = time().'.'.$extension;//
            $file->move('avatar/',$filename) ;  //upload len thu muc avatar trong piblic
        }
        $user->avatar = $filename;
        $user->update();

        return redirect("list")->withSuccess('You have signed-in');
    }

  
    public function index()
{
    if (Auth::check()) {
        $productss = Product::all();
        $products = Product::paginate(5); 
        $category = Category::all();
        $user = Auth::user();
        return view('index', compact('user','products','category','productss'));
    } else {
      
    }
}

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
