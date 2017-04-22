<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br>
                <br>
                <br>
                <?php 
                    if($this->session->flashdata('message')){
                        echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
                    }
                    echo validation_errors("<div class='alert alert-danger'>","</div>");
                ?>
                <div class="jumbotron">
                    <br>
                    <img class="img-responsive" src="<?=base_url()?>assets/img/logo.png" alt="Logo da Serrabras">
                    <br>
                    <?= form_open_multipart('/cadastrarinfo');?>
                        <div class="form-group">
                            <label for="image"> Selecione sua foto</label>
                            <span class="btn btn-default btn-file form-control" style="padding:5px;overflow:hidden;">
                                <input type="file" name="image">
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="email"> Email que será usado:</label>
                            <input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo set_value('email');?>">
                        </div>
                        <div class="form-group">
                            <label for="password"> Senha</label>
                            <input class="form-control" type="password" name="password" placeholder="Senha" value="<?php echo set_value('password');?>">
                            <label for="passwordd"> Repetir a senha</label>
                            <input class="form-control" type="password" name="passwordd" placeholder="Digite novamente para confirmar" value="<?php echo set_value('passwordd');?>">
                        </div>
                        <button class="form-control btn btn-default btn-primary" type="submit"><span style="color:white;">CADASTRAR-SE</span></button>
                        <a href="<?=base_url()?>" class="btn btn-default form-control" style="margin-top:5px;">VOLTAR</a>
                        <br><br>
                    <?= form_close();?>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div> 
        <!--Final row 1-->
    </div>
    <!--Container-->
</body>
</html>