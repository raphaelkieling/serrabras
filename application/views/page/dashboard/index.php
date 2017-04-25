<head>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/dashboard.css">
</head>
<body>
	<div class="container">
		<h1>Dashboard</h1>
		<div class="alert alert-warning">
			<b>Dashboard</b> sendo implementada...
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<canvas class="agendamento"></canvas>
					</div>
				</div>
				<!--Fim painel-->
			</div>
			<!--Col md 4-->
		</div>
		<!--Fim row-->
	</div>
	<!--Fim container-->

	<script src="<?=base_url()?>assets/js/Chart.js"></script>
	<script>
		dashboard();

		function dashboard(){
			$.ajax({
				url:'dashboard/analises',
				success:function(data){
					var localidade = [];
					var horario    = [];

					for(var index=0;index<data['data_hr'].length;index++){
						localidade.push(data['data_hr'][index]['nome']);
						horario.push(data['data_hr'][index]['hora_entrega']);				
					}
					var data={
						labels:localidade,
						datasets:[{
							label:'Análise de Horários',
							data:horario
						}]
					}			
					var ctx = $('.agendamento');
					var contexto = new Chart(ctx,{
						type:'line',
						data:data,
						backgroundColor: "rgba(75,192,192,0.4)",
						
					});
				}//final success
			})
		}

	</script>
</body>
