<div class="container">
    <h1>Medidas</h1>

    <div class="row">
        <?php 
            if($this->session->flashdata('message')){
                echo "<div class='alert alert-danger'>".$this->session->flashdata('message')."</div>";
            }
            if($this->session->flashdata('message-success')){
                echo "<div class='alert alert-success'>".$this->session->flashdata('message-success')."</div>";
            }
            echo validation_errors("<div class='alert alert-danger'>","</div>");
        ?>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <p class="panel-title">Cadastro de Medidas</p>
                </div>
                <div class="panel-body">
                    <?=form_open('medidas/cadastra')?>
                    <div class="form-group">
                        <label for="qualidade">Qualidade</label>
                        <input type="text" class="form-control" name="qualidade" required>
                    </div>

                    <div class="form-group">
                        <label for="espessura">Espessura</label>
                        <input type="number" class="form-control" name="espessura" required>
                    </div>

                    <div class="form-group">
                        <label for="largura">Largura</label>
                        <input type="number" class="form-control" name="largura" required>
                    </div>

                    <div class="form-group">
                        <label for="comprimento">Comprimento</label>
                        <input type="number" class="form-control" name="comprimento" required>
                    </div>

                    <button class="btn btn-primary form-control" type="submit">Cadastrar</button>
                    <?=form_close()?>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <th>#Id</th>
                                <th>Qualidade</th>
                                <th>Espessura</th>
                                <th>Largura</th>
                                <th>Comprimento</th>
                                <th> </th>
                            </thead>
                            <tbody>
                                <?php foreach($medida as $med){?>
                                <tr id="<?=$med['idMedida']?>">
                                    <td><?=$med['idMedida']?></td>
                                    <td><?=$med['qualidade']?></td>
                                    <td><?=$med['espessura']?></td>
                                    <td><?=$med['largura']?></td>
                                    <td><?=$med['comprimento']?></td>                                
                                    <td>
                                        <button type='button' class='btn btn-warning' data-toggle='modal' data-target='.myModal<?=$med['idMedida']?>'>Modificar</button> 
                                        <button onclick="deletar('<?=$med['idMedida']?>')" class='btn btn-default btn-danger'>Apagar</button>

                                        <div class="modal fade myModal<?=$med['idMedida']?>" tabindex="-1" role="dialog" aria-labelledby="myModal<?=$med['idMedida']?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="gridSystemModalLabel">Medida # <?=$med['idMedida']?><span id="modalLocal"></span></h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <?=form_open('medidas/alterar')?>
                                                        <div class="form-group">
                                                           <label for="id">Id</label>
                                                           <input type="text" class="form-control" name="id" value="<?=$med['idMedida']?>" placeholder="<?=$med['idMedida']?>" readonly>
                                                        </div>

                                                       <div class="form-group">
                                                           <label for="qualidade">Qualidade</label>
                                                           <input type="text" class="form-control" name="qualidade" value="<?=$med['qualidade']?>" placeholder="<?=$med['qualidade']?>">
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="espessura">Espessura</label>
                                                           <input type="number" class="form-control" name="espessura" value="<?=$med['espessura']?>" placeholder="<?=$med['espessura']?>">
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="largura">Largura</label>
                                                           <input type="number" class="form-control" name="largura" value="<?=$med['largura']?>" placeholder="<?=$med['largura']?>">
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="comprimento">Comprimento</label>
                                                           <input type="number" class="form-control" name="comprimento" value="<?=$med['comprimento']?>" placeholder="<?=$med['comprimento']?>">
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                        <button type="submit" class="btn btn-primary">Alterar</button>
                                                        <?=form_close()?>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </td>
                                </tr>

                                
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>assets/js/medidas.js"></script>
</div>