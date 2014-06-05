<div id="certifications" data-sel-certifications="" class="hide_for_print">
            <div class="editbox"> 
            <small class="editlinks"> 
            <a href="#inline" class="" original-title="Add Certification or Licensure" id="certificate">Ajouter</a> </small>
              <h2>Certificat &amp; License</h2>
              <ul class="certifications">
              <?php $cert = $profil->select_certification() ?>
              </ul>
            </div>
          </div>
          
<script defer type="text/javascript">

<?php 
      /****   Si l email esi vide l'utilisateur sera invit‚ a saisir son email        ********/             
      //$email="mloukinajib@gmail.com"; 
      $email="";
?>
var feedback_form = new App.Feedback("<?php echo $email; ?>");
jQuery('#certificate').bind('click', feedback_form.open);
</script>          
          
          <!-- hidden inline form -->
<div id="inline" hidden>
	<h2>Ajouter Certification</h2>

	<form id="contact" name="contact" action="#" method="post">
		
        <label for="titre">Titre</label>
		<input type="text" id="titre" name="titre" class="txt">
        <br>
		<label for="depart">Ville</label>
		<input type="text" id="departement" name="departement" class="txt">
        <br>
		<label for="descr">Date</label>
		<input type="text" id="description" name="description" class="txt">
		
		<button type="submit" id="send">Enregistrer</button>
        
	</form>
</div>