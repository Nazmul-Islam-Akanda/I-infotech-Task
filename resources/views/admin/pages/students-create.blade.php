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

        
        <div style="margin-top: 20px;">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"><h5>Subject</h5></th>
                            <th scope="col"><h5>Number</h5></th>
                            <th scope="col">
                              <a href="javascript:void();" class="add_button btn btn"  title="add field" style="background-color:#53B5D5">Add More</a>
                            </th>
                          </tr>
                        </thead>
                      </table>
                </div>
                
                <div class="row field_wrapper" style="display: flex;">  </div>
          
<br>

  <button type="submit" class="btn btn" style="background-color:#33C65B; color:white" >Submit</button>
</form>


</div>
<!--container end-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      var max_field = 10; 
      var add_button = $('.add_button'); 
      var field_wrapper = $('.field_wrapper'); 
      var html_field = '<div class="delete row d-flex"><div class="col-2"><select name="subject[]" class="form-control">@foreach ($subjects as $subject) <option value="{{$subject->id}}">{{$subject->subject_name}}</option> @endforeach</select></div>   <div class="col-1"></div> &emsp;&emsp;  <div class="col-2"><input type="number" name="number[]" value=""/></div>         <div class="col-2"></div> &emsp;&emsp;      <div class="col-4"><a href="javascript:void();" class="remove_button btn btn-danger">Delete</a> </div></div> <br><br>'; 
      var x = 1; 
      
      
      $(add_button).click(function(){
          if(x < max_field){ 
              x++;
              $(field_wrapper).append(html_field); 
          }
      });

      
      
      $(field_wrapper).on('click', '.remove_button', function(e){
          e.preventDefault();
          $(this).closest('.delete').remove();
          x--; 
      });
  });
  </script>

@endsection