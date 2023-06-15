<?php  
 require __DIR__.'/../../app/modal/header/header.php';
 require __DIR__.'/../../app/modal/footer/footer.php'; 
 require __DIR__.'/../../database/factorie/firstFact.php';
 require __DIR__.'/../../config/database/link.php';
 require __DIR__.'/../../config/data/filter.php';
 require __DIR__.'/../../database/migration/current_year_modale.php';
 require __DIR__.'/../../database/migration/salary_view_modale.php';
 require __DIR__.'/../../database/migration/personnel_modale.php';
 
Fact::creator('Header'); 
$con = Link::con();
$annee = date('Y'); $i = 0;
$id_personnel = Filter::get($_GET['item']);
$data = Personnel::out($con, $id_personnel);
$request_from_salary = Vue_salaire::out($con, $annee, $id_personnel);
?>



<section class="page_infoStudent">

    <div class="blog_modale">

        <div class="popup">
             <span id="btn_close_popup"> X </span>
             <span> Mensualite </span>
             <form action="<?php echo url('app/controler/ctl_infoStaff.php?id='.$id_personnel) ?>" method="post">
             <div class="input"> <label for="mois"> Le mois : </label> <input type="month" name="mois" id="mois" required> </div>
             <div class="input"> <label for="montant"> Le montant (FcFa) : </label> <input type="text" name="montant" required id="montant" placeholder="Le Montant ici..."> </div>
             <input type="submit" value="Enregistrer">
            </form>
        </div>

    </div>

     <div class="blog_infoStudent">

        <div class="box_left_infoStudent">
            <div class="box_Paiement">
                <span class="btn_modale btn_PaiementStaff"> <img src="app/collector/icons8-ajouter-48.png" title="Voir mensualite" class="btn_mesualite" alt="" > Paiement mensuel </span>   
            </div>  
            <table class="mensualite">
                <tr class="tableHead tableHeadStaff"> <th> id </th> <th> Annee </th> <th> Mois </th> <th> Montant </th> <th> comptable </th> <th> date </th> </tr>
                <?php while($data_from_salary = Vue_salaire::lister($request_from_salary)) { $i++  ?>
                <tr class="tableLine tableLineStaff"> <td> <?php echo $i ?> </td> <td> <?php echo $data_from_salary['annee'] ?> </td> <td> <?php echo $data_from_salary['mois'] ?> </td> <td> <?php echo $data_from_salary['montant'] ?> </td> <td> <?php echo $data_from_salary['prenom_admin'].' '.$data_from_salary['nom_admin'] ?> </td> <td> <?php echo $data_from_salary['date'] ?> </td> </tr>
                <?php } ?>
            </table> 
        </div>
        <div class="box_right_infoStudent">

            <div class="top_info">
                <img src="app/collector/icons8-school-director-male-skin-type-4-40.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                <span>  <?php echo $data['prenom'].' '.$data['nom'] ?> </span>
                <span> Profession : <?php echo $data['profession']?> </span>
                <span> Sexe : <?php echo $data['sexe'] ?> </span>
            </div>
            <div class="down_info">
               <span> Date naiss : <?php echo $data['date_naiss'] ?> </span>
               <span> Lieu naiss : <?php echo $data['lieu_naiss'] ?> </span>
               <span> Telephone : <?php echo $data['telephone'] ?> </span>
               <span> Adresse : <?php echo $data['adresse'] ?></span>
            </div>
            
        </div>

     </div>

</section>

<?php Fact::creator('footer');  ?>


<script>

let btn_close_popup = document.getElementById('btn_close_popup');
let blog_modale = document.querySelector('.blog_modale');
let btn_modale = document.querySelector('.btn_modale'); 

btn_close_popup.addEventListener('click' , ()=>{
    blog_modale.style.display="none";
});

btn_modale.addEventListener('click' , ()=>{
    blog_modale.style.display="block";
});





</script>