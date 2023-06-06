<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request as FacRequest;
use Inertia\Inertia;
use App\Http\Resources\AgentResource;


class AdminListController extends Controller
{
    public function index()
    {
        $filters = FacRequest::only('search','perPage');
      $inputSearch = FacRequest::input('search');
      $perPage = FacRequest::input('perPage') ?: 10;
     

      $admins = AgentResource::collection(User::query()
      ->where('type', 1)->when($inputSearch, function($query, $search){
        $query->where('name','like', "%{$search}%");})->paginate($perPage)->withQueryString());
        
        return Inertia::render('admin/adminList/index', compact('admins','filters'));
    }

    public function create()
    {
        return Inertia::render('admin/adminList/create');
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
            'type' => 1,
        ]);

        return Redirect::back();
    }

    public function edit($id)
    {
         $admin = User::findOrFail($id);
         return Inertia::render('admin/adminList/edit', compact('admin'));
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

    return to_route('admin.lists.index');
    
    }


    public function destroy($id)
    {
        $admin = User::findOrFail($id)->delete();
        return Redirect::back();
    }
}
