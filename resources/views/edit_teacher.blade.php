@include('header');

<div class="container mt-3">
  <h2>Edit Teacher Detail</h2>
  <form action="{{ url('/update_teacher',$edit_teacher->id) }}" method="post"  enctype="multipart/form-data">
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
      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" value="{{ $edit_teacher->name }}">
    </div>
    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email" value="{{ $edit_teacher->email }}">
    </div>
   <div class="mb-3">
      <label for="image">Upload image:</label>
      <input type="file" class="form-control" id="pwd" placeholder="" name="image" value="{{ $edit_teacher->image }}">
       <img src="/images/{{ $edit_teacher->image }}" width= '50' height='50' name ="image"class="img img-responsive" />
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>


@include('footer');



