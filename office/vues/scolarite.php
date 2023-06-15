<?php  
 require __DIR__.'/../../app/modal/header/header.php';
 require __DIR__.'/../../app/modal/footer/footer.php'; 
 require __DIR__.'/../../database/factorie/firstFact.php';
 require __DIR__.'/../../config/database/link.php';
 require __DIR__.'/../../config/data/filter.php';
 require __DIR__.'/../../database/migration/current_year_modale.php';
 require __DIR__.'/../../database/migration/student_view_modale.php';
 require __DIR__.'/../../database/migration/personnel_modale.php';
 
Fact::creator('Header'); 
$con = Link::con();
$cur_year =  get_cur_year($con);
$nbre_element_par_page = 2;
if(isset($_SESSION['num_page_pagination_scolarite'])){
    $num_page = $_SESSION['num_page_pagination_scolarite'];
    unset($_SESSION['num_page_pagination_scolarite']);
}
else{  $num_page = 1;  }
$debut_index_trie = ($num_page - 1) * $nbre_element_par_page ;
$compteur = Personnel::counter($con);
$nbre_page = ceil($compteur/$nbre_element_par_page);
$request = Personnel::outLimit($con, $debut_index_trie, $nbre_element_par_page);
?>

<section class="page_scolarite">

<!-- PARTIE POPUP  -->

    <div class="blog_modale">

        <div class="popup_scolarite">
             <span id="btn_close_popup_scolar" > X </span>
             <span> Creer administatreur </span>
             <form action="<?php echo url('app/controler/ctl_add_admin.php') ?>" method="post">
                <div class="box_input"> 
                    <input type="text" placeholder="Prenom" name="prenom" class="">
                    <input type="text" placeholder="Nom" name="nom" class="">
                    <select name="sexe" id="">
                        <option value="Masculin"> Masculin </option>
                        <option value="Feminin"> Feminin </option>
                    </select>
                </div>
                <div class="box_input"> 
                    <input type="text" placeholder="CNI" name="cni" class="">
                    <input type="text" placeholder="Telephone" name="tel" class="">
                </div>
                <div class="box_input"> 
                    <input type="text" placeholder="Login" name="login" class="">
                    <input type="text" placeholder="Password" name="password" class="">
                </div>
             <input type="submit" value="Enregistrer">
            </form>
        </div>

    </div>

    <!-- BLOG GENERALE DE LA SCOLARITE -->

     <div class="blog_scolarite">

     <!-- BLOG D'EN HAUT DE LA BLOG SCOLARITE -->
         
        <div class="box_top_scolarite">
            
        <!-- BOX A GAUCHE DE LA BLOG D'EN HAUT-->

            <div class="left">
                <div class="box_static">
                     <div class="box">
                        <img src="app/collector/icons8-man-student-48.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                        <span> <b> <?php echo  Vue_eleve::countCons($con, $cur_year, 'masculin') ?> </b> Eleves </span>
                     </div>
                     <div class="box">
                        <img src="app/collector/icons8-woman-student-48.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                        <span> <b> <?php echo  Vue_eleve::countCons($con, $cur_year, 'feminin') ?> </b> Eleves </span>
                     </div>
                </div>
                <div class="box_static">
                    <div class="box">
                       <img src="app/collector/icons8-teacher-48.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                       <span> <b> <?php echo  Personnel::countWith($con, 'Professeur') ?> </b> Professeurs </span>
                    </div>
                    <div class="box">
                       <img src="app/collector/icons8-school-director-male-skin-type-4-40.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                       <span> <b> <?php echo  Personnel::countWithOut($con, $cur_year, 'Professeur') ?> </b> personnels </span>
                    </div>
               </div>
           </div>

            <!-- BOX A DROITE DE LA BLOG D'EN HAUT  -->

            <div class="right">
                <div class="top_info">
                    <img src="app/collector/icons8-admin-settings-male-48.png" title="Voir mensualite" class="btn_mesualite" alt="" >
                    <span> <?php echo $_SESSION['prenom'].' '. $_SESSION['nom'] ?> </span>
                    <div id="btn_add_admin"> <img src="app/collector/icons8-add-user-32.png" alt=""> <span > Ajouter admin </span> </div>
                </div>
            </div>

        </div>

        <!-- BLOG D'EN BAS DE LA BLOG SCOLARITE -->

        <div class="box_down_scolarite">

        <!-- CONTENU BLOG D'EN BAS DE LA BLOG SCOLARITE -->

           <div class="pageCategories">   

           <!-- BOUTON DE NAVIGATION DE LA BLOG D'EN BAS -->

                <ul class="navBarCategories">
                    <input type="checkbox" id="categorie_check"> <label for="categorie_check" id="menu_categorie">&#9776</label>
                    <li id="btn_option1" > <b>+</b> Liste Personnel </li>
                    <li id="btn_option2" > <b>+</b> Ajouter Personnel  </li> 
                    <li id="btn_option3" > <b>+</b> Inscription </li>
                    <li id="btn_option4" > <b>+</b> Autres depenses </li>
                </ul>

                <div class="space_categories"></div>

                <!-- LE BOX MAIN QUI REGROUPE LES DIFFERENTES SERVICES DE LA BLOG D'EN BAS -->

                <div class="categoriesFrame">

                <!-- BOX DE LA LISTE DES PERSONNELS DE L'ECOLE -->

                    <div class="categorie_Items option1"> 
                        <div class="blog_list">
                        <?php while($data = Personnel::lister($request)) { ?>
                            <div class="liste_demande">
                                <div class="etoile"> <img src="app/collector/icons8-etoile-48.png" title="" class="logo_etoile" alt="" > </div>
                                <div class="option"> <?php echo $data['prenom'] ?> </div>
                                <div class="option"> <?php echo $data['nom'] ?> </div>
                                <div class="option"> <?php echo $data['profession'] ?> </div>
                                <div class="option"> <?php echo $data['telephone'] ?> </div>
                                <div class="paiement"> <a  href="<?php echo url('info-staff?item='.$data['id']) ?>" title="Voir document"> <img src="app/collector/icons8-modifier-30.png" title="Voir mensualite" class="btn_mesualite" alt="" > </a> </div>
                            </div>                         
                        <?php } ?>
                        </div>   
                        <div class="pagination">
                        <?php for($i = 1; $i<=$nbre_page; $i++){ ?>
                                <a href="<?php echo url('config/app/pagination.php?page=scolarite&item='.$i) ?>" class="lien_pagination"> <?php echo $i ?> </a>
                        <?php  }  ?>  
                        </div>       
                    </div>

                    <!-- BOX DE L'AJOUT DU PERSONNEL SCOLAIRE -->

                    <div class="categorie_Items option2"> 
                      <div class="blog_add_admin">
                            
                        <div class="form_inscription">
                            <form action="<?php echo url('app/controler/ctl_personnel.php') ?>" method="POST">
                                <fieldset> <legend> Prenom, nom et sexe </legend>
                                    <div class="box_input"> 
                                        <input type="text" placeholder="Prenom..." name="prenom" >
                                        <input type="text" placeholder="Nom..." name="nom" >
                                        <select name="sexe" id="">
                                            <option value="Masculin"> Masculin </option>
                                            <option value="Feminin"> Feminin </option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset> <legend> Date et lieu de naissance </legend>
                                    <div class="box_input"> 
                                        <input type="date"  name="date_naiss" >
                                        <input type="text" placeholder="Lieu de naissance..." name="lieu_naiss" >
                                        <select name="profession" id="">
                                            <option value="Professeur"> Professeur </option>
                                            <option value="Secretaire"> Secretaire </option>
                                            <option value="Autres"> Autres </option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset> <legend> Addresse et telephone </legend>
                                    <div class="box_input"> 
                                        <input type="text" placeholder="Telephone..." name="telephone" >
                                        <input type="text" placeholder="Adresse..." name="adresse" >
                                    </div>
                                </fieldset>
                                <input type="submit" value="Enregistrer">
                            </form>
                        </div>
                        <div class="imagetoPersonnel">
                            <img src="app/collector/collaboration-sidebar-768x768.png" title="" alt="" >
                        </div>

                      </div>
                     
                    </div>

                    <!-- BOX D'INSCRIPTION DES ELEVES -->
                    
                    <div class="categorie_Items option3"> 
                        <div class="blog_inscription">
                            <div class="form_inscription">
                                <form action="<?php echo url('app/controler/ctl_inscription.php') ?>" method="POST">
                                    <fieldset> <legend> Prenom, nom et sexe </legend>
                                        <div class="box_input"> 
                                            <input type="text" placeholder="Prenom" name="prenom" class="">
                                            <input type="text" placeholder="Nom" name="nom" class="">
                                            <select name="sexe" id="">
                                                <option value="Masculin"> Masculin </option>
                                                <option value="Feminin"> Feminin </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <fieldset> <legend> Date et lieu de naissance et Addresse  </legend>
                                        <div class="box_input"> 
                                            <input type="date"  name="date_naiss" class="">
                                            <input type="text" placeholder="Lieu de naissance..." name="lieu_naiss" class="">
                                            <input type="text" placeholder="Adresse" name="adresse" class="">
                                        </div>
                                    </fieldset>
                                    <fieldset> <legend> Montant et classe </legend>
                                        <div class="box_input"> 
                                            <input type="text" placeholder="Montant ici ..." name="montant" class="">
                                            <select name="classe" id="">
                                                <option value="6eme" > 6 eme </option>
                                                <option value="5eme" > 5 eme </option>
                                                <option value="4eme" > 4 eme </option>
                                                <option value="3eme" > 3 eme </option>
                                                <option value="2nd" > 2nd </option>
                                                <option value="1ere" > 1ere </option>
                                                <option value="terminale" > Terminale </option>
                                            </select>
                                        </div>
                                    </fieldset>
                                    <fieldset> <legend> Information parentale </legend>
                                        <div class="box_input"> 
                                            <input type="text" placeholder="Prenom et nom" name="nom_parent" class="">
                                            <input type="text" placeholder="telephone" name="tel_parent" class="">
                                        </div>
                                    </fieldset>
                                    <input type="submit" value="Enregistrer">
                                </form>
                            </div>
                            <div class="image">
                                <img src="app/collector/School-PNG-Transparent-Image.png" title="" alt="" >
                            </div>
                        </div>  

                    </div>

                    <!-- BOX DES DEPENSES DE L'ECOLE -->

                    <div class="categorie_Items option4"> 
                       <div class="blog_depenses">
                            <form action="<?php echo url('app/controler/ctl_depense.php') ?>" method="POST">
                                <input type="text" id="1" placeholder="Le montant ici..." required name="montant_dep" >
                                <label for="2"> Ecrire ici le nature et la raison de la depense : </label>
                                <textarea name="nature" id="2" cols="32" rows="10" required placeholder="Ecrire ici le nature et la raison de la depense ..."> </textarea>
                                <input type="submit" value="Enregistrer">
                            </form>
                            <div class="imagetoDepense">
                                <img src="app/collector/depense.png" title="" alt="" >
                            </div>
                       </div>
                    </div>

                    
                </div>
        
            </div> 
  
        </div>

    </div>

</section>

</body>

    
    <?php Fact::creator('footer') ?>

<script src="public/js/style.js"></script>




    