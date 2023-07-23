@include('header');

<div class="container mt-3">
  <h2>Add Teacher</h2>
  <form action="{{ url('/')}}" method="post" enctype="multipart/form-data">
  @csrf
    @if(session('success'))
     <div class="alert alert-success">
          {{ session('success') }}
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
      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Email" name="email" required>
       @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    </div>
   <div class="mb-3">
      <label for="image">Upload image:</label>
      <input type="file" class="form-control" id="pwd" placeholder="" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

