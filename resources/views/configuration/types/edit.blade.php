@extends ('principal')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-form">
		<div class="text-center">
		<div class="card uper">
  <div class="card-header">
    Edit Book
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('types.update', $type->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{$type->name}}"/>
          </div>
          <div class="form-group">
              <label for="emai">Email:</label>
              <input type="email" class="form-control" name="email" value="{{$book->email}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update User</button>
      </form>
  </div>
</div>
	</div>
@endsection
