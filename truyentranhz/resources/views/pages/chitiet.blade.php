@extends('layout.index')
@section('content')
<?php 
	session_start();
	$username="root";
	$password="";
	$host="localhost";
	$database="truyentranhz";
	$connect=mysqli_connect($host,$username,$password,$database);
	mysqli_set_charset($connect,"utf8");
	if($connect!=true){
		echo"cant connected";
	}
	$sql = "UPDATE `truyen` SET `SoLuotXem`=`SoLuotXem` + 1 WHERE `id` = ".$truyen->id;
	$excute = mysqli_query($connect,$sql);
?>
	<!-- Page Content -->
	    <div class="container">
	        <div class="row">

	            <!-- Blog Post Content Column -->
	            <div class="col-lg-9">

	                <!-- Blog Post -->

	                <!-- Title -->
	                <h1>{{ $truyen->TieuDe }}</h1>

	                <!-- Author -->
	                <p>
	                    by <a href="#">{{ $truyen->TacGia }}</a>
	                </p>
				<div class="col-md-4">
	                <!-- Preview Image -->
	                <img class="img-responsive" src="upload/truyen/{{ $truyen->Hinh }}" width="300px" height="200px"alt="">

	                <!-- Date/Time -->
	                <p><span class="glyphicon glyphicon-time"></span>Updated at :{{ $truyen->updated_at }}</p>
	                <hr>
	             </div>
				<div class="col-md-8">

	                <!-- Post Content -->
	                <b>Tên Truyện : {{ $truyen->TieuDe }}</b><br>
	                <b>Tác Giả : {{ $truyen->TacGia }}</b><br>
	                <b>Số Lượt Xem :</b>{{ $truyen->SoLuotXem }}<br>
	                <b>Tóm Tắt : </b><p class="lead">{{$truyen->TomTat}}</p><br>
	                <b>Chapter : </b><br>
	                @foreach($truyen->chapter as $ct)
	                	<button type="submit" class="btn btn-default"><a href="chapter/{{ $ct->id }}.html">{{ $ct->ten }}</a></button>
					@endforeach
	                <hr>
	            </div>
	            </div>

	            <!-- Blog Sidebar Widgets Column -->
	            <div class="col-md-3">

	                <div class="panel panel-default">
	                    <div class="panel-heading"><b>Truyện Hot</b></div>
	                    <div class="panel-body">
						@foreach($tinnoibat as $tt)
	                        <!-- item -->
	                        <div class="row" style="margin-top: 10px;">
	                            <div class="col-md-5">
	                                <a href="chitiet/{{ $tt->id }}.html">
	                                    <img class="img-responsive" src="upload/truyen/{{ $tt->Hinh }}" alt="">
	                                </a>
	                            </div>
	                            <div class="col-md-7">
	                                <a href="chitiet/{{ $tt->id }}.html"><b>{{ $tt->TieuDe }}</b></a><br>
	                                <p> {{ $tt->TacGia }}</p>                               
	                            </div>
	                            <div class="break"></div>
	                        </div>
	                     @endforeach
	                        <!-- end item -->
	                    </div>
	                </div>
	                
	            </div>

	        </div>
	        <!-- /.row -->
	    </div>
	    <!-- end Page Content -->
@endsection