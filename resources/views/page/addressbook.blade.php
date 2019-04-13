@extends('base')

@section('container')
	<h1>Addressbook</h1>

	<div class="row">
        @include('error')
    </div>
	
	<form method="get" accept="{{ route('users') }}">
		Show duplicate: <input type="checkbox" name="duplicate" {{ $request->get('duplicate')==1?'checked':'' }} value="1" class="change-submit">
		<table class="table table-bordered table-dark">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">LastName</th>
		      <th scope="col">Mail</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Owner</th>
		      <th scope="col">Department</th>
		      <th scope="col">Created at</th>
		    </tr>
		    <tr>
		      <th scope="col"></th>
		      <th scope="col"> <input name="name" class="enter-submit" placeholder="search" value="{{ $request->get('name') }}"> </th>
		      <th scope="col"> <input name="LastName" class="enter-submit" placeholder="search" value="{{ $request->get('LastName') }}"> </th>
		      <th scope="col"> <input name="Mail" class="enter-submit" placeholder="search" value="{{ $request->get('mail') }}"> </th>
		      <th scope="col"> <input name="Phone" class="enter-submit" placeholder="search" value="{{ $request->get('phone') }}"> </th>
		      <th scope="col"> </th>
		      <th scope="col"> <input name="Department" class="enter-submit" placeholder="search" value="{{ $request->get('Department') }}"> </th>
		      <th scope="col"> </th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($addresses as $address)
			    <tr>
			      <th scope="row">{{ $addresses->perPage() * ($addresses->currentPage() - 1) + $loop->iteration }}</th>
			      <td>{{ $address->name }}</td>
			      <td>{{ $address->LastName }}</td>
			      <td>{{ $address->mail }}</td>
			      <td>{{ $address->phone }}</td>
			      <td>{{ $address->getOwnerName() }}</td>
			      <td>{{ $address->Department }}</td>
			      <td>{{ $address->created_at->format("Y-m-d H:i") }}</td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>

		@include('pagination', ['paginationData'=> $addresses])
	</form>
	
@endsection