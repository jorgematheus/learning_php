<h3 class="admin-color"><i class="fas fa-trash-alt"> </i> Lixeira</h3>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-content" role="tab" aria-controls="pills-users" aria-selected="true">Conteúdos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-lesson" role="tab" aria-controls="pills-content" aria-selected="false">Aulas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-course" role="tab" aria-controls="pills-contact" aria-selected="false">Cursos</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-content" role="tabpanel" aria-labelledby="pills-content-tab">
        <div class="table-responsive-lg">
            <table id="tabela-usuarios" class="table tabela-listagem">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listContent != null):?>
                    <?php foreach($listContent as $rs): ?>
                        <tr>
                            <td><?=$rs['title']?></td>
                            <td><?=$rs['description']?></td>
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryContent/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteContent/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
         </div>
    </div>
    <div class="tab-pane fade" id="pills-lesson" role="tabpanel" aria-labelledby="pills-lesson-tab">
        <div class="table-responsive-lg">
            <table id="tabela-usuarios" class="table tabela-listagem">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Exclusor</th>
                    <th>Data de exclusão</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php if($listLesson != null):?>
                    <?php foreach($listLesson as $rs): ?>
                        <tr>
                            <td><?=$rs['title']?></td>
                            <td><?=$rs['description']?></td>
                            <td><?=$rs['email']?></td>
                            <td><?=date('d/m/Y H:i:s', strtotime($rs['date_edition']))?></td>
                            <td><a href="<?=BASE_URL?>trash/recoveryLesson/<?=$rs['id']?>" class="btn button-all btn-admin"
                                   onclick="callRecoveryTrash(event, $(this).attr('href'), $(this).parents('tr'), 'aula', 'recuperar')"
                                   title="Restaurar"><i class="fas fa-level-up-alt fa-fw"></i></a>
                                <a  href="<?=BASE_URL?>trash/deleteContent/<?=$rs['id']?>" id="btt"
                                    onclick="callDelete(event, $(this).attr('href'), $(this).parents('tr'), 'conteúdo')"
                                    title="Excluir" class="btn-del btn button-all btn-admin"><i class="fas fa-trash-alt fa-fw"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
