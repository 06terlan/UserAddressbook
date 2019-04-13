@if ($errors->any())
   <div class="col-md-12">
       <div class="alert alert-danger" role="alert">
           <button class="close" data-dismiss="alert"></button>
           @foreach ($errors->all() as $error)
               <strong>{{ $error }}</strong><br/>
           @endforeach
       </div>
   </div>
@endif