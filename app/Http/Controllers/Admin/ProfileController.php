<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    function changepasswordpage(){
        return view('admin.profile.changepassword');
    }
    function changepassword(Request $req){
        $this->check($req);
        $currentpassword=auth()->user()->password;
        if(Hash::check($req->oldpassword,$currentpassword)){
            User::where('id',auth()->user()->id)->update([
                'password'=>Hash::make($req->newpassword)
            ]);
            Alert::success('Password Change','password change successfully');
            return to_route('adminhome');

          /*   Auth::logout();
            $req->session()->invalidate();
            $req->session()->regenerateToken();
        return redirect('/'); */

        }else{
            Alert::error('Password Change','password not match');
            return back();
        }


    }
    //create new admin account
    function createadminpage(){
        return view('admin.adminaccount.create');
    }
    function createadmin(Request $req){
 $this->admincheck($req);
$data=$this->admindata($req);
User::create($data);
Alert::success('Admin Account Create','Admin account create successfully');
return to_route('profile');

    }
    //update profile
    function updateprofile(Request $req){
        $this->procheck($req);
      $data= $this->prodata($req);
      if($req->hasFile('image')){
        //delete old image
        if(Auth::user()->profile!=null){
            if(file_exists(public_path('profile/'.Auth::user()->profile))){
                unlink(public_path('profile/'.Auth::user()->profile));
            }
        }
$filename=uniqid(). $req->file('image')->getClientOriginalName();
$req->file('image')->move(public_path().'/profile/',$filename);
$data['profile']=$filename;
      }else{
$data['profile']=Auth::user()->profile;
      }
      User::where('id',auth()->user()->id)->update($data);
        Alert::success('Profile Update','Profile update successfully');
        return to_route('profile');
    }
    function profile(){

        return view('admin.profile.accountProfile');
    }
    function editprofile(){

        return view('admin.profile.edit');
    }
  //adminlist
  function adminlist(){
   $admin=User::select('id','name','email','address','role','phone','created_at','provider')->whereIn('role',['admin','superadmin'])
   ->when(request('key'),function($query){
    $query->whereAny(['name','email','address','phone','provider'],'like','%'.request('key').'%');
   })->paginate(5);


    return view('admin.adminaccount.list',compact('admin'));
  }
  function deleteadmin($id){
User::where('id',$id)->delete();
Alert::success('Admin Account Delete','Admin account delete successfully');
return back();
  }
  //userlist
  function userlist(){
    $user=User::select('id','name','email','address','role','phone','created_at','provider')->where('role','user')->when(request('userkey'),function($userquery){
        $userquery->whereAny(['name','email','address','phone','provider'],'like','%'.request('userkey').'%');
    })->paginate(5);
    return view('admin.adminaccount.userlist',compact('user'));
  }
  function deleteuser($id){
    User::where('id',$id)->delete();
    Alert::success('User Account Deleted','User account delete successfully');
    return back();
  }

private function check($req){
    $req->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required|min:6',
        'conpassword'=>'required|same:newpassword|min:6',

    ]);
}
private function admincheck($req){
    $req->validate([
        'name' => 'required',
        'email' => 'required|min:6|unique:users,email,'.Auth::user()->id,
        'password'=>'required|min:6',
        'conpassword'=>'required|same:password|min:6',

    ]);
}
private function admindata($req){
    return [
        'name' => $req->name,
        'email' => $req->email,
        'password'=>Hash::make($req->password),
        'role'=>'admin',

    ];
}
private function prodata($req){
    return [
        'name' => $req->name,
        'email' => $req->email,
        'phone'=>$req->phone,
        'address'=>$req->address,

    ];
}
private function procheck($req){
    $req->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,'.Auth::user()->id,
        'phone'=>'required|unique:users,phone,'.Auth::user()->id,
        'image'=>'mimes:png,jpg,jpeg,svg|file'

    ]);
}
}

