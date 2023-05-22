<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login( Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' =>'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            // this function called from Helpers/function.php file
            return send_error('Validation Error', $validator->errors(), 422);
        }

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
                
                $user = Auth::user();
                $data ['name'] = $user->name;
                $data ['access_token'] = $user->createToken('accessToken')->accessToken;
            
                return send_response('Login success', $data);
        }else{
            return send_error('Invalid Credentials', [], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
        ]);

        if($validator->fails()){
            // return response()->json([
            //     'message' => 'Validation Error',
            //     'errors' => $validator->errors()
            // ], 422 );

            // this function called from Helpers/function.php file

            return send_error('Validation Error', $validator->errors(), 422);
        }


        try{

           

            // create token for laravel passport 
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken('accessToken')->accessToken;

            // return response()->json([
            //     'status' => true,
            //     'message' => 'Registration success',
            //     'user' => $user,
            //     'token' => $token
            // ]);
            $data = [
                'user' => $user,
                'token' => $token
            ];
            return send_response('Registration success',$data);


        }catch (Exception $e){

            return send_error($e->getMessage(), $e->getCode());
        }

        return $request->all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request){

        $data=[
            'status' => true,
            'message' => 'Logout success'
        ];

        
        return send_response('Logout success',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return send_response("Success" , $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
