<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p class="panel-title">Cadastro de local</p>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="nome">Nome do local</label>
						<input id="nome" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="horario_inicio">Horário início</label>
						<select class="form-control" id="horario_inicio">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
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
						</select>
					</div>

					<div class="form-group">
						<label for="horario_final">Horário final</label>
						<select class="form-control" id="horario_final">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
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
						</select>
					</div>
					<button onclick="cadastrar();"class="form-control btn btn-default btn-primary">Cadastrar</button>
				</div>
			</div>
		</div>

		<div class="col-md-8">
			<div class="table-responsive">
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
						<!-- Aqui fica o ajax -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script src="<?=base_url()?>assets/js/locais.js"></script>