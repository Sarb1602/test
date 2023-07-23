@include('header');
<div class="container mt-3">
  <h2>Teacher Record</h2>
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>             -->
  <table class="table table-striped">
      @if(session('success'))
     <div class="alert alert-success">
          {{ session('success') }}
    </div>
    @endif
    
    <thead>
      <tr>
        <th>Sr no.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Action</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1; @endphp
      @foreach($teachers as $teacher)
      <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $i++ }}</strong></td>
        <td>{{ $teacher->name }}</td>
        <td>{{ $teacher->email }}</td>
        <td><img src="/images/{{ $teacher->image }}" alt="" width="50px" height="50px"></td>
        <td><a href="{{ url('/edit_teacher', $teacher->id )}}">Edit</a>
            <a href="{{ url('/delete_teacher', $teacher->id )}}">Delete</a>
        </td>
        <td>
         <a href="{{ route('teacher.students', ['teacherId' => $teacher->id]) }}">View Students</a>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>
   <div class="d-flex justify-content-center">
      {!! $teachers->links('pagination::bootstrap-5') !!}
    </div>
</div>

</body>
</html>
