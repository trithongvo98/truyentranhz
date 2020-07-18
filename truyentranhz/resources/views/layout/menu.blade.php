<div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="pages/truyen" class="list-group-item menu1 active" style="background-color:#FE9A2E; color:white;">
                    	Menu
                    </li>
					@foreach($theloai as $tl)
                    <li href="" class="list-group-item menu1">
                        <a href="truyen">{{ $tl->Ten }}</a>
                    </li>
					@endforeach
                </ul>
            </div>