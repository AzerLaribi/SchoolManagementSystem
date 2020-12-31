@extends('layouts.indexTeacher')

@section('title')
  Exercices
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card-body" id="example">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      <div class="card">
        <div class="card-body">
          <form accept-charset="UTF-8" action="{{route('AjoutPresence')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-4 pr-1">
                <div class="form-group">
                  <label for="exampleInputEmail1" required="required">Jour</label>
                  <input type="date" name="Jour"  class="form-control" id="recipient-name">
                </div>
              </div>
              <div class="col-md-4 px-1">
                <div class="form-group">
                  <label for="exampleInputEmail1" required="required">Matiere</label>
                    <select name="Matiere_id" id="inputState" class="form-control">
                      <option value="0">choisie Matiere</option>
                        @foreach($matieres as $matiere)
                          <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="col-md-4 pl-1">
                <div class="form-group">
                  <label for="exampleInputEmail1" required="required">Classe</label>
                    <select name="Classe_id" id="inputState" class="form-control">
                      <option value="0">choisie Matiere</option>
                        @foreach($classes as $classe)
                          <option value="{{$classe->id}}">{{$classe->name}}</option>
                        @endforeach
                    </select>
              </div>
            </div>
          </div>
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
  </div>
</div>
@endsection
@section('javascript')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>
@endsection
