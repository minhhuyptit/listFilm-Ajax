<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Show Data</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>		
<body>
	<?php
		require_once 'function.php';
	?>
	<div class="container list-quiz">
		<h1 class="page-header">Danh sách phim</h1>

		<div id="show-films">

		</div>

		<div class="row">
			<p class="col-md-2 col-md-offset-5">
				<button type="button" id="btn-show" class="btn btn-primary btn-block" onclick = "javascript:loadData();">
					Xem thêm
				</button>
			</p>
		</div>
		
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var position = 0;
		$(document).ready(function(){
			$('#show-films').load('load-data.php', {'position': position});
		});

		function loadData(){
			$.ajax({
                    'url'       :     'load-data.php',
                    'type'      :     'POST',                  //Loại POST or GET
                    'data'      :     {'position' : position+=4},
                    'success'   :     function(data){
                                            if(data.length > 0){
												$('.film-info:last').after(data);
												$("html, body").animate({ scrollTop: $(document).height() }, 800);
											}else{
												$('#btn-show').hide(500);
											}
                                      }
                });

		}
	</script>
</body>
</html>