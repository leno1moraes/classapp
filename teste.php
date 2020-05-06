<html>
<head>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet"/>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>

	<script>

		$(document).ready(function(){
			$(".DateField").datepicker({
				multidate:false,
			});

			$(".table-condensed tbody").click(function(){
				setTimeout(function(){ $('.abc').val($('.DateField[type=hidden]').val()); }, 1000)


			});


		});

	</script>

</head>
<body>

	<div class="col-md-4 div-margin">
		<div class="DateField" value='' type='text'><input type='hidden' class='DateField' value=''></div>

		<input type='text' class='abc' value='' />
	</div>
</body>
</html>	