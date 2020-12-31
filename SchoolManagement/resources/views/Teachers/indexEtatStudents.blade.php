@extends('layouts.indexTeacher')

@section('title')
  Exercices
@endsection
@section('content')
@foreach($fichier as $fiche)
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
                          <form accept-charset="UTF-8" action="{{route('EnregistrePresence',$fiche->id)}}" method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align : center">
                                            <th>Eleve</th>
                                            <th>Etat</th>
                                            <th>Etat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($fichier as $fiche)
                                      @foreach($students as $student)
                                      @if($student->Classe_id == $fiche->Classe_id)
                                        <tr style="text-align : center">
                                          <td> <i class="fas fa-file-pdf"></i> FichePresence-{{$fiche->id}}: {{$fiche->created_at->format('D-M-Y')}}</td>
                                          <td><input type="text" name="Students_id" value="{{$student->name}}" disabled=""></td>
                                          <td>
                                            <select name="" id="inputState" class="form-control">
                                              <option value="0">choisie Cours</option>
                                                <option value="Student_Status">Present</option>
                                                <option value="Student_Status">Absent</option>
                                            </select>
                                          </td>

                                        </tr>
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                              <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                        </div>
                    </div>
@endforeach
@endsection
@section('javascript')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>
@endsection
