<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serrabras</title>

    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/header.css" rel="stylesheet" />

    <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/chart.min.js"></script>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
</head>
    <?php
        $user = $this->session->userdata('user');
        $user_permission = 1;
    ?>
<body>
    <nav class="navbar navbar-default navbar-default-header">
        <div class="container">
            <div class="navbar-header">
                <a href="<?=base_url()?>dashboard" class="navbar-brand">
                    <img src="<?=base_url()?>assets/img/logo.png" alt="logo da serrabras" style="max-width:120px;heigth:auto;">
                </a>
                <button type="button" class="navbar-toggle collapsed navbar-btn navbar-right btn-clear" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse-navbar">
                <ul class="nav navbar-nav">
                    <?php if($user['permissao']>=$user_permission){?>
                    <li><a href="<?=base_url()?>dashboard" class=""><span class="glyphicon glyphicon-signal"></span> Dashboard</a></li>
                    <?php } ?>
                    <li><a href="<?=base_url()?>agendamento" class=""><span class="glyphicon glyphicon-calendar"></span> Agendamento</a></li>
                    <?php if($user['permissao']>=$user_permission){?>
                    <li><a href="<?=base_url()?>locais" class=""><span class="glyphicon glyphicon-map-marker"></span> Locais</a></li>
                    <li><a href="#" class=""><span class="glyphicon glyphicon-tree-conifer"></span> Medidas</a></li>
                    <?php } ?>
                    <li><a href="#" class=""><span class="glyphicon glyphicon-bell"></span> Notificações <span class="badge">3</span></a></li>     
                    <?php if($user['permissao']>=$user_permission){?>               
                    <li><a href="#" class=""><span class="glyphicon glyphicon-user"></span> Usuários</a></li>
                    <?php } ?>
                </ul>
                <!--Botão abaixo do usuario-->
                <div class="nav navbar-nav navbar-right">
                    <div class="dropdown">

                        <button class="navbar-btn btn dropdown-toggle btn-clear" type="button" id="dropdownLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img src="<?=base_url()?>assets/img/user_photo/<?=$user['foto_perfil']?>" style="width:30px;height:30px;border-radius:50%;">
                             Olá <b><?=$user['email']?></b>
                        </button>
                        
                        <ul class="dropdown-menu" aria-labelledby="dropdownLogin">
                            <li><a href="#">Configurações de perfil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=base_url()?>login/sair">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>   
            <!-- Collapse -->
        </div>
        <!-- Final container navbar-->
    </nav>
    <!-- Final navbar-->
</body>