-
@extends('admin.layouts.master')
@section('admin')
    <div class="container-fluid">
      
        <div class="">
            <div class="row">
                <div class="col-8 offset-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('changepassword')}}" method="post" class="p-3 rounded">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Old Password</label>
                                <input type="password" name="oldpassword"
                                    class="form-control @error('oldpassword') is-invalid @enderror"
                                     id="exampleFormControlInput1"
                                    placeholder="Enter Old Password">

                                @error('oldpassword')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">New Password</label>
                                <input type="password" name="newpassword"
                                    class="form-control @error('newpassword') is-invalid @enderror"

                                    id="exampleFormControlInput1" placeholder="Enter New Password">
                                @error('newpassword')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                <input type="password" name="conpassword"
                                    class="form-control @error('conpassword') is-invalid @enderror"

                                    id="exampleFormControlInput1" placeholder="Enter Confirm Password">
                                @error('conpassword')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <input type="submit" value="Change" class="btn btn-dark mt-3">
                        </form>
                    </div>
                </div>

                </div>
            </div>
        </div>



    </div>
    </div>
    </div>
@endsection
