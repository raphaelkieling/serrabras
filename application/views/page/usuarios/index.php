<body>
    <div class="container">
    <?php 
        if($this->session->flashdata('message')){
            echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
        }
        if($this->session->flashdata('message-success')){
            echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
        }
        echo validation_errors();
    ?>
      <h2>Usuários cadastrados (<?=$nmrUsuario?>)</h2>
      <p>Confira abaixo a relação de usuários do sistema.</p>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Nome do usuário</th>
            <th>Empresa</th>
            <th>E-mail</th>
            <th>Tipo</th>
            <th>Ação</th>
          </tr>
        </thead>
         
        <tbody>
         <?php
            foreach($usuario as $usuario){
        ?>
         <tr>
            <td><?=$usuario['nome']?></td>
            <td><?=$usuario['empresa']?></td>
            <td><?=$usuario['email']?></td>
            <td><span class="label label-<?php if($usuario['permissao']==0){echo "info";}else{echo "success";}?>">
                <?php if($usuario['permissao']==0){echo "Fornecedor";}else{echo "Administrador";}?>
            </span></td>
            <td>
                <div class="dropdown">
                  <button class="btn btn-default btn-xs dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Opções
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="<?=base_url()?>usuarios/editar/<?=$usuario['idUsuario']?>">Editar</a></li>
                    <li>
                    <?php if($usuario['permissao']==0){?>
                      <a href="<?=base_url()?>perfil/<?= $usuario['idUsuario']?>">Ver histórico do fornecedor</a>
                    <?php }?>
                    </li>
                    <li><a href="<?=base_url()?>usuarios/deleta/<?=$usuario['idUsuario']?>">Remover</a></li>
                  </ul>
                </div>
            </td>
          </tr>
        <?php
            }
         ?>
        </tbody>
      </table>

    </div><!-- /.container -->
</html>
