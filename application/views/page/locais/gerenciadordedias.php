<head>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-datepicker3.min.css">
</head>
<body>
<div class="container">
    <h1>Gerenciar Dias</h1>
    <?php 
        if($this->session->flashdata('message')){
            echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
        }
        if($this->session->flashdata('message-success')){
            echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
        }
        echo validation_errors("<div class='alert alert-danger'>","</div>");
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Gerenciador de Dias</p>
                </div>
                <div class="panel-body">
                    <?= form_open('gerenciadordedias/cadastro')?>
                    <div class="form-group">
                        <label for="">Lugar</label>
                        <select name="lugar" id="" class="form-control">
                            <?php foreach($locais as $locais):?>
                                <option value="<?=$locais['idLocal']?>"><?= $locais['nome']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Motivo</label>
                        <input type="text" class="form-control" placeholder="Porque bloquear/liberar essa data?" name="motivo" value="<?php echo set_value('motivo'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Data</label>
                        <input id="dateval" name="datepicker" readonly class="form-control" placeholder="Defina um data">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Bloquear</strong> <input type="radio" name="tipo" value="bloquear" selected>
                            </div>
                            <div class="col-md-6">
                                <strong>Liberar</strong> <input type="radio" name="tipo" value="liberar">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary form-control">Enviar</button>
                    </div>
                    <?= form_close();?>
                </div>
            </div>
        </div>

        <!--COMEÇO TABELA-->
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Lugar</th>
                            <th>Motivo</th>
                            <th>Data </th>
                            <th>Status</th>
                            <th>Ação</th>
                        </thead>
                        <tbody>
                            <?php foreach($dias as $dias):?>
                            <tr>
                                <td><?= $dias['idDia']?></td>
                                <td><?= $dias['nome']?></td>
                                <td><?= $dias['motivo']?></td>
                                <td><?= dataConvertView($dias['data'])?></td>
                                <td>
                                    <?php if($dias['tipo'] == "liberar"):?>
                                        <div class="label label-success"><?=$dias['tipo']?></div>
                                    <?php else:?>
                                        <div class="label label-warning"><?=$dias['tipo']?></div>
                                    <?php endif ?>
                                </td>
                                <td><a href="<?=base_url()?>gerenciadordedias/deleta/<?=$dias['idDia']?>"><button class="btn btn-danger">deletar</button></a></td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Fechamento ROW cadastro-->
</div>

<script src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script>
     $('#dateval').datepicker({
        startDate: "date",
        language:"pt-BR",
        todayBtn: true,
        todayHighlight: true,
        calendarWeeks: true,
        autoclose: true,
    });
</script>
</body>
</html>