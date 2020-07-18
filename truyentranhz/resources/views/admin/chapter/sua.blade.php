@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{$chapter->truyen->TieuDe}}
                            <small>{{ $chapter->ten }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                    
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                    @endif
                        <form action="admin/chapter/sua/{{ $chapter->id}}" method="POST">
                            <input type="hidden"name="_token" value="{{ csrf_token()}}"/>
                             <div class="form-group">
                                <label>Tên Chapter</label>
                                <input class="form-control" name="ten" placeholder="Nhập tên chapter" value="{{ $chapter->ten }}"/>
                            </div>
                            <div class="form-group">
                            	<label>Nội Dung Chapter</label>
                            	<textarea name="noidung" id = "demo"class="form-control ckeditor" row="5"/>
                                {{ $chapter->noidung }}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="submit" class="btn btn-default"><a href="admin/chapter/xoa/{{ $chapter->id }}">Xóa
                        </form>
                            
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection