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
	$btnNextChapter = "";
	$btnPrevChapter = "";
	$chapterId =  $chapter->id;
	$truyenId = $chapter->truyen->id;
	$sql = "SELECT * FROM `chapter` WHERE `id` > ".$chapterId." and `idtruyen` = ".$truyenId." LIMIT 1;";
	$excute = mysqli_query($connect,$sql);
	if($excute == true && mysqli_num_rows($excute)>0){
		while($temp = mysqli_fetch_assoc($excute)){
			$btnNextChapter = '<a href="chapter/'.$temp['id'].'.html">
								<button>Next chapter</button>
								</a>';
		}
	}
	$sql = "SELECT * FROM `chapter` WHERE `id` < ".$chapterId." and `idtruyen` = ".$truyenId." ORDER BY `chapter`.`id` DESC LIMIT 1;";
	$excute = mysqli_query($connect,$sql);
	if($excute == true && mysqli_num_rows($excute)>0){
		while($temp = mysqli_fetch_assoc($excute)){
			$btnPrevChapter = '<a href="chapter/'.$temp['id'].'.html">
								<button>Previous chapter</button>
								</a>';
		}
	}
?>
		<!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $chapter->truyen->TieuDe }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $chapter->truyen->TacGia }}</a><br>
                    <a href="#">{{ $chapter->ten}}</a>
                </p>
                
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{ $chapter->truyen->updated_at }}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!!$chapter->noidung!!}</p>
				
				<!--btn next or prev chappter-->
				<?php
					echo $btnPrevChapter.$btnNextChapter;
				?>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::user())
                <div class="well">
                    <h4>Comment<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{ $chapter->truyen->id}}" method="POST"role="form">
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <textarea class="form-control" name = "NoiDung"rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>
				@endif
                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($chapter->truyen->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{ $cm->updated_at }}</small>
                        </h4>
                        {{ $cm->NoiDung }}<br>
                    </div>
                </div>
                @endforeach

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
                                <a href="chitiet/{{$tt->id}}.html">
                                    <img class="img-responsive" src="upload/truyen/{{ $tt->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet/{{$tt->id}}.html"><b>{{ $tt->TieuDe }}</b></a>
                            </div>
                            <p>{{ $tt->TacGia }}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

@endsection