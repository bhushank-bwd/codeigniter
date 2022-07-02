<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

		<title>Check-Box</title>
		<style type="text/css">
			.check-all-head{
				display: flex;
			}
			input#save{
				margin-left: 5px;
			}
			table th:last-child, table tr td:last-child {
				width: 10%;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="p-5 text-center bg-info">
				<h1 class="mb-3">Check Box</h1>
			</div>
			<div class="table-responsive">
				<table class="table table-stripped">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>Name</th>
							<th>Address</th>
							<th>Mob. No.</th>
							<th>
								<div class="check-all-head">
									<input type="checkbox" id='chk-all' class="form-check">
									<input type="button" class="btn btn-sm btn-primary" value="Save" id="save">
								</div>
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Bhushan</td>
							<td>Bapat Camp</td>
							<td>9284654521</td>
							<td><input type='checkbox' class='clcbp' name='cb[]' value='1' ></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Kalpak</td>
							<td>Jadhavwadi</td>
							<td>9011497475</td>
							<td><input type='checkbox' class='clcbp' name='cb[]' value='2' ></td>
						</tr>
						<tr>
							<td>3</td>
							<td>Manish</td>
							<td>Gangavesh</td>
							<td>8237699308</td>
							<td><input type='checkbox' class='clcbp' name='cb[]' value='3' ></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Mangesh</td>
							<td>Mangalvar Peth</td>
							<td>7276311447</td>
							<td><input type='checkbox' class='clcbp' name='cb[]' value='4' ></td>
						</tr>
						<tr>
							<td>5</td>
							<td>Ritesh</td>
							<td>Saravade</td>
							<td>8459154395</td>
							<td><input type='checkbox' class='clcbp' name='cb[]' value='5' ></td>
						</tr>
					</tbody>
				</table>
			</div>	
		</div>
		

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

	</body>
	<script type="text/javascript"> 
		$(document).ready(function(){
			$("#chk-all").change(function(){  
				$(".clcbp").prop('checked', $(this).prop("checked")); 
			});
			$('.clcbp').change(function(){
				if(false == $(this).prop("checked")){ 
					$("#chk-all").prop('checked', false); 
				}

				if ($('.clcbp:checked').length == $('.clcbp').length ){
					$("#chk-all").prop('checked', true);
				}
			});
			$("#save").click(function(){  
				if($('.clcbp:checked').length>0){
					var chkList = [];
					$(".clcbp:checked").each(function(){
						chkList.push(this.value);
					});
					alert(chkList);
				}else{
					alert("Select atleast one");
				}
			});
		});
	</script>
	</html>