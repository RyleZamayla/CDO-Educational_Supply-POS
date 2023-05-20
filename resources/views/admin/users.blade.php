@extends('layouts.app')

@section('content')

<h1 class="text-center">Admin All Table Products</h1>
<br>


<div class="container">
    <div class="row">
        <div class="col-md-12" style="display:flex">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <form method="POST" action="{{ route('user.toggle', $user->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm {{ $user->enabled ? 'btn-success' : 'btn-danger' }}">
                                            {{ $user->status ? 'Disable' : 'Enable' }}
                                        </button>
                                    </form>
                                </td>
                                {{-- <td><a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="{{ route('products.show', $product->id)}}" class="btn btn-success">View</a></td>
                                <td><a href="{{ route('products.create')}}" class="btn btn-warning">Create</a></td>
                                <td> --}}
                                    {{-- <form action="{{ route('admin.products.delete', $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>


@endsection
