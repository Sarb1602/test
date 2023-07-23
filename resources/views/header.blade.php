    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>

    <nav class="navbar navbar-expand-sm bg-light">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/')}}">Add Teacher Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('/addstudent')}}">Add Student Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('/allteacherlist')}}">Show Teacher Record</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url ('/studentlist')}}">Show Student Record</a>
          </li>
        </ul>
      </div>
    </nav>
