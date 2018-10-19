<h1><?=$courseOpen['title']?></h1>
<div class="row">
    <div class="accordion col-4" id="accordionExample">
        <?php if($getLessonCourse != null): ?>
            <?php foreach($getLessonCourse as $rs):?>             
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" 
                        data-target="#<?=$rs['id_lesson']?>" aria-expanded="true" 
                        aria-controls="<?=$rs['id_lesson']?>">
                            <?=$rs['title_lesson']?>
                        </button>
                    </h5>
                    </div>
                    <div id="<?=$rs['id_lesson']?>" class="collapse">
                        <div class="card-body"> Anim pariatur cliche reprehenderit,  </div>  
                    </div>                  
                </div>                                               
            <?php endforeach;?>
        <?php endif;?>
    </div>   
   
    <div class="col-8">
    <div class="tab-content" id="nav-tabContent">        
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>        
    </div>
    </div>
</div>