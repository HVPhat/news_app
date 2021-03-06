@extends('layout')
@section('head')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">User Name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : ''}}" name="name" id="exampleInputPassword1" placeholder="User Name">
                  @if($errors->has('name'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Phone</label>
                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : ''}}" name="phone" id="exampleInputPassword1" placeholder="Phone">
                  @if($errors->has('phone'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('phone') }}</strong>
                      </span>
                  @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : ''}}" name="email" id="exampleInputEmail1" placeholder="Enter email">
                  @if($errors->has('email'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : ''}}" name="password" id="exampleInputPassword1" placeholder="Password">
                  @if($errors->has('password'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="is_admin" value="1" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Admin</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection