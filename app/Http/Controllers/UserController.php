<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\ApiResponser;


Class UserController extends Controller 
{

    use ApiResponser;
    private $request;
    protected $primaryKey = 'numberUser';
    
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    // Get/show users
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
    // Search/show users
    public function searchUser($id)
    { 
        $users = User::where('numberUser', $id) -> first();

        if($users){
            return $this -> successReponse($users);
        }
        {
            return $this -> errorResponse("User does not Exist", Response::HTTP_NOT_FOUND);
        }

    }


    // Add users
    public function addUsers(Request $request )
    {
        
        $rules = [
            $this->validate($request, [
                'userName' => 'required|max:20',
                'password' => 'required|max:20'
            ])
        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    // Update users
    public function uptUser(Request $request, $id) 
    {
        
        $rules = [
            $this->validate($request, [
                'userName' => 'required|max:20',
                'password' => 'required|max:20'
            ])
        ];
    
        $this->validate($request, $rules);
        $user = User::findOrFail($id);
        $user->fill($request->all());
    
        $user->save();

        return $user;
    }

    // Delete user
    public function delUser($id) 
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
    

