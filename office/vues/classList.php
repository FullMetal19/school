<?php  
 require __DIR__.'/../../app/modal/header/header.php';
 require __DIR__.'/../../app/modal/footer/footer.php'; 
 require __DIR__.'/../../database/factorie/firstFact.php';
 require __DIR__.'/../../config/database/link.php';
 require __DIR__.'/../../config/data/filter.php';
 require __DIR__.'/../../database/migration/student_view_modale.php';
 require __DIR__.'/../../database/migration/current_year_modale.php';
 
Fact::creator('Header'); 
$con = Link::con();
$cur_year =  get_cur_year($con);
$classe = Filter::get($_GET['item']);

$nbre_element_par_page = 2;
if(isset($_SESSION['num_page_pagination_classList'])){
    $num_page = $_SESSION['num_page_pagination_classList'];
    unset($_SESSION['num_page_pagination_classList']);
}
else{  $num_page = 1;  }
$debut_index_trie = ($num_page - 1) * $nbre_element_par_page ;
$compteur = Vue_eleve::counter($con, $classe, $cur_year);
$nbre_page = ceil($compteur/$nbre_element_par_page);
$request =  Vue_eleve::outLimit($con, $classe , $cur_year, $debut_index_trie, $nbre_element_par_page);

?>


<section class="page_classList">
   
   <div class="blog_classList">
   
   <div class="head_page_clasList">
       <div class="box_logo_classList">
           <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" > 
           <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" >
           <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" >  
           <img src="app/collector/icons8-graduation-hat-60.png" title="" class="" alt="" >
       </div>
       
       <span> Liste des eleves en classe de 6eme</span>

       <div class="box_logo_classList">
           <img src="app/collector/icons8-graduation-hat-60.png" title="" class="" alt="" id="second_logo" >
           <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" > 
           <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" > 
           <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" > 
       </div>
   </div>
   
   <div class="blog_list">

     <?php while($data = Vue_eleve::lister($request)) { ?>
      
       <div class="liste_demande">
           <div class="etoile"> <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" > </div>
           <div class="option"> <?php echo $data['prenom'] ?> </div>
           <div class="option"> <?php echo $data['nom'] ?> </div>
           <div class="option"> <?php echo $data['sexe'] ?> </div>
           <div class="option"> <?php echo $data['adresse'] ?> </div>
           <div class="paiement"> <a  href="<?php echo url('info-eleve?item='.$data['id_eleve']) ?>" title="Voir document"> <img src="app/collector/icons8-modifier-30.png" title="Voir mensualite" class="btn_mesualite" alt="" > </a> </div>
       </div>

    <?php } ?>

   </div>
    
   <div class="pagination">
         <?php for($i = 1; $i<=$nbre_page; $i++){ ?>
                <a href="<?php echo url('config/app/pagination.php?page=classList&arg='.$classe.'&item='.$i) ?>" class="lien_pagination"> <?php echo $i ?> </a>
         <?php  }  ?>  
   </div>       


</div>

</section>

<?php

Fact::creator('footer'); 