<?php  
 require __DIR__.'/../../app/modal/header/header.php';
 require __DIR__.'/../../app/modal/footer/footer.php'; 
 require __DIR__.'/../../database/factorie/firstFact.php';
 require __DIR__.'/../../config/database/link.php';
 require __DIR__.'/../../config/data/filter.php';
 require __DIR__.'/../../database/migration/registration_modale.php';
 require __DIR__.'/../../database/migration/current_year_modale.php';
 require __DIR__.'/../../database/migration/mensualite_modale.php';
 require __DIR__.'/../../database/migration/salary_modale.php';
 require __DIR__.'/../../database/migration/spent_modale.php';
 require __DIR__.'/../../database/migration/accounting_view_modale.php';
 
Fact::creator('Header'); 
$con = Link::con();
$cur_year =  get_cur_year($con);
$regist_price = Register::countPrice($con, $cur_year);
$monthly_price = Mensualite::countPrice($con, $cur_year);
$totalPrice = ( $regist_price + $monthly_price );
$monthlyPay = Salaire::countPrice($con, $cur_year);
$spent =  Depense::countPrice($con, $cur_year);
$profit = $totalPrice - ($monthlyPay + $spent);
$request = Vue_comptable::out($con, $cur_year);
$data_chart='';
while($data = Vue_comptable::lister($request)) { 
    $data_chart .= "{ classe:'".$data['classe']."', montant:".$data["totalPrice"]."}, ";
}
?>

    

<section class="page_comptable"> 

    <div class="blog_scolar_year">
        <span class="btn_display_box">Annee en cours</span>
        <form action="<?php echo url('app/controler/ctl_scolar_year.php') ?>" method="post">
            <div class="box_scolar_year">
                <input type="text" name="annee" value="<?php echo $cur_year ?>" >
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </div>

     <div class="blog_comptable">

        <div class="box_comptable">
            <div class="box_comptable_items">
                <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                <div class="box_montant_comptable">
                    <span> Montant total </span>
                    <span class="montant"> <?php echo $totalPrice ?> <small> Fcfa </small> </span>
                </div>
            </div>
            <div class="box_comptable_items">
                <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                <div class="box_montant_comptable">
                    <span> Salaire totale </span>
                    <span class="montant"> <?php echo $monthlyPay ?> <small> Fcfa </small> </span>
                </div>
            </div>
            <div class="box_comptable_items">
                <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                <div class="box_montant_comptable">
                    <span> Depense total </span>
                    <span class="montant"> <?php echo $spent ?> <small> Fcfa </small> </span>
                </div>
            </div>
            <div class="box_comptable_items">
                <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                <div class="box_montant_comptable">
                    <span> Profit totale </span>
                    <span class="montant"> <?php echo $profit ?> <small> Fcfa </small> </span>
                </div>
            </div>
        </div>


        <div class="box_graph">
                <div id="graphBar" style="height: 250px;"></div>
                <div id="graphCercle" style="height: 250px;"></div>
        </div>

        <div class="box_classe">
             
            <div class="box_comptable">
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant 6eme </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, '6eme'); ?> <small> Fcfa </small> </span>
                    </div>
                </div>
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant 5eme </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, '5eme'); ?>  <small> Fcfa </small> </span>
                    </div>
                </div>
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant 4eme </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, '4eme'); ?>  <small> Fcfa </small> </span>
                    </div>
                </div>
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant 3eme </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, '3eme'); ?>  <small> Fcfa </small> </span>
                    </div>
                </div>
            </div>

            <div class="box_comptable">
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant 2nd </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, '2nd'); ?>  <small> Fcfa </small> </span>
                    </div>
                </div>
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant 1ere </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, '1ere'); ?>  <small> Fcfa </small> </span>
                    </div>
                </div>
                <div class="box_comptable_items">
                    <div class="logo"><img src="app/collector/icons8-money-bag-80.png" alt=""></div>
                    <div class="box_montant_comptable">
                        <span> Montant Terminal </span>
                        <span class="montant"> <?php echo Vue_comptable::outCons($con, $cur_year, 'terminale'); ?>  <small> Fcfa </small> </span>
                    </div>
                </div>
            </div>

        </div>
        
     </div>


</section>


</body>
</html>

<script>

let btn_display_box = document.querySelector('.btn_display_box');
let box_scolar_year = document.querySelector('.box_scolar_year');

btn_display_box.addEventListener('click', ()=>{
    box_scolar_year.classList.toggle('toggle_display_box');  
})

</script>

<script>

new Morris.Bar({
  element: 'graphBar',
  data: [ <?php echo $data_chart ?> ],
  xkey: 'classe',
  ykeys: ['montant'],
  labels: ['montant']
});


Morris.Donut({
  element: 'graphCercle',
  data: [
    {value: <?php echo $spent ?>, label: 'Depense'},
    {value: <?php echo $monthlyPay ?>, label: 'Salaire'},
    {value: <?php echo $profit ?>, label: 'Profit'},
  ],
  formatter: function (x) { return x + "Fcfa"}
}).on('click', function(i, row){
  console.log(i, row);
});

</script>




<?php
Fact::creator('footer'); 