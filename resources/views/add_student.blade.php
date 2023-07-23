@include('header');

<div class="container mt-3">
  <h2>Add Student</h2>
  <form action="{{ url('/addstudent')}}" method="post" enctype="multipart/form-data">
  @csrf
    @if(session('success'))
     <div class="alert alert-success">
          {{ session('success') }}
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
      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email" required>
    </div>
   <div class="mb-3">
      <label for="image">Contact Number</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter Contact Number" name="mobile"   max="10" min ="10" required>
    </div>
    <div class="mb-3">
      <label for="image">Age</label>
      <input type="number" class="form-control" id="pwd" placeholder="Enter your age" name="age" required>
    </div>
    <div class="mb-3">
      <label for="image">Select Teacher</label>
      <select class="form-select" required name="teacher_id">
        <option>Select Teacher</option>
      @php 
        $teachers = DB::table('teachers')->select('id','name')->get();
      @endphp
            @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="image">Select Gender</label>

        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" checked>Male
          <label class="form-check-label" for="radio1"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio2" name="gender" value="female">Female
          <label class="form-check-label" for="radio2"></label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio2" name="gender" value="other">Other
          <label class="form-check-label"></label>
        </div>
    </div>
    <div class="mb-3">
      <label for="image">Address</label>
       <textarea class="form-control" rows="5" id="comment" name="address_info" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

