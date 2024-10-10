@extends('admin.layouts.master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4 col">
            <div class="card-header py-3">
                <div class="">
                    <div class="">
                        <h6 class="m-0 font-weight-bold text-primary">Account Profile <span
                                class="text-danger">{{ Auth::user()->role }}</span></h6>
                    </div>
                </div>
            </div>
            <form action="{{ route('updateprofile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row ">
                        <div class="col-3">


                            <img src="{{ asset(Auth::user()->profile == null ? 'admin/img/undraw_profile.svg' : 'profile/' . Auth::user()->profile) }}"
                                id="output" alt="" class="img-profile img-thumbnail">
                            <input type="file" name="image"
                                class="form-control mt-1 @error('image') is-invalid @enderror" id="" onchange="loadFile(event)">
                            @error('image')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="m-3">
                                        <label for="name">Name</label>
                                        <input type="text" placeholder="Enter your Name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name"
                                            value="{{ old('name',Auth::user()->name == null ? Auth::user()->nickname : Auth::user()->name) }}"
                                            required>
                                        @error('name')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="m-3">
                                        <label for="email">Email</label>
                                        <input type="text" placeholder="Enter your Email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            id="email" value="{{old('email', Auth::user()->email) }}" required>
                                        @error('email')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>



                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="m-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" placeholder="Enter your Phone"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            id="phone" value="{{old('phone', Auth::user()->phone) }}" required>
                                        @error('phone')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="m-3">
                                        <label for="address">Address</label>
                                        <input type="text" placeholder="Enter your Address"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            id="address" value="{{old('address', Auth::user()->address) }}" required>
                                        @error('address')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>



                            </div>
                            <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>

                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
@endsection
