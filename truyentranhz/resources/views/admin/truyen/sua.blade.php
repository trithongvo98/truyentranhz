 @extends('admin.layout.index')

 @section('content')

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Truyện
                            <small>{{ $truyen->TieuDe }}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/truyen/sua/{{$truyen->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <div class="form-group">
                                <label>Tên Truyện</label>
                                <input class="form-control" name="TieuDe" placeholder="Please Enter Category Name" value="{{ $truyen->TieuDe }}" />
                            </div>
                            {{-- <div class="form-group">
                                <label>Thêm Thể Loại</label>
                                <input class="form-control" name="themtheloai" placeholder="Please Enter Category Name" />
                            </d iv> --}}
                             <div class="form-group">
                                <label>Ảnh Bìa</label>
                                <p>
                                <img width ="400px"src="upload/truyen/{{ $truyen->Hinh }}"/>
                                </p>
                                <input type="file" name="Hinh" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <textarea name="TomTat" id = "demo"class="form-control ckeditor" row="3">
                                    {{$truyen->TomTat}}
                                </textarea>
                            </div>
                                <label>Chapter</label>
                                <div>
                                @foreach($truyen->chapter as $ct)
                                <button type="submit" class="btn btn-default"><a href="admin/chapter/sua/{{ $ct->id }}">{{ $ct->ten }}</a></button>
                                @endforeach 
                            </div>
                                <button type="submit" class="btn btn-default"><a href="admin/chapter/them/{{ $truyen->id }}">Thêm chapter</button>
                            <div class="form-group">
                                <label>Tác Giả</label>
                                <input class="form-control" name="TacGia" placeholder="Please Enter Category Keywords" value="{{ $truyen->TacGia }}" />
                            </div>
                            <div class="form-group">
                                 <label>Truyện Hot</label>
                                 <label class="radio-inline">
                                     <input name="NoiBat" value="1" 
                                     @if($truyen->NoiBat == 0)
                                        {{ "checked" }}
                                     @endif
                                     type="radio">
                                     Hot
                                 </label>
                                 <label class="radio-inline">
                                     <input name="NoiBat" value="0" 
                                    @if($truyen->NoiBat == 1)
                                        {{ "checked" }}
                                    @endif
                                     type="radio">
                                     Không
                                 </label>
                            </div>
                            <button type="submit" class="btn btn-default">Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Comment
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người Dùng</th>
                                <th>Nội Dung</th>
                                <th>Ngày Đăng</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($truyen->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td> {{ $cm->created_at }}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{ $cm->id }}/{{ $truyen->id }}"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection