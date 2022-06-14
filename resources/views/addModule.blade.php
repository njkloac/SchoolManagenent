@extends('layoutAdmin')

@section('content')

<main class="login-form">

<div class="cotainer">

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-header">Add Module</div>

            <div class="card-body">



            <form action="{{ route('AddPostModule') }}" method="POST">

@csrf

<div class="form-group row">

    <label for="code" class="col-md-4 col-form-label text-md-right">code</label>

    <div class="col-md-6">

        <input type="text" id="code" class="form-control" name="code" required autofocus>

      

    </div>

</div>
<div class="form-group row">

    <label for="designation" class="col-md-4 col-form-label text-md-right">designation</label>

    <div class="col-md-6">

        <input type="text" id="designation" class="form-control" name="designation" required autofocus>

      

    </div>

</div>



<div class="form-group row">

    <label for="niveau" class="col-md-4 col-form-label text-md-right">niveau</label>

    <div class="col-md-6">

        <input type="niveau" id="niveau" class="form-control" name="niveau" required>


    </div>

</div>

<div class="form-group row">

    <label for="semestre" class="col-md-4 col-form-label text-md-right">semestre</label>

    <div class="col-md-6">

        <input type="semestre" id="semestre" class="form-control" name="semestre" required>


    </div>

</div>

<div class="form-group row">

    <label for="code_fil" class="col-md-4 col-form-label text-md-right">code_fil</label>

    <div class="col-md-6">

        <input type="code_fil" id="code_fil" class="form-control" name="code_fil" required>


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