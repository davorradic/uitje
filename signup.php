
<!-- Contact Section -->
<section id="contact" style="margin-top:50px;">
    <div class="container">
    <?php
    var_dump($_POST);
    if(isset($_POST['send'])){
        if(isset($_POST['gebruikersnaam']) && empty($_POST['gebruikersnaam'])){
            echo 'vul gebruikersnaam in';
        }
        if(isset($_POST['gebruikersnaam']) && strlen($_POST['gebruikersnaam']) < 6){
            echo 'gebruikersnaam moet meer dan 6 karakters zijn';
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
                <input name="gebruikersnaam" class="form-control" id="gebruikersnaam" type="text" placeholder="Gebruikersnaam">
                <p class="help-block text-danger">
                    
                </p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Wachtwoord</label>
                <input name="wachtwoord" class="form-control" id="wachtwoord" type="password" placeholder="Wachtwoord">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Adres</label>
                <input class="form-control" id="email" type="email" placeholder="Email Adres" >
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Voorletters</label>
                <input class="form-control" id="voorletters" name="voorletters" type="text" placeholder="Voorletters">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Tussenvoegsel</label>
                <input name="tussenvoegsel" class="form-control" id="tussenvoegsel" type="text" placeholder="Tussenvoegsel">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Achternaam</label>
                <input class="form-control" id="achternaam" name="achternaam" type="text" placeholder="Achternaam">
                <p class="help-block text-danger"></p>
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