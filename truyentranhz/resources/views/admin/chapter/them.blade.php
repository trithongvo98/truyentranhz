@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chapter
                            <small>{{ $truyen->TieuDe }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                    @endif
                        <form action="admin/chapter/them/{{ $truyen->id }}" method="POST">
                            <input type="hidden"name="_token" value="{{ csrf_token()}}"/>
                             <div class="form-group">
                                <label>Tên Chapter</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên chapter" />
                            </div>
                            <div class="form-group">
                            	<label>Nội Dung Chapter</label>
                            	<textarea name="noidung" id = "demo"class="form-control ckeditor" row="5">
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection