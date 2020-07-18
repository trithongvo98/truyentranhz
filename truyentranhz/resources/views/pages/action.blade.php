@extends('layout.index')
@section('content')
	 	<?php 
	    $itemInPage = 5;
	    $items = 1;
		?>
	    <div class="container">
	        <div class="row">
	            <div class="col-md-3 ">
	                <ul class="list-group" id="menu">
	                    <li href="#" class="list-group-item menu1 active"style="background-color:#FE9A2E; color:white;">
	                        Menu
	                    </li>

	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Action</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Adult</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Adventure</a>
	                    </li>

	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Isekai</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Cổ Đại</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">History</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Demon</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Detective</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Drama</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Fantansy</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Harem</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Horror</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Magic</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Oneshot</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">School Life</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Supernatural</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Romance</a>
	                    </li>
	                    <li href="#" class="list-group-item menu1">
	                        <a href="truyen">Slice of Life</a>
	                    </li>
	                </ul>
	            </div>
	            <div class="col-md-9 ">
	                <div class="panel panel-default">
	                    <div class="panel-heading" style="background-color:#FE9A2E; color:white;">
	                        <h4><b>Action</b></h4>
	                    </div>
	                    @foreach($truyen as $tt)
	                    @if($tt->id == 1016||$tt->id==1018||$tt->id==1021||$tt->id==1024||$tt->id==1026||$tt->id==1028 ||$tt->id>1034)
	                    <div class="row-item row div-items hidden" id="div-{{ $items }}">
	                        <div class="col-md-3">
	                            <a href="chitiet/{{ $tt->id }}.html">
	                                <br>
	                                <img width="200px" height="200px" class="img-responsive" src="upload/truyen/{{ $tt->Hinh }}" alt="">
	                            </a>
	                        </div>
	                        <div class="col-md-9">
	                            <h3>{{ $tt->TieuDe }}</h3>
	                            <p><b>Tác Giả :</b>{{ $tt->TacGia }}</p>
	                            <p><b>Giới Thiệu :</b>{{ $tt->TomTat}}</p>
	                            <p><b>Số lượt xem :</b>{{ $tt->SoLuotXem }}</p>
	                            <a class="btn btn-primary" href="chitiet/{{ $tt->id }}.html">Đọc truyện <span class="glyphicon glyphicon-chevron-right"></span></a>
	                        </div>
	                        <div class="break"></div>
	                    </div>
	                    @endif
	                    <?php 
	                        $items += 1; 
	                    ?>
	                    @endforeach
	                    <?php
	                        $numPaging = $items / $itemInPage;
	                    ?>
	                    <div class="row text-center" >
	                        <div class="col-lg-12">
	                            <ul class="pagination">
	                                <li>
	                                    <a style="cursor:pointer;" onclick="prePage()">&laquo;</a>
	                                </li>
	                                <?php
	                                    for($i=1;$i<=$numPaging;$i++){
	                                        echo'
	                                            <li style="cursor:pointer" class="btn-paging" id="btn-paging-'.$i.'">
	                                                <a onclick="paging('.$i.')">'.$i.'</a>
	                                            </li>
	                                        ';
	                                    }
	                                ?>
	                                <li>
	                                    <a style="cursor:pointer" onclick="nextPage()">&raquo;</a>
	                                </li>
	                            </ul>
	                        </div>
	                    </div>

	                </div>
	            </div> 

	        </div>
	    </div>
	    <!--script area-->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	    <script>
	        $("#btn-paging-1").addClass(" active");
	        pageNum = <?php echo $numPaging;?>;
	        currentPage = 1;
	        paging(currentPage);
	        function paging(num){
	            currentPage = num;
	            $(".btn-paging").removeClass(" active");
	            $("#btn-paging-"+num).addClass(" active");
	            $(".div-items").removeClass(" hidden").addClass(" hidden");
	            items = <?php echo $items-1;?>;
	            itemInPage = <?php echo $itemInPage?>;
	            lastItem = num * itemInPage;
	            for(let i=lastItem-itemInPage;i<lastItem;i++){
	                $('#div-'+i).removeClass(" hidden");
	            }
	        }
	        function prePage(){
	            if(currentPage>1){
	                paging(currentPage-1);
	            }
	        }
	        function nextPage(){
	            if(currentPage<pageNum){
	                paging(currentPage+1);
	            }
	        }
	    </script>
		

@endsection