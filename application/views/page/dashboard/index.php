<body>
    <div class="container">
      <?php foreach($notificacao as $not){?>
        <?php if($user['permissao'] >= $not['destino']){?>
          <div id="<?=$not['idNotificacao']?>" class="alert alert-<?=$not['importancia']?> notificacao_verificar">
            <input type="hidden" class="data_inicial" value="<?=dataConvertView($not['data_inicial'])?>">
            <input type="hidden" class="data_final" value="<?=dataConvertView($not['data_final'])?>">

            <span class="label label-<?=$not['importancia']?>">Notificações</span>
            <h2><?=$not['titulo']?></h2>
            <p><?=$not['descricao']?></p>
            <p><a class="btn btn-primary" onclick="entendi(<?=$not['idNotificacao']?>)" role="button">Entendi</a></p>
        </div>
        <?php }?>
      <?php }?>
      <hr>
    <?php if(isset($agendamentos[0])){?>    
    <div class="container">
        <h2>Últimos agendamentos</h2>
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Local de descarga</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Pacotes</th>
                <th>Status</th>
                <th>Opções</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach($agendamentos as $agenda){
                    $label = "primary";
                    $text  = "Aguardando";
                    if($agenda['status']==1){
                        $label = "success";
                        $text  = "Aceito";
                    }else if($agenda['status']==2){
                        $label = "danger";
                        $text  = "Cancelado";
                    }
                ?>
              <tr>
                <td><a href="<?=base_url()?>agendados/pedidoinfo/<?=$agenda['idAgenda']?>"><?=$agenda['nome']?></a></td>
                <td><?=dataConvertView($agenda['data'])?></td>
                <td><span class="hora_view"><?=$agenda['hora_entrega']?></span></td>
                <td><?=$agenda['nmr_pacotes']?></td>
                <td><span class="label label-<?=$label?>"><?=$text?></span></td>
                <td>
                    <div class="dropdown">
                      <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      Opções
                      <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="<?=base_url()?>perfil/<?=$agenda['codUsuario']?>"> Ver histórico do fornecedor</a></li>
                        <?php if($agenda['status']==0 ){?>
                        <li><a href="<?=base_url()?>agendados/cancela/<?=$agenda['idAgenda']?>"> Cancelar </a></li>   
                        <?php } ?>
                      </ul>
                    </div>
                </td>
              </tr>
              <?php }?>
            </tbody>
        </table>
    </div> <!-- /container -->
    <?php }?>
    <script src="<?=base_url()?>assets/js/notificacao.js"></script>
    <script src="<?=base_url()?>assets/js/converter.js"></script>
    <script>
        adicionaDuasHoras();
    </script>
  </body>
</html>
