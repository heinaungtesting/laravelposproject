@extends('admin.layouts.master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="card col-6 offset-3 p-3 shadow-sm ">

                <div class="card-title bg-dark text-white p-3 h5">New Product Create</div>
                <form action="{{route('productcreate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="card-body">
                    <div class="">


                        <img src="{{ asset('masterimage/default.png') }}"
                            id="output" alt="" class="img-profile mb-1 w-100">
                        <input type="file" name="image"
                            class="form-control mt-1 @error('image') is-invalid @enderror" id="" onchange="loadFile(event)">
                        @error('image')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                   </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input value="{{old('name')}}" type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    id="exampleFormControlInput1" placeholder="Enter Name">
                                @error('name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col mb-3">
                                <label  class="form-label">CategoryName</label>
                                <select name="categoryid" id=""  class="form-control @error('categoryid') is-invalid @enderror">
                                    <option value="">Choose Category</option>
                                    @foreach ($category as  $item)
                                      <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>

                                @error('categoryid')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                       <div class="row">
                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Price</label>
                            <input value="{{old('price')}}$" type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                id="exampleFormControlInput1" placeholder="Enter Price">
                            @error('price')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Stock</label>
                            <input value="{{old('password')}}" type="text" name="stock" class="form-control @error('stock') is-invalid @enderror"
                                id="exampleFormControlInput1" placeholder="Enter Stock">
                            @error('stock')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                       </div>

                        <div class="col mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                           <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
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
