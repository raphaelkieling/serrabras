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
					<div class="row">
						<div class="col-md-6 col-xs-6">
							<div class="form-group">
								<label for="horario_inicio">Hr Inicial</label>
								<select class="form-control" onchange="criaHoras()" name="horario_inicial" id="horario_inicial">
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">00</option>
								</select>
							</div>
						</div>
						<div class="col-md-1 col-xs-1">
							<label for=""></label>
							<p style="margin-top:10px"><b>:</b></p>
						</div>
						<div class="col-md-4 col-xs-4">
							<div class="form-group">
								<label for="horario_inicio">Minutos</label>
								<select class="form-control" onchange="criaHoras()" name="horario_inicial_minutos" id="horario_inicial_minutos">
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</div>
						</div>
					</div>
					<!-- Fechamento da ROW horario inicial -->
					<div class="row">
						<div class="col-md-12 col-xs-12">
							<div class="form-group">
								<label for="limitador">Limite de blocos de horas</label>
								<div class="row">
									<div class="col-md-3">
										<input type="number" id="limitador_input" class="form-control" onchange="mudaRangeRange();">
									</div>
									<div class="col-md-9">
										<input type="range" onchange="criaHoras();mudaRangeInput();" class="form-control" id="limitador" name="limitador" max="24" value="0">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Fechamento da ROW horario final -->

					<div class="row">
						<div class="col-md-12">
							<div class="horarios-label"></div>
						</div>
					</div>
					<!-- Fechamento da ROW horario final -->

					<div class="row container">
						<br>
						<div class="form-group">
							<label for="semana">Dias da Semana</label>
							<small>Quais os dias de funcionamento?</small>
							<br>
							<input type="checkbox" name="segunda"> Segunda-feira<br>
							<input type="checkbox" name="terca"> Terça-feira<br>
							<input type="checkbox" name="quarta"> Quarta-feira<br>
							<input type="checkbox" name="quinta"> Quinta-feira<br>
							<input type="checkbox" name="sexta"> Sexta-feira<br>
							<input type="checkbox" name="sabado"> Sádado<br>
							<input type="checkbox" name="domingo"> Domingo<br>
						</div>
					</div>
					<button onclick="cadastrar();"class="form-control btn btn-default btn-primary">Cadastrar</button>
					<!-- Botao para cadastrar -->
				</div>
				<?=form_close()?>
			</div>
		</div>
		
		<!-- Começo do painel de visualização dos locais -->
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="table table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th>Id</th>
								<th>Local</th>
								<th>Início</hd>
								<th>Limite de Blocos</th>
								<th>Dias</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($locais as $locais){?>
							<tr>
								<td><?=$locais['idLocal']?></td>
								<td><?=$locais['nome']?></td>
								<td><?=$locais['horario_inicial']?></td>
								<td><?=$locais['limite']?></td>
								<td><?=diasLabel($locais['dias'])?></td>
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
											<select class="form-control" onchange="checaHorasModal();" id="iLocal" name="iLocal">
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
											<select class="form-control" onchange="checaHorasModal();" id="fLocal" name="fLocal">
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