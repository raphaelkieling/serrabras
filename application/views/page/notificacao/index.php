<head>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datepicker3.min.css">
</head>
<body>
<div class="container">
    <h1><span class="glyphicon glyphicon-bell"></span> Notificações</h1>
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
        <?= form_open('notificacao/cadastrar')?>
        <div class="col-md-6">
            <h4>Informações da notificação</h4>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" placeholder="Sobre o que é a notificação?">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Destino das notificações</label>
                        <select class="form-control" name="destino">
                            <option value="0">Fornecedores e administradores</option>
                            <option value="1">Somente para admistradores</option>                          
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Importância</label>
                        <select class="form-control" name="importancia">
                            <option value="warning">Atenção</option>
                            <option value="danger">Perigo</option>
                            <option value="success">Sucesso</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--final row importancia-->
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_inicio"><span class="glyphicon glyphicon-calendar"></span> Data inicial:</label>
                        <input name="data_inicial" id="data_inicio" onchange="comparaData();" readonly class="form-control dateval" placeholder="Defina um data">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_final"><span class="glyphicon glyphicon-calendar"></span> Data final:</label>
                        <input name="data_final" id="data_final" onchange="comparaData();" readonly class="form-control dateval" placeholder="Defina um data">
                    </div>
                </div>
            </div>
            <!--Final row datas-->
            <br><br>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h4>Conteúdo da notificação</h4>
                <label for="data_final"><span class=" glyphicon glyphicon-pencil"></span> Conteúdo da notificação</label>
                <textarea name="descricao" class="form-control" rows="5" cols="2">Ex: Faturas foram modificadas</textarea>
            </div>
            <button type="submit" class="btn btn-primary form-control">Notificar</button>
        <?=form_close()?>
        </div>
    </div>
    <!--Final row principal-->
</div>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Destino</th>
            <th>Descrição</th>
            <th>D.Inicial</th>
            <th>D.Final</th>
            <th>Ação</th>
        </tr>
        <?php foreach($notificacao as $not){?>
        <tr class="notificacao_verificar">
            <td><?=$not['idNotificacao']?></td>
            <td><?=$not['titulo']?></td>
            <td><?=$not['destino']?></td>
            <td><?=$not['descricao']?></td>
            <td class="data_inicial"><?=dataConvertView($not['data_inicial'])?></td>
            <td class="data_final"><?=dataConvertView($not['data_final'])?></td>
            <td><a href="<?=base_url()?>notificacao/cancelar/<?=$not['idNotificacao']?>" class="btn btn-danger">Cancelar</a></td>
        </tr>
        <?php }?>
    </table>
</div>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="<?=base_url()?>assets/js/notificacao.js"></script>
<script>
    $('.dateval').datepicker({
        language:"pt-BR",
        todayBtn: true,
        todayHighlight: true,
        calendarWeeks: true,
        autoclose: true
    });
</script>