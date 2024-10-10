@extends('admin.layouts.master')
@section('admin')
<div class="container">
    <div class="d-flex justify-content-end ">

        <div class="">
            <form action="{{route('userlist')}}" method="get">
                @csrf
                <div class="input-group">
                    <input type="text" value="{{request('userkey')}}" name="key" id="" class="form-control" placeholder="Enter Search Key...">
                    <button type="submit" class="btn bg-dark text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover shadow-sm">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Created Date</th>
                        <th>Login Platform</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>

                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td>{{ $item['phone'] }}</td>
                            <td>{{ $item['address'] }}</td>
                            <td class=" btn btn-sm bg-danger rounded shadow-sm text-white">{{$item['role']}}</td>

                            <td>{{ $item['created_at']->format('j-F-Y') }}</td>
                            <td>

                                @if($item['provider']=='google')<i class="fa-brands fa-google"></i>@endif
                                @if($item['provider']=='github')<i class="fa-brands fa-github"></i>@endif
                                @if($item['provider']==null)<i class="fa-solid fa-right-to-bracket"></i>@endif
                            </td>
                            <td>

                               <a href="{{ route('deleteuser', $item['id']) }}" class="btn btn-sm btn-outline-danger"><i
                                class="fa-solid fa-trash"></i></a>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
