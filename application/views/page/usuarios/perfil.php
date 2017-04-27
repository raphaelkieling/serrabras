<body>
    <div class="container">
    <br>
    <div class="jumbotron pt-0 pb-10">
        <div class="page-header">
            <div class="col-md-10">
                <h1><?=$usuario[0]['nome']?></h1>
            </div>
            <div class="col-md-2 text-right">
                <a class="btn btn-success mt-40" href="#" role="button">Editar perfil</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-2">
            <img class="img-circle" src="<?=base_url()?>assets/img/user_photo/<?=$usuario[0]['foto_perfil']?>" alt="Generic placeholder image" width="120" height="120">
        </div>
        <div class="col-md-10">
            <p>
                <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                <?=$usuario[0]['endereco']?> - <?=$usuario[0]['cidadeEstado']?></p>
            <p>
                <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
                <?=$usuario[0]['telefone']?></p>
            <p>
                <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                <a href="mailto:contato@extraforte.com.br"><?=$usuario[0]['email']?></a></p>
        </div>
        <div class="clearfix"></div>
    </div>
    
      <h2>Agendamentos realizados (7)</h2>
      <br/>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Local de descarga</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Pacotes</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
        <?php if(isset($pedido[0])){?>
        <?php foreach($pedido as $pedido)
          $label = "primary";
          $text  = "Aguardando";
          if($pedido['status']==1){
            $label = "success";
            $text  = "Aceito";
          }else if($pedido['status']==2){
            $label = "danger";
            $text  = "Cancelado";
          }
        {?>
          <tr>
            <td><?=$pedido['idAgenda']?></td>
            <td><a href="#"><?=$pedido['nome']?></a></td>
            <td><?= dataConvertView($pedido['data'])?></td>
            <td><?=$pedido['hora_entrega']?></td>
            <td><?=$pedido['nmr_pacotes']?></td>
            <td><span class="label label-<?=$label?>"><?=$text?></span></td>
            <td>
                <?php if($pedido['status']==0){?>
                <div class="dropdown">
                  <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Opções
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php if($this->session->userdata('user')['permissao']>=1){?>
                    <li><a href="<?=base_url()?>agendados/entrege/<?=$pedido['idAgenda']?>/<?=$usuario[0]['idUsuario']?>">Marcar como entregue</a></li>
                    <?php } ?>
                    <li><a href="<?=base_url()?>/agendados">Cancelar</a></li>
                  </ul>
                </div>
                <?php } ?>
            </td>
          </tr>
          <?php }?>
        <?php }?>
        </tbody>
      </table>

    </div><!-- /.container -->
</html>
