@include('header');
<div class="container mt-3">
  <h2>Student Record</h2>
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
        <th>Mobile</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $i=1; @endphp
      @foreach($students as $student)
      <tr>
        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $i++ }}</strong></td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->mobile }}</td>
        <td>{{ $student->age }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->address_info }}</td>
        <td><a href="{{ url('/edit_student', $student->id )}}">Edit</a>
            <a href="{{ url('/delete_student', $student->id )}}">Delete</a>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>
   <div class="d-flex justify-content-center">
      {!! $students->links('pagination::bootstrap-5') !!}
    </div>
</div>

</body>
</html>
