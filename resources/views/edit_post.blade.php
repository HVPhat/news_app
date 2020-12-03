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
            <h1>Chỉnh sửa bài viết</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('post.update',$id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle">Tiêu đề</label>
                    <input type="text" class="form-control" name="tieu_de" id="exampleInputTitle" value="{{ $tieu_de }}" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputTopic">Chủ đề</label>
                    <input type="text" class="form-control" name="chu_de" id="exampleInputTopic" value="{{ $chu_de }}" placeholder="Topic">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputImages">Hình ảnh</label>
                    <div class="custom-file">
                        <input accept="*.png|*.jpg|*.jpeg" type="file" class="custom-file-input" value = "{{ $hinh_anh }} " id="hinh_anh" name="hinh_anh" />
                        <label class=" custom-file-label" for="hinh_anh">Chọn hình</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputContent">Nội dung</label>
                    <textarea type="text" class="form-control" name="noi_dung" id="editor" value="{{ $noi_dung }}" placeholder="Content"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputWriter">Tác giả</label>
                    <input type="text" class="form-control" name="tac_gia" id="exampleInputWriter" value="{{ $tac_gia }}" placeholder="Writer">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
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
<script src="{{ asset('dist/js/build/ckeditor.js') }}"></script>
  
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<script>
        function readURL(input, idImg) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(idImg).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#hinh_anh").change(function () {
            readURL(this, '#imgPro');
        });
  </script>
<script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
            
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo'
                    ]
                },
                language: 'vi',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',
              
            })
            .then(editor => {
                window.editor = editor;
            
      })
      .catch(error => {
          console.error('Oops, something went wrong!');
          console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
          console.warn('Build id: xxscohtgbl7s-8o65j7c6blw0');
          console.error(error);
      });
</script>            
@endsection