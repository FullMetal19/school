<?php  require __DIR__.'/../config/Http/url.php'; require __DIR__.'/../config/app/notification.php';  session_start(); ?>

<div class="blog_conx">
        
        <img src="app/collector/icons8-school-96.png" alt="image-school" id="logo_conx">

        <form action="<?php echo url('app/controler/ctl_authentification.php') ?>" method="POST" class="form_conx">

            <div class="box_conx">
                
                <h1 id="titre_conx">Se connecter </h1>

                <a href="" id="pwd_forget">Mot de passe oublie ?</a>

                <div class="input_conx">
                    <div class="box_input"> <img src="app/collector/icons8-customer-26.png" alt=""> <input type="text" name="login" placeholder="Identifiant"> </div>
                    <div class="box_input"> <img src="app/collector/icons8-password-24.png" alt=""> <input type="password" name="password" placeholder="Mot de passe"> </div>

                </div>
                
                <input type="submit" value="Se connecter" id="btn_conx">

                <span class="notification_conx">  <?php notify('error_connexion') ?> </span>
            
            </div>
    
        </form>
    
    </div>