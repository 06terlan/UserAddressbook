@extends('base')

@section('container')
	<h1>Users</h1>

	<div class="row">
        @include('error')
    </div>
	
	<form method="get" accept="{{ route('users') }}">
		<table class="table table-bordered table-dark">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">LastName</th>
		      <th scope="col">Mail</th>
		      <th scope="col">Created at</th>
		      <th scope="col">Actions</th>
		    </tr>
		    <tr>
		      <th scope="col"></th>
		      <th scope="col"> <input name="name" class="enter-submit" placeholder="search" value="{{ $request->get('name') }}"> </th>
		      <th scope="col"> <input name="LastName" class="enter-submit" placeholder="search" value="{{ $request->get('LastName') }}"> </th>
		      <th scope="col"> <input name="Mail" class="enter-submit" placeholder="search" value="{{ $request->get('mail') }}"> </th>
		      <th scope="col"> </th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
			    <tr>
			      <th scope="row">{{ $users->perPage() * ($users->currentPage() - 1) + $loop->iteration }}</th>
			      <td>{{ $user->name }}</td>
			      <td>{{ $user->LastName }}</td>
			      <td>{{ $user->mail }}</td>
			      <td>{{ $user->created_at->format("Y-m-d H:i") }}</td>
			      <td> <a href="{{ route('user.info', ['uid'=> $user->uid]) }}" class="btn btn-info">Info</a> </td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>

		@include('pagination', ['paginationData'=> $users])
	</form>
	
@endsection