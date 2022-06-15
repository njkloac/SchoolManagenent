@extends('layoutAdmin')

@section('content')

<main class="login-form">

<div class="cotainer">

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">Add Student</div>

            <div class="card-body">



            <form action="{{ route('AddPostStudent') }}" method="POST">

@csrf

<div class="form-group row">

    <label for="code" class="col-md-4 col-form-label text-md-right">code</label>

    <div class="col-md-6">

        <input type="text" id="code" class="form-control" name="code" required autofocus>

      

    </div>

</div>
<div class="form-group row">

    <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>

    <div class="col-md-6">

        <input type="text" id="nom" class="form-control" name="nom" required autofocus>

      

    </div>

</div>



<div class="form-group row">

    <label for="prenom" class="col-md-4 col-form-label text-md-right">prenom</label>

    <div class="col-md-6">

        <input type="prenom" id="prenom" class="form-control" name="prenom" required>


    </div>

</div>

<div class="form-group row">

    <label for="niveau" class="col-md-4 col-form-label text-md-right">niveau</label>

    <div class="col-md-6">

        <input type="niveau" id="niveau" class="form-control" name="niveau" required>


    </div>

</div>

<div class="form-group row">

    <label for="code_fil" class="col-md-4 col-form-label text-md-right">code_fil</label>

    <div class="col-md-6">

        <input type="code_fil" id="code_fil" class="form-control" name="code_fil" required>


    </div>

</div>

<div class="form-group row">

    <label for="login" class="col-md-4 col-form-label text-md-right">login</label>

    <div class="col-md-6">

        <input type="login" id="login" class="form-control" name="login" required>


    </div>

</div>

<div class="form-group row">

    <label for="password" class="col-md-4 col-form-label text-md-right">password</label>

    <div class="col-md-6">

        <input type="password" id="password" class="form-control" name="password" required>


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