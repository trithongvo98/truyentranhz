@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-9" style="padding-bottom:120px">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden"name="_token"value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label>Slide</label>
                                <input class="form-control" name="Ten" placeholder="Nhập Tên Slide" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh Bìa</label>
                                <input type="file" name="Hinh" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Nội Dung</label>
                                <textarea name="NoiDung" id = "demo"class="form-control ckeditor" row="3"> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Nhập Link" />
                            </div>
                            <button type="submit" class="btn btn-default">Add Slide</button>
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