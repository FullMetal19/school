<?php  
 require __DIR__.'/../../app/modal/header/header.php';
 require __DIR__.'/../../app/modal/footer/footer.php'; 
 require __DIR__.'/../../database/factorie/firstFact.php'; 
 require __DIR__.'/../../config/database/link.php';
 require __DIR__.'/../../database/migration/student_view_modale.php';
 require __DIR__.'/../../database/migration/current_year_modale.php';
 
Fact::creator('Header'); 
$con = Link::con();
$cur_year =  get_cur_year($con)

?>

<section class="page_accueil">

<fieldset class="box_accueil">
            <legend id="titre_box_accueil"> NIVEAU MOYEN </legend>
                
            <a class="btn_classe" href="<?php echo url('liste-eleve?item=6eme') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">6eme</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, '6eme' , $cur_year) ?> </span>
                </div>
            </a>

            <a class="btn_classe" href="<?php echo url('liste-eleve?item=5eme') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">5eme</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, '5eme' , $cur_year) ?> </span>
                </div>
            </a>

            <a class="btn_classe" href="<?php echo url('liste-eleve?item=4eme') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">4eme</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, '4eme' , $cur_year) ?> </span>
                </div>
            </a>

            <a class="btn_classe" href="<?php echo url('liste-eleve?item=3eme') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">3eme</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, '3eme' , $cur_year) ?> </span>
                </div>
            </a>

        </fieldset>

        
        <fieldset class="box_accueil">
            <legend id="titre_box_accueil"> NIVEAU SECONDAIRE </legend>
                
            <a class="btn_classe" href="<?php echo url('liste-eleve?item=2nd') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">2nd</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, '2nd' , $cur_year) ?> </span>
                </div>
            </a>

            <a class="btn_classe" href="<?php echo url('liste-eleve?item=1ere') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">1ere</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, '1ere' , $cur_year) ?> </span>
                </div>
            </a>

            <a class="btn_classe" href="<?php echo url('liste-eleve?item=terminale') ?>">
                <div class="box_classe">
                    <div class="option_classe">
                        <img src="app/collector/icons8-student-male-50.png" alt="" class="logo_eleve">
                        <span class="titre_classe">Terminal</span>
                    </div>
                    <span class="nbr_eleve"> <?php echo Vue_eleve::counter($con, 'terminale' , $cur_year) ?> </span>
                </div>
            </a>

        </fieldset>
 
        <img src="app/collector/collaboration-sidebar-768x768.png" alt="" id="slogan_accueil">
 
        </section>

<?php

Fact::creator('footer'); 


