@extends('layouts.app')
@section('principale')
   <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="my-4">Résultat de recherche pour:
                <small>{{$key}}</small>
            </h1>
            <!-- @include('_partials.posts-list')
        </div>
        @include('_partials.sidebar')
    </div> -->


<body>
<form method="post" action="http://localhost/laravel/blog/public/findSearch">				
<input type="text" name= "search">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<button>Search Now</button>				
</form>
<?php
if(isset($details)){
	
	?>
	 <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($answers as $answer)
            <tr>
                <td>{{$answer->name}}</td>
                <td>{{$answer->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
	<?php
}
?>
@endsection

