@extends('base')

@section('container')
	<h1>User Info</h1>

	
	<form>
	  <div class="form-group">
	    <div class="row">
	    	<label class="col-6">Name: </label>
	    	<label class="col-6">{{ $user->name }} </label>
	    </div>
	    <div class="row">
	    	<label class="col-6">LastName: </label>
	    	<label class="col-6">{{ $user->LastName }} </label>
	    </div>
	    <div class="row">
	    	<label class="col-6">Mail: </label>
	    	<label class="col-6">{{ $user->mail }} </label>
	    </div>
	    <div class="row">
	    	<label class="col-6">Created at: </label>
	    	<label class="col-6">{{ $user->created_at }} </label>
	    </div>
	  </div>

	  <div class="form-group">
	  	<h1>User Address book</h1>
	  	<table class="table table-bordered table-dark">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Name</th>
		      <th scope="col">LastName</th>
		      <th scope="col">Mail</th>
		      <th scope="col">Phone</th>
		      <th scope="col">Department</th>
		      <th scope="col">Created at</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($userAddressBook as $address)
			    <tr>
			      <th scope="row">{{ $loop->iteration }}</th>
			      <td>{{ $address->name }}</td>
			      <td>{{ $address->LastName }}</td>
			      <td>{{ $address->mail }}</td>
			      <td>{{ $address->phone }}</td>
			      <td>{{ $address->Department }}</td>
			      <td>{{ $address->created_at->format("Y-m-d H:i") }}</td>
			    </tr>
		    @endforeach
		  </tbody>
		</table>
	  </div>
	</form>
@endsection