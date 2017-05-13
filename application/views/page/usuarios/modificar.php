 <body>
    <div class="container">
    <br>
      <h2>Modificar usuário</h2>
      <br>
      <div class="row col-md-6">
           <?php 
                if($this->session->flashdata('message')){
                    echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
                }
                echo validation_errors("<div class='alert alert-danger'>","</div>");
            ?>
            <?= form_open_multipart('usuarios/alterar/'.$usuario['idUsuario']);?> 

              <div class="form-group">
                <label for="nomeUsuário">Nome do usuário</label>
                <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Dieter Marschall" value="<?= set_value('nomeUsuario'); ?><?=$usuario['nome']?>">
              </div>
              <div class="form-group">
                <label for="Empresa">Empresa</label>
                <input type="text" class="form-control" name="empresa" id="Empresa" placeholder="SerraBras Comércio de Madeiras" value="<?= set_value('empresa'); ?><?=$usuario['empresa']?>">
              </div>
              <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="R. Alfredo Girardi, 570 - Vila Nova" value="<?= set_value('endereco'); ?><?=$usuario['endereco']?>">
              </div>
              <div class="form-group">
                <label for="cidadeEStado">Cidade / Estado</label>
                <input type="text" class="form-control" name="cidadeEstado" id="cidadeEstado" placeholder="Rio Negrinho - SC" value="<?= set_value('cidadeEstado'); ?><?=$usuario['cidadeEstado']?>">
              </div>
              <div class="form-group">
                <label for="tipoUsuario">Tipo de Usuário</label>
                <div class="radio">
                    <?php if($user['permissao']>0){
                      $checar = $usuario['permissao']==1;
                    ?>
                    <label class="radio-inline"><input type="radio" name="tipoUsuario" id="1" value="1" <?php if(isset($checar)){echo "checked";}?>> Administrador</label>
                    <?php }?>
                    <label class="radio-inline"><input type="radio" name="tipoUsuario" id="0" value="0" <?php if(!isset($checar)){echo "checked";}?>> Fornecedor</label>
                </div>
              </div>
              <div class="form-group">
                <label for="emailUsuario">E-mail</label>
                <input type="email" name="email" class="form-control" id="emailUsuario" placeholder="Digite o e-mail principal" value="<?= set_value('email'); ?><?=$usuario['email']?>">
              </div>
              <div class="form-group">
                <label for="Telefone">Telefone</label>
                <input type="phone" name="telefone" class="form-control" id="Telefone" placeholder="(00) 0000-0000" value="<?= set_value('telefone'); ?><?=$usuario['telefone']?>">
              </div>
              <div class="form-group">
                <label for="Senha">Senha</label>
                <input type="password" name="password"class="form-control" id="Senha" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="Senha">Senha</label>
                <input type="password" name="passwordd"class="form-control" id="Senha" placeholder="Password">
              </div>

              <div class="form-group">
                <label for="imagemPrincipal">Imagem perfil</label>
                <input type="file" name="image" id="imagemPrincipal">
                <p class="help-block">São permitidas imagens no formato jpg, jpeg, gif e png.</p>
              </div>

              <button class="btn btn-success" type="submit">Modificar</button> <a class="btn btn-danger" href="<?=base_url()?>usuarios">Cancelar</a>
              <br><br>
            <?= form_close();?>
        </div>
      

    </div><!-- /.container -->
  </body>
