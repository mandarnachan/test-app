<!DOCTYPE html>
<html>
<head>
	<title>POSTS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

	<link rel="stylesheet" type="text/css" href="assets/bootstrap/dist/css/bootstrap.min.css" />
	<link href="assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<!-- Responsive datatable examples -->
	<link href="assets/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/datatables/select.dataTables.min.css" rel="stylesheet" type="text/css" />

	<script src="assets/jquery/dist/jquery.min.js"></script>
	<script src="assets/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/datatables/dataTables.bootstrap4.min.js"></script>
    
    <!-- Buttons examples -->
        
    <script src="assets/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/datatables/jszip.min.js"></script>
    <script src="assets/datatables/pdfmake.min.js"></script>
    <script src="assets/datatables/vfs_fonts.js"></script>
    <script src="assets/datatables/buttons.html5.min.js"></script>
    <script src="assets/datatables/buttons.print.min.js"></script>
    <script src="assets/datatables/buttons.colVis.min.js"></script>
    
    <!-- Responsive examples -->
    <script src="assets/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/datatables/responsive.bootstrap4.min.js"></script>
    <script src="assets/datatables/dataTables.select.min.js"></script>

    <script src="js/posts.js"></script>
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
</style>
<body>
	<div class="container" style="margin-top: 20px;">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-12">
					<h4>POSTS</h4>
				</div>
			</div>
		</div>

		<div class="row form-group">&nbsp;</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover" id="entryTbl">
				<thead>
					<tr>
						<th>Sr.No.</th>
						<th>User Id</th>
						<th>Title</th>
						<th>Body No</th>
						<th>Action</th>
					</tr>
				</thead>
			</table>
		</div>
		<div class="row">
            <div class="col-md-6" id="dataTableInfo"></div>
            <div class="col-md-6 pull-right" id="custom_pagination_div"></div>
        </div>
	</div>
</body>
</html><?php /**PATH D:\wamp64\www\test-app\resources\views/index.blade.php ENDPATH**/ ?>