@extends('layoutAdmin')

@section('content')

<main class="login-form">

<div class="cotainer">

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">Add Note</div>

            <div class="card-body">



            <form action="{{ route('AddPostProf') }}" method="POST">

@csrf

<div class="form-group row">

    <label for="code_eleve" class="col-md-4 col-form-label text-md-right">code_eleve</label>

    <div class="col-md-6">

        <input type="text" id="code_eleve" class="form-control" name="code_eleve" required autofocus>

      

    </div>

</div>



<div class="form-group row">

    <label for="code_elm" class="col-md-4 col-form-label text-md-right">code_elm</label>

    <div class="col-md-6">

        <input type="code_elm" id="code_elm" class="form-control" name="code_elm" required>


    </div>

</div>



<div class="form-group row">

    <label for="module" class="col-md-4 col-form-label text-md-right">module</label>

    <div class="col-md-6">

        <input type="module" id="module" class="form-control" name="module" required>

  

    </div>

</div>



<div class="form-group row">

    <label for="note" class="col-md-4 col-form-label text-md-right">note</label>

    <div class="col-md-6">

        <input type="note" id="note" class="form-control" name="note" required>

       

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

        Add

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