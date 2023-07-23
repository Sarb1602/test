@include('header')
<div class="container mt-3">
    @if($students->isEmpty())
        <div class="alert alert-info">
            Student not found.
        </div>
    @else
        <h2>Teacher: {{ $students->first()->teacher->name }}</h2>
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
                        <td>
                            <a href="{{ route('students.edit', ['studentId' => $student->id]) }}">Edit</a>
                            <a href="{{ route('student.delete', ['Id' => $student->id]) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
</body>
</html>
