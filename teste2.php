<html>
<head>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.pt-BR.min.js"></script>

	
	<style>
		.DateField{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 50px;
		}
	</style>

	<script>

		$(document).ready(function(){
			$(".DateField").datepicker({
				multidate:false,
			    format: "dd/mm/yyyy",
			    language: "pt-BR",		
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