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
                        <input type="text" class="form-control" name="espessura" required>
                    </div>

                    <div class="form-group">
                        <label for="largura">Largura</label>
                        <input type="text" class="form-control" name="largura" required>
                    </div>

                    <div class="form-group">
                        <label for="comprimento">Comprimento</label>
                        <input type="text" class="form-control" name="comprimento" required>
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
                                        <button onclick="deletar('<?=$med['idMedida']?>')" class='btn btn-default btn-danger'>Apagar</button>
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