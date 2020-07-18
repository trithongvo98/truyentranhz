@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Truyện
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
                        <form action="admin/truyen/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden"name="_token"value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label>Tên Truyện</label>
                                <input class="form-control" name="TieuDe" placeholder="Please Enter Category Name" />
                            </div>
                            <div class="form-group">
                                <label>Ảnh Bìa</label>
                                <input type="file" name="Hinh" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea name="TomTat" id = "demo"class="form-control ckeditor" row="3"> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Tác Giả</label>
                                <input class="form-control" name="TacGia" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                 <label>Truyện Hot</label>
                                 <label class="radio-inline">
                                     <input name="NoiBat" value="1" type="radio">
                                     Hot
                                 </label>
                                 <label class="radio-inline">
                                     <input name="NoiBat" value="2" type="radio">
                                     Không
                                 </label>
                                </div>
                            <button type="submit" class="btn btn-default">Add Truyện Mới</button>
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