<h3 class="content-color"><i class="fas fa-clipboard-list fa-fw"></i>Adicionar Nova Aula</h3>
<form id="form-content" method="POST">
    <div class="form-group">
        <label for="content-title">Título</label>
        <input type="text" class="form-control" id="content-title" name="content-title"
               placeholder="Informe um título com no máximo 100 caracteres.">
    </div>
    <div class="form-group">
        <label for="content-description">Descrição</label>
        <input type="text" class="form-control" id="content-description" name="content-description"
               placeholder="Informe uma descrição com no máximo 255 caracteres." >
    </div>
    <button type="submit" class="btn button-all btn-content"><i class="fas fa-save fa-fw"></i>Salvar</button>
    <br><br>
</form>
<?php if(1==1):?>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Selecionar Conteúdos
    </button>

    <br><br>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Conteúdos</h5>
                    <div class="table-responsive-lg">
                        <table class="table tabela-listagem">
                            <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descrição</th>
                                <th>Selecionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <form method="POST">
                                <?php if($listContent != null):?>
                                    <?php foreach($listContent as $rs): ?>
                                        <tr>
                                            <td><?=$rs['title']?></td>
                                            <td><?=$rs['description']?></td>
                                            <td> <input type="checkbox" class="form-control" id="content-description" name="check"
                                                        value="<?=$rs['id']?>" > </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                        <?php if($listContent == null):?>
                            <p class="text-center">Nenhum dado encontrado.</p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-content">Vincular</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>