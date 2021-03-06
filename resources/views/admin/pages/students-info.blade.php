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
      <td style="display: flex">
        <!-- Button trigger modal -->
<button type="button" class="btn btn detail-btn" data-bs-toggle="modal" data-bs-target="#exampleModal{{$key}}" Style="background-color:#36C35B; color:white">
View
</button>
&nbsp;
      <a href="{{ route('students.edit', $student->id)}}" class="btn btn" Style="background-color:#EBB871; color:white">Edit</a>
&nbsp;
      <form action="{{ route('students.destroy', $student->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger"  >Delete</button>
      </form>
      
      

      </td>
    </tr>

    <!-- Modal -->
<div class="modal fade" id="exampleModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Result Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <img src="{{url('/storage/uploads/'.$student->image)}}" width="50px" alt="Student Picture">
      <p>Student Name: {{$student->name}} </p>
      <p>Total Number: {{$student->student_res->sum('achieve_number')}} </p>
      
      @foreach($student->student_res as $student_res)
      <p>{{$student_res->sub->subject_name ?? ""}} {{$student_res->achieve_number}}</p>
      @endforeach
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endforeach
  </tbody>
</table>
{{$students->links('pagination::bootstrap-5')}}




</div>


@endsection