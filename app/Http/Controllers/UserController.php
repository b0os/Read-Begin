<?php
namespace App\Http\Controllers;

use App\Mail\RegMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'          =>  'required|string|max:80',
            'email'         =>  'required|email|unique:users_data,email',
            'photo'         =>  'required|image|mimes:jpg,png,jpeg,gif,svg',
            'user_name'     => 'required|unique:users_data|alpha_dash|min:3|max:20' ,
            'birthdate'     => 'required|date|before_or_equal:today',
            'phone'         => ['required', 'regex:/^(?:\+?20|0)?1[0125]\d{8}$/'],
            'address'       => 'required|',
            'password'      => ['required', 'string', 'min:8', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'],
            'confirmpassword' => ['required', 'string', 'same:password']


        ]);


        $file_name = request()->file('photo')->getClientOriginalName();

        request()->photo->move(public_path('images'), $file_name);

        $user = new User;

        $user->user_name = $request->user_name;
        $user->email = $request->email;
        $user->user_image = $file_name;
        $user->phone = $request->phone;
        $user->full_name = $request->fullname;
        $user->birthdate = $request->birthdate;
        $user->address = $request->address;
        // Hash password before save it to db (one way hash)... use Hash::check() for password verification
        $user->password = Hash::make($request->password);


        // Sending mail with new user registration
        Mail::to('admin_mail@example.com')->send(new RegMail());

        $user->save();

        return redirect()->route('users.create')->with('success', 'User Added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
