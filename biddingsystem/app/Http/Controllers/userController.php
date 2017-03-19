<?php

namespace App\Http\Controllers;

use Adldap\Laravel\Facades\Adldap;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Adldap\AdldapInterface;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    protected $adldap;

    /**
     * Constructor.
     *
     * @param AdldapInterface $adldap
     */
    public function __construct(AdldapInterface $adldap)
    {
        $this->adldap = $adldap;
    }

    /**
     * Displays the all LDAP users.
     *
     * @return \Illuminate\View\View
     */


//user login
    public function login(Request $request)
    {


        if ($request->isMethod('post')) {
            // $ldap = ldap_connect("ldap://172.22.1.70");

            $ldap = @ldap_connect("ldap://asaltech.com", '389')
            or die("Could not connect to LDAP server.");

            if ($ldap) {
                try {
                    $ldaprdn = 'asaltech' . "\\" . $request->input("name");
                    $bind = @ldap_bind($ldap, $ldaprdn, $request->input("pass")) or die ("Error trying to bind: " . ldap_error($ldap));

                    if ($bind) {

                        $currentUserName = User::where('name', $request->input("name"))->value('name');

                        if ($currentUserName != $request->input("name")) {
                            $user = new User();
                            $user->name = $request->input('name');
                            $user->save();
                            echo 'add new user';

                        }
                        Session::put('name', $request->input("name"));


                    }
                    $response=$request->input("name");


                }catch (Exception $e){
                    $response="Error trying to bind: " . ldap_error($ldap);
                }

            }

            return Response::json($response);



        }
        if(!Session::get('name')) {
            return view('users.login');
        }
        else{
            return redirect("api/v1/products/Uindex");
        }
    }


    public function index()
    {
        try{
            $statusCode = 200;
            $response = [
                'users'  => []
            ];

            $users = User::all();

            foreach($users as $user){

                $response['users'][] = [
                    'id' => $user->id,
                    'name' => $user->name,
                ];
            }

        }catch (Exception $e){
            $statusCode = 400;
        }finally{
            return Response::json($response, $statusCode);
        }

    }
//    public function show($id)
//    {
//        try{
//            $user = User::find($id);
//            $statusCode = 200;
//            $response = [ "user" => [
//                'id' => $id,
//                'name' => $user->name,
//
//            ]];
//
//        }catch(Exception $e){
//            $response = [
//                "error" => "user doesn`t exists"
//            ];
//            $statusCode = 404;
//        }finally{
//       //     return Response::json($response, $statusCode);
//        }
//
//    }
    public function destroy($id){

        $user = User::find($id);
        $user->delete();
        $response = ['$user successfully deleted'];
        return Response::json($response, 200);
    }

    public function store(Request $request){

        $user = new User();
        $user->name = $request->input('name');
        $user->save();

        return response(array(
            'error' => false,
            'message' =>'$user created successfully',
        ),200);

    }
    public function update(Request $request,$id){

        $user=User::find($id);
        $user->name = $request->input('name');
        $user->save();

        return response(array(
            'error' => false,
            'message' =>'$user updated successfully',
        ),200);


    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response(array(
            'error' => false,
            'message' =>'$user deleted successfully',
        ),200);
    }





}
