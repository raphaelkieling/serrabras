<body>
    <div class="container">
    <br>
      <h2>Agendamentos (<?=count($pedidos)?>)</h2>
      <p>Confira abaixo o histórico dos seus agendamentos:</p>
      <?php
         if($this->session->flashdata('message')){
              echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
          }
      ?>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Local de descarga</th>
            <th>Fornecedor</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Pacotes</th>
            <th>Status</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php if(isset($pedidos)){?>  
          <?php foreach($pedidos as $pedido){
            $label = "primary";
            $text  = "Aguardando";
            if($pedido['status']==1){
                $label = "success";
                $text  = "Aceito";
            }else if($pedido['status']==2){
                $label = "danger";
                $text  = "Cancelado";
            }
          ?>
          <tr>
            <td><a href="<?=base_url()?>agendados/pedidoinfo/<?=$pedido['idAgenda']?>"><?=$pedido['nome']?></a></td>
            <td><?=$pedido['unome']?></td>
            <td><?=dataConvertView($pedido['data'])?></td>
            <td><?=$pedido['hora_entrega']?></td>
            <td><?=$pedido['nmr_pacotes']?></td>
            <td><span class="label label-<?=$label?>"><?=$text?></span></td>
            <td>
                <div class="dropdown">
                  <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Opções
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <?php if($pedido['status']==0 ){?>
                    <li><a href="<?=base_url()?>agendados/entrege/<?=$pedido['idAgenda']?>">Marcar como entregue</a></li>
                    <?php } ?>
                    <li><a href="<?=base_url()?>perfil/<?=$pedido['codUsuario']?>">Ver histórico do fornecedor</a></li>
                    <?php if($pedido['status']==0 ){?>
                    <li><a href="<?=base_url()?>agendados/cancela/<?=$pedido['idAgenda']?>">Cancelar</a></li>
                    <?php } ?>
                  </ul>
                </div>
            </td>
          </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>

    </div><!-- /.container -->
  </body>
</html>
