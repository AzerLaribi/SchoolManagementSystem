@extends('layouts.indexTeacher')

@section('title')
  Cours
@endsection
@section('style')
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card-body" id="example">
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
            <button type="submit" class="btn btn-primary float-right">Submit</button>
          </form>
        </div>
      </div>
      </div>

      </div>
  </div>
</div>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Fiches de Présences</h6>
                        </div>
                        <div class="card-body">
                          @if (session('status'))
                              <div class="alert alert-success">
                                  {{ session('status') }}
                              </div>
                          @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align : center">
                                            <th>Fiche</th>
                                            <th>Matiere</th>
                                            <th>Date</th>
                                            <th>Présence</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($fichier as $fiche)
                                      @foreach($teachers as $teacher)
                                      @foreach($matieres as $matiere)
                                      @if($teacher->id == $fiche->Teacher_id && $matiere->id == $fiche->Matiere_id)
                                        <tr style="text-align : center">
                                          <td> <i class="fas fa-file-pdf"></i> FichePresence({{$fiche->id}})-{{$matiere->name}}: {{$fiche->created_at->format('D-M-Y')}}</td>
                                          <td>{{$matiere->name}}</td>
                                          <td>{{$fiche->created_at}}</td>
                                          <td><a class="btn btn-primary float-center" href="{{route('MarquerPresence',$fiche->id)}}" role="button" target="_blank">Présences</a></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
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
