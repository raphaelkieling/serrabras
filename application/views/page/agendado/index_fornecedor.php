<body>
    <div class="container">
    <br>
      <h2>Agendamentos (<?=count($agendamentos)?>)</h2>
      <p>Confira abaixo o histórico dos seus agendamentos:</p>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Local de descarga</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Pacotes</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php if(isset($agendamentos)){?>  
          <?php foreach($agendamentos as $agendamento){
            $label = "primary";
            $text  = "Aguardando";
            if($agendamento['status']==1){
                $label = "success";
                $text  = "Aceito";
            }else if($agendamento['status']==2){
                $label = "danger";
                $text  = "Cancelado";
            }
          ?>
          <tr>
            <td><a href="<?=base_url()?>agendados/pedidoinfo/<?=$agendamento['idAgenda']?>"><?=$agendamento['nome']?></a></td>
            <td><?=dataConvertView($agendamento['data'])?></td>
            <td><?=$agendamento['hora_entrega']?></td>
            <td><?=$agendamento['nmr_pacotes']?></td>
            <td><span class="label label-<?=$label?>"><?=$text?></span></td>
            <td>
                <div class="dropdown">
                  <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Opções
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php if($agendamento['status']==0 && $user['permissao']>=1  ){?>
                    <li><a href="<?=base_url()?>agendados/entrege/<?=$agendamento['idAgenda']?>">Marcar como entregue</a></li>
                    <?php } ?>
                    <li><a href="<?=base_url()?>perfil/<?=$agendamento['codUsuario']?>">Ver histórico do fornecedor</a></li>
                    <?php if($agendamento['status']==0 ){?>
                    <li><a href="<?=base_url()?>agendados/cancela/<?=$agendamento['idAgenda']?>">Cancelar</a></li>
                    <?php } ?>
                  </ul>
                </div>
            </td>
          </tr>
          <?php } ?>
          <?php }?> 
        </tbody>
      </table>

    </div><!-- /.container -->
  </body>
</html>
