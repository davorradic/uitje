
<!-- Contact Section -->
<section id="contact" style="margin-top:50px;">
    <div class="container">
    <?php
    //var_dump($_POST);
    if(isset($_POST['send'])){
      $errors = [];
        if(isset($_POST['gebruikersnaam']) && empty($_POST['gebruikersnaam'])){
            $errors['gebruikersnaam_error'] = 'vul gebruikersnaam in';
        }
        if(isset($_POST['gebruikersnaam']) && strlen($_POST['gebruikersnaam']) < 6){
            $errors['gebruikersnaammaxchar_error'] = 'gebruikersnaam moet meer dan 6 karakters zijn';
        }
        if(isset($_POST['wachtwoord']) && empty($_POST['wachtwoord'])){
            $errors['wachtwoord_error'] = 'vul wachtwoord in';
        }
        if(isset($_POST['gebruikersnaam']) && !empty($_POST['gebruikersnaam'])
        && isset($_POST['wachtwoord']) && !empty($_POST['wachtwoord'])){
        $sql = "SELECT gebruikersnaam, wachtwoord FROM users 
                WHERE gebruikersnaam = '".$_POST['gebruikersnaam']."'";
            
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->fetchAll();
        var_dump(count($result));
        if(count($result) == 1){
            var_dump($result);
            foreach($result as $k=>$v) { 
                 var_dump($v);
            }
        } else {
            echo 'gebruiksersnaam bestaat niet';
            var_dump(count($result));
        } 
            //https://www.php.net/manual/en/function.password-verify.php
            //$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
            //if (password_verify('techtech', $hash)) {
            //    echo 'Password is valid!';
            //} else {
            //    echo 'Invalid password.';
            //}
          
        }
        
        

    }

?>
      <h2 class="text-center text-uppercase text-secondary mb-0">Aanmelden</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
          <form name="sentMessage" id="contactForm" method="post" action="">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Gebruikersnaam</label>
                <input value="<?php echo (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : '')?>" name="gebruikersnaam" class="form-control" id="gebruikersnaam" type="text" placeholder="Gebruikersnaam">
                <p class="help-block text-danger">
                    <?php echo (!empty($errors['gebruikersnaam_error']) ? $errors['gebruikersnaam_error'].'<br/>' : '');?>
                    <?php echo (!empty($errors['gebruikersnaammaxchar_error']) ? $errors['gebruikersnaammaxchar_error'] : '');?>
                    <?php echo (!empty($errors['gebruikersnaamingebruik_error']) ? $errors['gebruikersnaamingebruik_error'] : '');?>
                </p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Wachtwoord</label>
                <input value="<?php echo (isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : '')?>" name="wachtwoord" class="form-control" id="wachtwoord" type="password" placeholder="Wachtwoord">
                <p class="help-block text-danger">
                <?php echo (!empty($errors['wachtwoord_error']) ? $errors['wachtwoord_error'] : '');?>
                </p>
              </div>
            </div>
            
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" name="send" id="sendMessageButton">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>