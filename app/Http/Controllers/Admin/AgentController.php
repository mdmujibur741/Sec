<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request as FacRequest;
use App\Http\Resources\AgentResource;

class AgentController extends Controller
{
    public function index()
    {
        $filters = FacRequest::only('search','perPage');
      $inputSearch = FacRequest::input('search');
      $perPage = FacRequest::input('perPage') ?: 10;
     

      $agents = AgentResource::collection(User::query()
      ->where('type', 0)->when($inputSearch, function($query, $search){
        $query->where('name','like', "%{$search}%");})->paginate($perPage)->withQueryString());
        
        return Inertia::render('admin/Agent/index', compact('agents','filters'));
    }

    public function create()
    {
        return Inertia::render('admin/Agent/create');
    }

    public function store(Request $request)
    {
         $request->validate([
              'name' => 'required',
              'email' => 'required|email|unique:users',
              'mobile' => 'nullable|max:15|min:10|unique:users',
              'password' => 'required|confirmed|min:6',
         ]);
      
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' =>bcrypt($request->password),
        ]);

        return Redirect::back();
    }

    public function edit($id)
    {
         $user = User::findOrFail($id);
         return Inertia::render('admin/Agent/edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'nullable|max:15|min:10',
            'password' => 'nullable|confirmed|min:6',
       ]);

       $user = User::findOrFail($id);
    
       if($request->password ==null){
        $password = $user->password;
       }else{
         $password = bcrypt($request->password);
       }

       $user->update([
        'name' => $request->name,
        'mobile' => $request->mobile,
        'password' =>$password,
    ]);

    return to_route('admin.agents.index');
    
    }


    public function status($id)
    {
      
          $user = User::findOrFail($id);
          //  return $id;
            if($user->status ===1){
              $user->status = 0;
       }else{
            $user->status = 1;
       }
       $user->save();
       return Redirect::back();
    }
}
