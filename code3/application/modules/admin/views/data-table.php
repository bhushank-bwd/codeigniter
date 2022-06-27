<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
		<title>CI 3 Data - Table</title>
	</head>
	<style type="text/css">
		.table-responsive::-webkit-scrollbar {
		  height: 5px;               /* width of the entire scrollbar */
		}

		.table-responsive::-webkit-scrollbar-track {
		  background: #171717!important;        /* color of the tracking area */
		}

		.table-responsive::-webkit-scrollbar-thumb {
		  background-color: #acb2b2;    /* color of the scroll thumb */
		  border-radius: 20px;       /* roundness of the scroll thumb */
		  border: 1px solid #999;  /* creates padding around scroll thumb */
		}
	</style>
	<body>

		<div class="container">
			<div class="table-responsive">
				<table class="table table-striped" id="data-table-1">
					<thead>
						<tr>
							<td>Sr No</td>
							<td>Name</td>
							<td>Skill</td>
							<td>Designation</td>
							<td>Address</td>
							<td>Age</td>
						</tr>
					</thead>
				</table>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	</body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#data-table-1').DataTable({
				processing: true,
				serverSide: true,
				ajax: '<?php echo base_url("get-data-table-data") ?>',
				columns: [
				{ "data": "srno"},
				{ "data": "name"},
				{ "data": "skill"},
				{ "data": "designation"},
				{ "data": "address"},
				{ "data": "age"},
				],
			});
		});
	</script>

	</html>