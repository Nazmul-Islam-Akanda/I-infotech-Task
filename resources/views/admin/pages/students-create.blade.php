@extends('admin.master')

@section('content')
<!--container start-->
<div class="container">
<h1>Student result entry</h1>

@if($errors->any())
<div class='alert alert-danger' role="alert">
<ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
</diV>
@endif


<form action="{{route('students.store')}}" method='post' enctype="multipart/form-data">
    @csrf

<div class="mb-3">
    <label for="" class="form-label"><b>Name:</b></label>
    <input name="name" placeholder='Enter Name' type="string" class="form-control" id="">
  </div>


<div class="mb-3">
            <label for="" class="form-label"><b>Picture:</b></label>
            <input name="image" placeholder="Enter picture" type="file" class="form-control" id="">
        </div>


  <button type="submit" class="btn btn" style="background-color:#33C65B; color:white" >Submit</button>
</form>


</div>
<!--container end-->
@endsection