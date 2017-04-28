<div class="container">
    <h1><span class="glyphicon glyphicon-bell"></span> Notificações</h1>
    <div class="row">
        <div class="col-md-6">
            <h4>Informações da notificação</h4>
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" placeholder="Sobre o que é a notificação?">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Destino das notificações</label>
                        <select class="form-control">
                            <option value="">Todos</option>
                            <option value="">Somente para admistradores</option>
                            <option value="">Somente para fornecedores</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Importância</label>
                        <select class="form-control">
                            <option value="default">Nenhuma</option>
                            <option value="warning">Atenção</option>
                            <option value="danger">Perigo</option>
                            <option value="success">Sucesso</option>
                        </select>
                    </div>
                </div>
            </div>
            <!--final row importancia-->
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_inicio"><span class="glyphicon glyphicon-calendar"></span> Data para entrega:</label>
                        <input name="data_inicio" id="data_inicio" readonly class="form-control dateval" placeholder="Defina um data">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data_final"><span class="glyphicon glyphicon-calendar"></span> Data para entrega:</label>
                        <input name="data_final" id="data_final" readonly class="form-control dateval" placeholder="Defina um data">
                    </div>
                </div>
            </div>
            <!--Final row datas-->
            <br><br>
        </div>
        <div class="col-md-6">
            <h4>Conteúdo da notificação</h4>
            <label for="data_final"><span class=" glyphicon glyphicon-pencil"></span> Conteúdo da notificação</label>
            <textarea class="form-control" rows="5" cols="2">Ex: Faturas foram modificadas
            </textarea>
        </div>
    </div>
    <!--Final row principal-->
</div>

<div class="container">
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Destino</th>
            <th>Descrição</th>
        </tr>
        <tr class="success">
            <td>1</td>
            <td>Novas Regras</td>
            <td>Todos</td>
            <td>Agora todos deverão mandar por e-mail as novas condições de pagamento para que...</td>
        </tr>
    </table>
</div>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="<?=base_url()?>assets/js/notificacao.js"></script>