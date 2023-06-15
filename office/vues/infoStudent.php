<?php  
 require __DIR__.'/../../app/modal/header/header.php';
 require __DIR__.'/../../app/modal/footer/footer.php'; 
 require __DIR__.'/../../database/factorie/firstFact.php';
 require __DIR__.'/../../config/database/link.php';
 require __DIR__.'/../../config/data/filter.php';
 require __DIR__.'/../../database/migration/current_year_modale.php';
 require __DIR__.'/../../database/migration/student_view_modale.php';
 require __DIR__.'/../../database/migration/monthly_view_modale.php';
 require __DIR__.'/../../database/migration/note_modale.php';
 
Fact::creator('Header'); 
$con = Link::con();
$cur_year =  get_cur_year($con);
$id_eleve = Filter::get($_GET['item']);
$requeste = Vue_eleve::out($con, $cur_year, $id_eleve);
$request_from_mensualite = Vue_mensualite::out($con, $cur_year, $id_eleve);
$data = Vue_eleve::lister($requeste);
$i = 0;

$request_from_note = Note::out($con, $cur_year, $id_eleve);

?>



<section class="page_infoStudent">

    <div class="blog_modale">

        <div class="popup">
             <span id="btn_close_popup"> X </span>
             <span> Mensualite </span>
             <form action="<?php echo url('app/controler/ctl_infoStudent.php?id='.$id_eleve) ?>" method="post">
             <div class="input"> <label for="mois"> Le mois : </label> <input type="month" name="mois" id="mois" required> </div>
             <div class="input"> <label for="montant"> Le montant (FcFa) : </label> <input type="text" name="montant" required id="montant" placeholder="Le Montant ici..."> </div>
             <input type="submit" value="Enregistrer">
            </form>
        </div>

    </div>

     <div class="blog_infoStudent">

        <div class="box_left_infoStudent">
            <div class="box_Paiement">
                <span class="btn_modale"> <img src="app/collector/icons8-ajouter-48.png" title="Voir mensualite" class="btn_mesualite" alt="" > Paiement mensuel </span>   
            </div>  
            <table class="mensualite">
                <tr class="tableHead"> <th> id </th> <th> Annee </th> <th> Mois </th> <th> Montant </th> <th> comptable </th> <th> date </th> </tr>
                <?php while($data_from_mens = Vue_mensualite::lister($request_from_mensualite)) { $i ++ ; ?>
                <tr class="tableLine"> <td> <?php echo $i ?> </td> <td> <?php echo $data_from_mens['annee'] ?> </td> <td> <?php echo $data_from_mens['mois'] ?> </td> <td> <?php echo $data_from_mens['montant'] ?> </td> <td> <?php echo $data_from_mens['prenom_admin'].' '.$data_from_mens['nom_admin'] ?> </td> <td> <?php echo $data_from_mens['date'] ?> </td> </tr>
                <?php } ?>
            </table> 
        </div>
        <div class="box_right_infoStudent">

            <div class="top_info">
                <img src="app/collector/icons8-student-male-50.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                <span> <?php echo $data['prenom'].' '.$data['nom'] ?> </span>
                <span> Classe : <?php echo $data['classe'] ?> </span>
                <details>
                    <summary>Ajouter une note</summary>
                    <div class="box_add_note">
                         <form action="<?php echo url('app/controler/ctl_add_note.php?id='.$id_eleve) ?>" method="post">
                            <select name="semestre" id="">
                                <option value="semestre 1">semestre 1</option>
                                <option value="semestre 2">semestre 2</option>
                                <option value="semestre 3">semestre 3</option>
                            </select>
                            <input type="text" placeholder="La note ici..." required name='note' >
                            <input type="submit" value="Enregistrer">

                         </form>
                    </div>
                </details>
            </div>
            <div class="down_info">
               <span> Inscrit le : <?php echo $data['date'] ?> </span>
               <span> Date naissance : <?php echo $data['date_naiss'] ?> </span>
               <span> Lieu naissance : <?php echo $data['lieu_naiss']?> </span>
               <span> Adresse : <?php echo $data['adresse'] ?> </span>
               <span> Nom parent :<?php echo $data['nom_parent'] ?> </span>
               <span> Tel parent <?php echo $data['tel_parent'] ?></span>
               <?php while($data_from_note = Note::lister($request_from_note)) { ?>
                <span> <?php echo $data_from_note['semestre'].' : '.$data_from_note['note'] ?> </span>
                <?php } ?>
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