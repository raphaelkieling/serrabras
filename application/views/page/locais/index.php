<div class="container">
	<h1>Locais</h1>
	<div class="row">
		<?php 
		if($this->session->flashdata('message')){
			echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
		}
		if($this->session->flashdata('message-success')){
			echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
		}
		echo validation_errors("<div class='alert alert-danger'>","</div>");
		?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p class="panel-title">Cadastro de local</p>
				</div>
				<?= form_open('locais/cadastro')?>
				<div class="panel-body">
					<div class="form-group">
						<label for="nome">Nome do local</label>
						<input name="nome" id="nome" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="horario_inicio">Horário início</label>
						<select class="form-control" onchange="checaHoras();" name="horario_inicial" id="horario_inicio">
							<option value="5">5</option>
							<option value="8">8</option>
							<option value="11">11</option>
							<option value="14">14</option>
							<option value="17">17</option>
							<option value="20">20</option>
							<option value="23">23</option>
						</select>
					</div>

					<div class="form-group">
						<label for="horario_final">Horário final</label>
						<select class="form-control" onchange="checaHoras();" name="horario_final" id="horario_final">
							<option value="5">5</option>
							<option value="8">8</option>
							<option value="11">11</option>
							<option value="14">14</option>
							<option value="17">17</option>
							<option value="20">20</option>
							<option value="23">23</option>
						</select>
					</div>
					<button onclick="cadastrar();"class="form-control btn btn-default btn-primary">Cadastrar</button>
				</div>
				<?=form_close()?>
			</div>
		</div>

		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="table table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Local</th>
								<th>Início</hd>
								<th>Término</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($locais as $locais){?>
							<tr>
								<td><?=$locais['idLocal']?></td>
								<td><?=$locais['nome']?></td>
								<td><?=$locais['horario_inicial']?>:00</td>
								<td><?=$locais['horario_final']?>:00</td>
								<td>
									<button type='button' class='btn btn-warning' data-toggle='modal' data-target='.myModal<?=$locais['idLocal']?>'>Modificar</button> 
									<a href='<?=base_url()?>locais/deleta/<?=$locais['idLocal']?>'class='btn btn-default btn-danger'>Deletar</a>
								</td>
							</tr>

							<div class="modal fade myModal<?=$locais['idLocal']?>" tabindex="-1" role="dialog" aria-labelledby="myModal<?=$locais['idLocal']?>">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="gridSystemModalLabel">Local - <?=$locais['nome']?><span id="modalLocal"></span></h4>
									</div>
									<div class="modal-body">
										<?=form_open('locais/altera')?>
										<div class="form-group">
											<input type="hidden" class="form-control" name="idLocal" id="idLocal" value="<?=$locais['idLocal']?>">
											<label for="nomeLocal">Novo nome do local</label>
											<input type="text" class="form-control" name="nomeLocal" id="nomeLocal" placeholder="<?=$locais['nome']?>" value="<?=$locais['nome']?>">
										</div>

										<div class="form-group">
											<label for="horario_final">Novo início</label>
											<select class="form-control" id="iLocal" name="iLocal">
												<option value=""></option>
												<option value="5">5</option>
												<option value="8">8</option>
												<option value="11">11</option>
												<option value="14">14</option>
												<option value="17">17</option>
												<option value="20">20</option>
												<option value="23">23</option>
											</select>
										</div>

										<div class="form-group">
											<label for="horario_final">Novo final</label>
											<select class="form-control" id="fLocal" name="fLocal">
												<option value=""></option>
												<option value="5">5</option>
												<option value="8">8</option>
												<option value="11">11</option>
												<option value="14">14</option>
												<option value="17">17</option>
												<option value="20">20</option>
												<option value="23">23</option>
											</select>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										<button type="submit" class="btn btn-primary">Alterar</button>
										<?=form_close()?>
									</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

							<?php }?>
						</tbody>
					</table>
				</div>
				<!--Final table-->
			</div>
			<!--Final panel-->
		</div>
		<!--Final coluna md 8-->
	</div>
	<!--Final row-->
</div>
<!--Final contianer-->
<script src="<?=base_url()?>assets/js/locais.js"></script>