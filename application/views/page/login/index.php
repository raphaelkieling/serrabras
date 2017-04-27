<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Serrabras</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/login.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/button.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br>
                <br>
                <br>
                <?php 
                    if($this->session->flashdata('message')){
                        echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
                    }
                    if($this->session->flashdata('message-success')){
                        echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
                    }
                ?>
                <div class="jumbotron">
                    <br>
                    <img class="img-responsive" src="<?=base_url()?>assets/img/logo.png" alt="Logo da Serrabras">
                    <br>
                    <?= form_open('/login');?>
                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Senha">
                        </div>
                        <button class="form-control btn btn-default btn-primary" type="submit"><span style="color:white;">ENTRAR</span></button>
                    <?= form_close();?>

                    <br><br>
                    <span class="glyphicon glyphicon-user"></span> Esqueceu sua senha?
                    <br><br>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div> 
        <!--Final row 1-->
    </div>
    <!--Container-->
</body>
</html>