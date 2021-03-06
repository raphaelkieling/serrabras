<?php 
    $user = $this->session->userdata('user');
?>
<head>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/agendamento.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datepicker3.min.css">
</head>
<body>
<div class="container">
    <?php 
        if($this->session->flashdata('message')){
            echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
        }
        if($this->session->flashdata('message-success')){
            echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
        }
    ?>
    <h1>Nova entrega</h1>
    <br>
    <div class="row">
        <div class="col-md-12">
            <!--Cadastrante-->
            <?= form_open('/agendamento/cadastro')?>
            <div class="form-group">
                <label for="cadastrante"><span class="glyphicon glyphicon-user"></span> Cadastrante:</label>
                <input name="cadastrante" type="hidden" value="<?=$user['idUsuario']?>">
                <input id="cadastrante" readonly class="form-control" value="<?=$user['email']?>">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!--Definir local-->
                    <div class="form-group">
                        <label for="local"><span class="glyphicon glyphicon-road"></span> Local de descarga:</label>
                        <select onchange='pegaDiasLiberarLocais();' class="form-control" id="local" name="local" required>
                            <option value='null'>Selecione um local</option>
                            <?php 
                                foreach($locais as $locais){
                                    echo "<option data-dias='{$locais['dias']}' data-init='{$locais['horario_inicial']}' data-limite='{$locais['limite']}' value='{$locais['idLocal']}'>{$locais['nome']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Data de entrega em dia-->
                    <div class="form-group">
                        <label for="datepicker"><span class="glyphicon glyphicon-calendar"></span> Data para entrega:</label>
                        <input id="dateval" name="datepicker" onchange="verificaData();" readonly class="form-control" placeholder="Defina um data">
                    </div>
                    <br>
                </div>
            </div>
            <!--Final bloco de duas colunas-->
            <h3>Escolha o melhor horário</h2>
            <input type="hidden" id="hora_form" name="hora" value="">
            <div class="div-horas">
                <!--<div class="hora-aberta">
                    <p class="text-center">5:00-7:00</p>
                </div>-->
            </div>
            <!--Final div horas-->
            <br><br>
            <!--Final dos horários-->
            <h3>Conteúdo da entrega</h3>
            <table id="form" class="form-table-table">
                <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-th-large"></span> Nº de pacotes</th>
                        <th><span class="glyphicon glyphicon-indent-left"></span> Medidas</th>
                        <th><span class="glyphicon glyphicon-wrench"></span> Peças</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <!--Final table-->
            <div class="row">
                <div class="col-md-4">
                    <button type="submit" id="btn-agendar" class="form-control btn btn-default btn-success">Agendar</button>
                </div>
            </div>
            <br>
            <br>
            <?= form_close()?>
        </div>
    </div>
    <!--Final row-->
</div>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="<?=base_url()?>assets/js/converter.js"></script>
<script src="<?=base_url()?>assets/js/agendamento.js"></script>
</body>