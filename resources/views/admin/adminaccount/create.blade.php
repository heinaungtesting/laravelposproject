@extends('admin.layouts.master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="card col-6 offset-3 p-3 shadow-sm ">
                <div class="d-flex justify-content-end"><a href="{{route('adminlist')}}" class="btn bg-danger w-25 my-3 text-white rounded shadow-sm"><i class="fa-solid fa-users"></i>Admin List</a></div>
                <div class="card-title bg-dark text-white p-3 h5">New Admin Account</div>
                <form action="{{route('createadmin')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="exampleFormControlInput1" placeholder="Enter Name">
                            @error('name')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input value="{{old('email')}}" type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="exampleFormControlInput1" placeholder="Enter Email">
                            @error('email')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input value="{{old('password')}}" type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                                id="exampleFormControlInput1" placeholder="Enter Password">
                            @error('password')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                            <input value="{{old('conpassword')}}" type="text" name="conpassword"
                                class="form-control @error('conpassword') is-invalid @enderror" id="exampleFormControlInput1"
                                placeholder="Enter Confirm Password">
                            @error('conpassword')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="submit"  class="btn btn-primary w-100 rounded shadow-sm" value="Create Account">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
