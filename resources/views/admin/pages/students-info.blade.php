@extends('admin.master')

@section('content')

<div class='container'>
<br>

<a href="{{route('students.create')}}" class="btn btn-primary">Add New</a>



<table class="table table-bordered table-striped">
  <thead>
    <tr style='background-color:#00ffff'>
      <th scope="col">Sl</th>
      <th scope="col">Image</th>
      <th scope="col">Student Name</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
   @foreach($students as $key=>$student)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td> <img src="{{url('/storage/uploads/'.$student->image)}}" width="50px" alt="Student Picture"> </td>
      <td>{{$student->name}}</td>
      <td>{{$student->student_res->sum('achieve_number')}}</td>
      <td>
      <a href="" class="btn btn" Style="background-color:#36C35B; color:white">View</a>
      <a href="" class="btn btn" Style="background-color:#EBB871; color:white">Edit</a>
      <a href="" class="btn btn" Style="background-color:#DF3B47; color:white">Delete</a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
{{$students->links('pagination::bootstrap-5')}}
</div>

@endsection