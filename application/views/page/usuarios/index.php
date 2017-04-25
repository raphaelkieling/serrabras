<div class="container">
    <h1>Usuários</h1>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php 
                if($this->session->flashdata('message')){
                    echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
                }
                if($this->session->flashdata('message-success')){
                    echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
                }
                echo validation_errors();
            ?>
            <div class="table-responsive">
                <table class="table table-stripped">
                    <thead>
                        <th># Id</th>
                        <th>E-mail</th>
                        <th>Senha</th>
                        <th>Permissão</th>
                        <th></th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div class="modal fade" tabindex="-1" role="dialog" id="mysmall" aria-labelledby="mysmall">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p class="modal-title">Editar item <span class='modal-item-id'></span></p>
                            </div>
                            <div class="modal-body">
                                <?= form_open('usuarios/editar');?>
                                <div class="form-group">
                                    <label for="id">Id</label>
                                    <input type="text" name="idUsuario" class="modal-item-id form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" class="modal-item-email form-control" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="text" name="senha" class="modal-item-senha form-control" placeholder="Coloque outra senha">
                                </div>

                                <div class="form-group">
                                    <label for="senhan">Repita a senha</label>
                                    <input type="text" name="senhan" class="modal-item-senha form-control" placeholder="Repita a senha">
                                </div>

                                <div class="form-group">
                                    <label for="permissao">Permissão</label>
                                    <select name="permissao" class="modal-item-permissao form-control">
                                        <option value="0">Fornecedor</option>
                                        <option value="1">Administrador</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <br>
                                        <button type="submit" class="btn btn-danger btn-primary form-control">Modificar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-xs-6">
                                            <br>
                                        </div>
                                        <button data-dismiss="modal" class="btn btn-danger btn-danger form-control">Cancelar</button>
                                    </div>
                                </div>
                                <?= form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>assets/js/usuarios.js"></script>
</div>