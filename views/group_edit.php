<link rel="stylesheet" href="<?=BASE_URL?>vendor/bootstrap-table-pagination\css\datatables.min.css">
<h3 class="admin-color"><i class="fas fa-pencil-alt fa-fw"></i>Edição de Grupo</h3>
<form id="form-group" method="POST">
    <div class="form-group">
        <label for="group-title">Título</label>
        <input type="text" class="form-control" id="group-title" name="group-title"
               value="<?=$groupData['title']?>" placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="group-description">Descrição</label>
        <input type="text" class="form-control" id="group-description" name="group-description"
               value="<?=$groupData['description']?>" placeholder="Informe uma descrição com no máximo 255 caracteres." >
    </div>
    <button type="submit" class="btn button-all btn-admin"><i class="fas fa-save fa-fw"></i>Salvar</button>
</form>
<br><br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Vincular Usuário
</button>

<br><br>
<!-- Modal -->
<form id="form-add-ajax" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Usuários</h5>
                    <div class="table-responsive-lg">
                        <table class="table table-list table-modal">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Nome</th>   
                                <th>Email</th>                             
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody>                                
                                <?php if($listUsers != null):?>
                                    <?php foreach($listUsers as $rs): ?>
                                            <tr>
                                                <td><?php if($rs['image'] != null):?>
                                                    <img src="<?=BASE_URL?>img/users/<?=$rs['image']?>" 
                                                    width="50" height="50" alt="img class" 
                                                    title="Imagem Turma"> <?php endif;?> 
                                                </td>                                                
                                                <td class="title-modal"><?=$rs['name']?></td> 
                                                <td class="description-modal" > <?= $rs['email']?> </td>                                              
                                                <td> <input type="checkbox" class="form-control" 
                                                    id="group-description" name="check-admin[]"
                                                    value="<?=$rs['id']?>" >
                                                </td>
                                            </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <?php if($listUsers == null):?>
                            <p class="text-center">Nenhum dado encontrado.</p>
                        <?php endif;?>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-admin">Vincular</button>
            </div>
</form>
</div>
</div>
</div>
</form>
<h3>Usuários Vinculados</h3>
<div class="table-responsive-lg">
    <table class="table table-list table-admin">
        <thead>
        <tr>
            <th></th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Excluir</th>
        </tr>
        </thead>
        <tbody>
        <?php if($listUsersAddToGroup != null):?>
            <?php foreach($listUsersAddToGroup as $rs): ?>
                <tr>
                <td><?php if($rs['image'] != null):?><img src="<?=BASE_URL?>img/users/<?=$rs['image']?>" 
                        width="50" height="50" alt="img class" title="Imagem Turma"> <?php endif;?> 
                    </td>
                    <td class="title-table-admin"><?=$rs['name']?></td>
                    <td class="description-table-admin"><?=$rs['email']?></td>
                    <td>
                        <a href="<?=BASE_URL?>group/deleteUser/<?=$rs['idGroup']?>/<?=$rs['idUser']?>" id="btt"
                           onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'usuário')"
                           title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
        <?php endif;?>
        </tbody>
    </table>
    <?php if($listUsersAddToGroup == null):?>
        <p class="text-center">Nenhum dado encontrado.</p>
    <?php endif;?>
</div>
<script> $(document).ready(function(){ adapterTextTable(10); }) </script>
<script src="<?=BASE_URL?>vendor/bootstrap-table-pagination\js\datatables.min.js"></script>
<script>
  $(document).ready(function(){ tablePagination('.table-list')});
</script>