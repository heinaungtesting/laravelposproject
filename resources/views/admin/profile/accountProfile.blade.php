@extends('admin.layouts.master')
@section('admin')

<div class="container-fluid">
<div class="card shadow mb-4 col">
    <div class="card-header py-3">
        <div class="">
            <div class="">
                <h6 class="m-0 font-weight-bold text-primary">Account Information</h6>
            </div>
        </div>
    </div>
    <form action="">
@csrf
<div class="card-body">
    <div class="row col-10 offset-1">
        <div class="col-3">
            <img src="{{asset(Auth::user()->profile==null ? 'admin/img/undraw_profile.svg': 'profile/'.Auth::user()->profile)}}" id="output" alt="" class="img-profile img-thumbnail">
        </div>
        <div class="col">
            <div class="row mt-3">
                <div class="col-2 h5">Name :</div>
                <div class="col h5">{{Auth::user()->name==null ? Auth::user()->nickname: Auth::user()->name}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-2 h5">Email :</div>
                <div class="col h5">{{Auth::user()->email}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-2 h5">Phone :</div>
                <div class="col h5">{{Auth::user()->phone}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-2 h5">Addr :</div>
                <div class="col h5">{{Auth::user()->address}}</div>
            </div>
            <div class="row mt-3">
                <div class="col-2 h5">role :</div>
                <div class="col h5 text-danger">{{Auth::user()->role}}</div>

            </div>
            <a href="{{route('changepasswordpage')}}" class="btn bg-dark text-white btn-sm mt-3 rounded shadow-sm">ChangePassword</a>
            <a href="{{route('editprofile')}}" class="btn bg-primary text-white btn-sm mt-3 rounded shadow-sm">UpdateProfile</a>
        </div>
    </div>
</div>

    </form>
</div>

</div>
@endsection
