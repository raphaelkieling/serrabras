<body>
    <div class="container">
''    
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <span class="label label-success">Notificações</span>
        <h2>Mudança no sistema de emissão de notas fiscais</h2>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-primary" href="#" role="button">Entendi</a></p>
      </div>
    </div>
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
                <td><?=$agenda['hora_entrega']?></td>
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
                        <li><a href="<?=base_url()?>agendados/cancela/<?=$agenda['idAgenda']?>/<?=$this->session->userdata('user')['idUsuario']?>"> Cancelar </a></li>   
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
  </body>
</html>
