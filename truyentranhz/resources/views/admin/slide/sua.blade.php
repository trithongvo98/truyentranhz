@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>{{ $slide->Ten }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-9" style="padding-bottom:120px">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                        <form action="admin/slide/sua/{{ $slide->id }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden"name="_token"value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label>Slide</label>
                                <input class="form-control" name="Ten" placeholder="Nhập Tên Slide" value="{{ $slide->Ten }}"/>
                            </div>
                            <div class="form-group">
                                <label>Ảnh Bìa</label>
                                <p>
                                <img width ="400px"src="upload/slide/{{ $slide->Hinh }}"/>
                                </p>
                                <input type="file" name="Hinh" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" id = "demo"class="form-control ckeditor" row="3"> 
                                {{ $slide->NoiDung }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Nhập Link" value="{{ $slide->link }}" />
                            </div>
                            <button type="submit" class="btn btn-default">Edit Slide</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection