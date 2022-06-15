@extends('layoutStudent')

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">code_eleve</th>
      <th scope="col">code_elm</th>
      <th scope="col">module</th>
      <th scope="col">note</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($notes as $note)
    <tr>
      <th scope="row">{{$note->id}}</th>
      <td>{{$note->nom}}</td>
      <td>{{$note->code_eleve}}</td>
      <td>{{$note->code_elm}}</td>
      <td>{{$note->module}}</td>
      <td>{{$note->note}}</td>

      <td>
        <form action="{{ route('AddNote',$note->code) }}" method="get">
        <!-- <input type="hidden" name="id" value="{{$notes->code_fil}}"> -->
        <button type="submit" class="bt btn-primary">Ajouter</button>
    </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection