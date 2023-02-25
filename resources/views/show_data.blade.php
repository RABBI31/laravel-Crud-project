<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <a href="{{url('/add-data')}}" class="btn btn-primary my-3">Add Data</a>
        @if(Session::has('msg'))
        <p class="alert alert-success">{{ Session::get('msg')}}
        @endif
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action </th>
      </tr>
  </thead>
  <tbody>
    @foreach($showData as $data)
    <tr>
      <td>{{$showData->firstItem()+$loop->index}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->email}}</td>
      <td>
        <a href="{{ url('/edit-data/'.$data->id)}}" class="btn btn-success">Edit</a>
        <a href="{{ url('/delete-data/'.$data->id)}}" onclick= "return confirm('Are you sere for delete')" class="btn btn-danger">Delete</a>

      </td>

      <td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$showData->links()}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>