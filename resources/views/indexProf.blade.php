@extends('layoutProf')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Niveau</th>
      <th scope="col">code_fil</th>
      <th scope="col">Add Note</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($students as $student)
    <tr>
      <th scope="row">{{$student->id}}</th>
      <td>{{$student->nom}}</td>
      <td>{{$student->prenom}}</td>
      <td>{{$student->niveau}}</td>
      <td>{{$student->code_fil}}</td>
      <td>
        <form action="{{ route('AddNote',$student->code) }}" method="get">
        <!-- <input type="hidden" name="id" value="{{$student->code_fil}}"> -->
        <button type="submit" class="bt btn-primary">Ajouter</button>
    </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection