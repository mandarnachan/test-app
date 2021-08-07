<!DOCTYPE html>
<html>
	<head>
		<title>EDIT POSTS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

		<link rel="stylesheet" type="text/css" href="/assets/bootstrap/dist/css/bootstrap.min.css" />
		
		<script src="/assets/jquery/dist/jquery.min.js"></script>
		<script src="/assets/datatables/jquery.dataTables.min.js"></script>

		
	</head>
	<style type="text/css">
		.panel-heading{
			background-color: #f1eaea;
	    	padding: 10px;
		}
		.pull-right{
			float: right;
		}
		.pagination{
			float: right !important;
		}
		.btn-group, .btn-group-vertical{
			display: block !important;
		}
		.errClass{
			color: red;
			display: none;
		}
	</style>
	<body>
		<?php
			$data = json_decode($data);
		?>
		<div class="container" style="margin-top: 20px;">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-12">
						<h4>EDIT POST</h4>
					</div>
				</div>
			</div>
			<div style="height: 30px;">&nbsp;</div>
			<div class="panel-default">
				<form id="editPostForm" name="editPostForm" role="form" method="POST" autocomplete="off">
					<div class="row form-group">
						<div class="col-md-6">
							<label class="control-label" for="title">
								Title<span style="color: red;">*</span>
							</label>
							<input type="text" class="form-control" name="title" id="title" placeholder="Enter title..." value="<?php echo e($data[0]->title); ?>" />
							<label class="errClass" id="title_err">Please enter valid title</label>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-6">
							<label class="control-label" for="post_body">
								Body<span style="color: red;">*</span>
							</label>
							<textarea class="form-control" id="post_body" name="post_body" cols="20"><?php echo e($data[0]->body); ?></textarea>
							<label class="errClass" id="post_body_err">Please enter valid content</label>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-6">
							<input type="button" name="" class="btn btn-primary" onclick="javascript:savePost();" value="Submit" />
							<input type="button" name="" class="btn btn-default" value="Close" />
						</div>
					</div>
					<input type="hidden" name="pk_id" id="pk_id" value="<?php echo e($id); ?>" />
				</form>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){

			});

			function savePost(){
				var title = $('#title').val();
				var body = $('#post_body').text();

				if (title.trim() == '') {
					$('#title_err').show();
					$('#title').focus();
				}else if(body.trim() == ''){
					$('#post_body_err').show();
					$('#post_body').focus();
				}else{	

					var form = $('#profile_form');
				    var form_data = new FormData(form[0]);
				    
					$.ajax({
				        url: '/posts/save', 
				        dataType: 'text',
				        async:false,
				        cache: false,
				        contentType: false,
				        processData: false,
				        data: form_data,                         
				        type: 'post',
				        success: function(response){
				        	var response = JSON.parse(response);
				        	console.log(response);
				        	if (response != '') {
				        		if (response.status == 'success') {
	        						alert(response.message);
			        				window.location = 'index.php';	
				        		}else{
				        			alert(response.message);
				        		}
				        		
				        	}
				        }
				    });
				}
			}
		</script>
	</body>
</html><?php /**PATH D:\wamp64\www\test-app\resources\views/addPost.blade.php ENDPATH**/ ?>