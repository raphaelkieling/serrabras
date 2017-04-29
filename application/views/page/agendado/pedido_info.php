<head>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/pedido_info.css">
</head>
<body>
    <div class="container">
    <br>
    <div class="jumbotron pt-0 pb-10">
        <div class="container">
            <div class="page-header"><h1><?=$pedidos[0]['nome']?></h1></div>
                <p>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                   <?=$usuario['nome']?>
                </p>

                <p>
                    <span class="glyphicon glyphicon-tree-conifer" aria-hidden="true"></span>
                   <?=$usuario['empresa']?>
                </p>

                <p>
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                    Dia <?=dataConvertView($pedidos[0]['data'])?> – <?=$pedidos[0]['hora_entrega']?>:00 - <?=($pedidos[0]['hora_entrega']+2)?>:00
                </p>
                    
                <p>
                    <?php 
                    if($pedidos[0]['status']==0){
                        $label='primary';
                        $text ='Aguardando';
                    }else if($pedidos[0]['status']==1){
                        $label='success';
                        $text ='Aceita';
                    }else if($pedidos[0]['status']==2){
                        $label='danger';
                        $text ='Cancelada';
                    }
                    ?>

                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp &nbsp<span class="label label-<?=$label?>"><?=$text?></span>
                </p>
                <p>
                    <?php if($user['permissao']!=0){?>
                    <a class="btn btn-success" href="<?=base_url()?>agendados/entrege/<?=$pedidos[0]['codAgenda']?>" role="button">Confirmar entrega</a>
                    <?php }?>
                    <a class="btn btn-danger" href="<?=base_url()?>agendados/cancela/<?=$pedidos[0]['codAgenda']?>" role="button">Cancelar</a> 
                    <a class="btn btn-default" href="<?=base_url()?>perfil/<?= $pedidos[0]['codUsuario']?>" role="button">Ver histórico deste fornecedor</a>
                </p>
            </div>
        </div>
      <h2>Conteúdo da Entrega</h2><br/>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nº de pacotes</th>
            <th>Medidas</th>
            <th>Peças</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($pedidos as $pedido){?>
          <tr>
            <td><?=$pedido['nmr']?></td>
            <td><strong><?=$pedido['qualidade']?></strong> <?=$pedido['espessura']?> - <?=$pedido['largura']?> - <?=$pedido['comprimento']?></td>
            <td><?=$pedido['peca']?></td>
          </tr>  
          <?php } ?>       
        </tbody>
      </table>

    </div><!-- /.container -->
</html>
