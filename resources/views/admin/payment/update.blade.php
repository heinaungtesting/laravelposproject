@extends('admin.layouts.master')
@section('admin')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Payment List</h1>
        </div>
        <div class="">
            <div class="row">
                <div class="col-4 offset-2">
                    <div class="card">
                        <div class="card-body shadow">
                            <form action="{{ route('edit',$payment->id) }}" method="post" class="p-3 rounded">
                                @csrf
                                <input type="text" class="form-control  @error('account_number') is-invalid @enderror"
                                    name="account_number" id="" placeholder="Enter Account Number..."
                                    value="{{ old('account_number' , $payment->account_number) }}">
                                @error('account_number')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                <input type="text" class="form-control  @error('account_name') is-invalid @enderror"
                                    name="account_name" id="" placeholder="Enter Account Name..."
                                    value="{{ old('account_name' , $payment->account_name) }}">
                                @error('account_name')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                @enderror
                                <select name="type" id="" class="form-control">
                                    <option value="yuucho">yuucho</option>
                                    <option value="paidy">Paidy</option>
                                    <option value="merucari">Merucari</option>
                                </select>
                                <input type="submit" value="Create" class="btn btn-outline-primary mt-3">
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
