@extends('layoutProf')

@section('content')

<main class="login-form">

<div class="cotainer">

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">Add Student Note</div>

            <div class="card-body">


            <form action="{{ route('AddPostStudentNote') }}" method="POST">

@csrf
<div class="form-group row">

<label for="code" class="col-md-4 col-form-label text-md-right">Module</label>
<input type="hidden" name="code_eleve" >

<div class="col-md-6">

  <select class="custom-select" id="inputGroupSelect01">
  @foreach ($modules as $module)
    <option value="{{$module->id}}">{{$module->designation}}</option>
    
    @endforeach
  </select>

  

</div>

</div>
<div class="form-group row">

<label for="code" class="col-md-4 col-form-label text-md-right">Note</label>

<div class="col-md-6">

    <input type="text" id="code" class="form-control" name="note" required autofocus>

  

</div>

</div>





<div class="form-group row">

    <div class="col-md-6 offset-md-4">

        <div class="checkbox">

            <label>

                <input type="checkbox" name="remember"> Remember Me

            </label>

        </div>

    </div>

</div>



<div class="col-md-6 offset-md-4">

    <button type="submit" class="btn btn-primary">

        Login

    </button>

</div>

</form>

                  

            </div>

        </div>
        </div>

    </div>

</div>

</div>

</main>

@endsection