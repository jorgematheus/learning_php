<h3>Novos Cursos</h3>
<div class="row">
    <?php if($myCourses != null): ?>
        <?php foreach($myCourses as $rs): ?>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" style="height: 8rem;" 
                    src="<?=BASE_URL?>img/courses/<?=$rs['image']?>" alt="Curso">
                    <div class="card-body">
                        <span class="card-text"><strong>Curso:</strong> 
                            <span class="title-modal"><?=$rs['title_course']?></span>
                         </span> <br>
                       <span class="card-text"><strong>Turma:</strong> 
                            <?=$rs['title_class']?> 
                       </span><br><br>
                       <button data-ids="<?=$rs['id_class']?>/<?=$rs['id_course']?>"
                         class="btn-register btn btn-outline-primary float-right">                                                      
                            <i class="fas fa-lock fa-fw"></i> Matricule-se                             
                        </button>
                    </div>                    
                </div> <br>
            </div> 
        <?php endforeach; ?>
    <?php endif;?>
    <?php if($myCourses == null): ?>
        <p class="col-12"><strong>Nenhum curso encontrado.</strong></p>
    <?php endif;?>
</div>
<script> $(document).ready(function(){ adapterTextTable(20); }) </script>
