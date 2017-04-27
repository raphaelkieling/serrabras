 <body>
    <div class="container">
    <br>
      <h2>Novo usuário</h2>
      <br>
      <div class="row col-md-6">
           <?php 
                if($this->session->flashdata('message')){
                    echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
                }
                echo validation_errors("<div class='alert alert-danger'>","</div>");
            ?>
            <?= form_open_multipart('/cadastrarinfo');?> 
              <div class="form-group">
                <label for="nomeUsuário">Nome do usuário</label>
                <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" placeholder="Dieter Marschall" value="<?= set_value('nomeUsuario'); ?>">
              </div>
              <div class="form-group">
                <label for="Empresa">Empresa</label>
                <input type="text" class="form-control" name="empresa" id="Empresa" placeholder="SerraBras Comércio de Madeiras" value="<?= set_value('empresa'); ?>">
              </div>
              <div class="form-group">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="endereco" placeholder="R. Alfredo Girardi, 570 - Vila Nova" value="<?= set_value('endereco'); ?>">
              </div>
              <div class="form-group">
                <label for="cidadeEStado">Cidade / Estado</label>
                <input type="text" class="form-control" name="cidadeEstado" id="cidadeEstado" placeholder="Rio Negrinho - SC" value="<?= set_value('cidadeEstado'); ?>">
              </div>
              <div class="form-group">
                <label for="tipoUsuario">Tipo de Usuário</label>
                <div class="radio">
                    <label class="radio-inline"><input type="radio" name="tipoUsuario" id="1" value="1" checked> Administrador</label>
                    <label class="radio-inline"><input type="radio" name="tipoUsuario" id="0" value="0"> Fornecedor</label>
                </div>
              </div>
              <div class="form-group">
                <label for="emailUsuario">E-mail</label>
                <input type="email" name="email" class="form-control" id="emailUsuario" placeholder="Digite o e-mail principal" value="<?= set_value('email'); ?>">
              </div>
              <div class="form-group">
                <label for="Telefone">Telefone</label>
                <input type="phone" name="telefone" class="form-control" id="Telefone" placeholder="(00) 0000-0000" value="<?= set_value('telefone'); ?>">
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
              <button class="btn btn-success" type="submit">Cadastrar</button> <a class="btn btn-danger" href="<?=base_url()?>dashboard">Cancelar</a>
              <br><br>
            <?= form_close();?>
        </div>
      

    </div><!-- /.container -->
  </body>
