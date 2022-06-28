<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sweet Alerts</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<button type="button" class="btn btn-success" id="button_1">Simple</button>
		<button type="button" class="btn btn-success" id="button_2">Confirm</button>
	</div>

	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
	<script src="<?= base_url("assets/js/") ?>sweetalert.min.js"></script>
</body>
<script type="text/javascript">
	$("#button_1").click(function(){
		// swal("Good job!", "You clicked the button!", "success");
		// swal("Oh Sorry!", "You clicked the button!", "error");
		swal("Oh Sorry!", "You clicked the button!", "warning");
	});
	$("#button_2").click(function(){
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				swal("Yes", {
					icon: "success",
				});
			} else {
				swal("No!");
			}
		});
	});
</script>
</html>