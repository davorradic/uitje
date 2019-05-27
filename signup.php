
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
        if(isset($_POST['gebruikersnaam']) && !empty($_POST['gebruikersnaam'])){
          $gebruikersnaam_check_sql = "SELECT * FROM users WHERE gebruikersnaam = '".$_POST['gebruikersnaam']."'";
          $stmt = $conn->prepare($gebruikersnaam_check_sql); 
          $stmt->execute();
          if(count($stmt->fetchAll()) > 0){
            $errors['gebruikersnaamingebruik_error'] = 'gebruikersnaam al in gebruik';
          }
        }
        if(isset($_POST['wachtwoord']) && empty($_POST['wachtwoord'])){
          $errors['wachtwoord_error'] = 'vul wachtwoord in';
        }
        if(isset($_POST['wachtwoord']) && strlen($_POST['wachtwoord']) < 7){
          $errors['wachtwoordmaxchar_error'] = 'wachtwoord moet meer dan 6 karakters zijn';
        }
        if($_POST['wachtwoord'] != $_POST['herhaal_wachtwoord']){
          $errors['wachtwoordherhaal_error'] = 'de wachtwoorden komen niet overeen';
        }
        if(isset($_POST['email']) && empty($_POST['email']) ){
          $errors['email_error'] = 'vul email in';
        }
        if(isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
          $errors['email_format_error'] = 'email is niet valid';
        }
        if(isset($_POST['email']) && !empty($_POST['email'])){
          $email_check_sql = "SELECT * FROM users WHERE emailadres = '".$_POST['email']."'";
          $stmt = $conn->prepare($email_check_sql); 
          $stmt->execute();
          if(count($stmt->fetchAll()) > 0){
            $errors['emailingebruik_error'] = 'email al in gebruik';
          }
        }
        if(isset($_POST['voorletters']) && empty($_POST['voorletters'])){
          $errors['voorletters_error'] = 'vul voorletters in';
        }
        /*if(isset($_POST['tussenvoegsel']) && empty($_POST['tussenvoegsel'])){
          $errors['tussenvoegsel_error'] = 'vul tussenvoegsel in';
        }*/
        if(isset($_POST['achternaam']) && empty($_POST['achternaam'])){
          $errors['achternaam_error'] = 'vul achternaam in';
        }
        
        if(count($errors) == 0){
          $sql = "INSERT INTO users (gebruikersnaam, wachtwoord, rol, voorletters, tussenvoegsel, achternaam, emailadres)
                  VALUES ('".$_POST['gebruikersnaam']."', '".password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT)."', '0', '".$_POST['voorletters']."', '".$_POST['tussenvoegsel']."', '".$_POST['achternaam']."', '".$_POST['email']."')";
          //var_dump($sql);
          if($conn->exec($sql) === 1){
            $last_id = $conn->lastInsertId();
            //var_dump($last_id);
          }
        
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
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Herhaal Wachtwoord</label>
                <input value="<?php echo (isset($_POST['herhaal_wachtwoord']) ? $_POST['herhaal_wachtwoord'] : '')?>" name="herhaal_wachtwoord" class="form-control" id="herhaal_wachtwoord" type="password" placeholder="Herhaal Wachtwoord">
                <p class="help-block text-danger">
                  <?php echo (!empty($errors['wachtwoordherhaal_error']) ? $errors['wachtwoordherhaal_error'] : '');?>
                </p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Adres</label>
                <input value="<?php echo (isset($_POST['email']) ? $_POST['email'] : '')?>" class="form-control" name="email" id="email" type="text" placeholder="Email Adres" >
                <p class="help-block text-danger">
                  <?php echo (!empty($errors['email_error']) ? $errors['email_error'] : '');?><br />
                  <?php echo (!empty($errors['email_format_error']) ? $errors['email_format_error'] : '');?><br />
                  <?php echo (!empty($errors['emailingebruik_error']) ? $errors['emailingebruik_error'] : '');?>
                  
                </p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Voorletters</label>
                <input value="<?php echo (isset($_POST['voorletters']) ? $_POST['voorletters'] : '')?>" class="form-control" id="voorletters" name="voorletters" type="text" placeholder="Voorletters">
                <p class="help-block text-danger">
                  <?php echo (!empty($errors['voorletters_error']) ? $errors['voorletters_error'] : '');?>
                </p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Tussenvoegsel</label>
                <input value="<?php echo (isset($_POST['tussenvoegsel']) ? $_POST['tussenvoegsel'] : '')?>" name="tussenvoegsel" class="form-control" id="tussenvoegsel" type="text" placeholder="Tussenvoegsel">
                <p class="help-block text-danger">
                  <?php //echo (!empty($errors['tussenvoegsel_error']) ? $errors['tussenvoegsel_error'] : '');?>
                </p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Achternaam</label>
                <input value="<?php echo (isset($_POST['achternaam']) ? $_POST['achternaam'] : '')?>" class="form-control" id="achternaam" name="achternaam" type="text" placeholder="Achternaam">
                <p class="help-block text-danger">
                <?php echo (!empty($errors['achternaam_error']) ? $errors['achternaam_error'] : '');?>
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