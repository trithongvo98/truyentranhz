 @extends('admin.layout.index')

@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Truyện
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu Đề</th>
                                <th>Ảnh Bìa</th>
                                <th>Tóm Tắt</th>
                                <th>Thể Loại</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($truyen as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tt->id}}</td>
                                <td>{{$tt->TieuDe}}
                                <td><img width="100px" src="upload/truyen/{{$tt->Hinh }}" /></td>
                                </td>
                                <td>{{ $tt->TomTat }}</td>
                                <td>
                                    @foreach($theloai as $tl)
                                    @if($tl->id == $tt->id)
                                    <a href="" >{{$tl->tenTheLoai}}</a>
                                    @endif
                                    @endforeach
                                </td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/truyen/themTL/{{ $tt->id }}">Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/truyen/themTL/{{ $tt->id }}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection