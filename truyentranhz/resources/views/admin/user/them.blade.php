@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">  
                        
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                        @endif
                        <form action="admin/user/them" method="POST">
                            <input type="hidden"name="_token"value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" name="name" placeholder="Nhập tên người dùng" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập địa chỉ email" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type= "password"class="form-control" name="password" placeholder="Nhập mật khẩu " />
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input type= "password"class="form-control" name="passwordAgain" placeholder="Nhập lại mật khẩu " />
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" checked="" type="radio">User
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"  type="radio">Admin
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
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