@include('header');

<div class="container mt-3">
  <h2>Edit Student Detail</h2>
  <form action="{{ url('/update_student',$edit_student->id) }}" method="post"  enctype="multipart/form-data">
  @csrf
     @if (session()->has('message'))
       <div class="alert alert-success">
            <h5>{{ session()->get('message') }}</h5>
       </div>
     @endif
     @if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" value="{{ $edit_student->name }}">
    </div>
    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email" value="{{ $edit_student->email }}">
    </div>
   <div class="mb-3">
      <label for="image">Contact Number</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Contact Number" name="mobile"  value="{{ $edit_student->mobile }}">
    </div>
    <div class="mb-3">
      <label for="image">Age</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter your age" name="age" value="{{ $edit_student->age }}">
    </div>
     <div class="mb-3">
      <label for="image">Select Teacher</label>
        <select class="form-select"  name="teacher_id">
        <option>Select Teacher</option>
      @php 
        $teachers = DB::table('teachers')->select('id','name')->get();
      @endphp
            @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $teacher->id == $edit_student->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
            @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image">Select Gender</label>

        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" @if ($edit_student->gender == 'male') checked @endif >Male
          <label class="form-check-label" for="radio1"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio2" name="gender" value="female" @if( $edit_student->gender == 'female') checked @endif >Female
          <label class="form-check-label" for="radio2"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio2" name="gender" value="others" @if( $edit_student->gender == 'others') checked @endif >Other
          <label class="form-check-label"></label>
        </div>
    </div>
    <div class="mb-3">
      <label for="image">Address</label>
       <textarea class="form-control" rows="5" id="comment" name="address_info">{{ $edit_student->address_info }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>


@include('footer');



