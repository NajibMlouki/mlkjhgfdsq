<?php 
  /**
   * $REPOSITORY is: '.' if the includefile is at the same level as index.php
   *             or should be rectified if the include file is not at the same level as index.php 
   *             like: '..' , '../..' , etc
   **/                      
?>
<a href="/profile#" id="feedbacker">
<img alt="Share your feedback and ideas" src="<?php echo $REPOSITORY; ?>/img/ico/feedbacktab-5cd1d0dff3a42317e35339cab67b67c3.png"></a>
<script defer type="text/javascript">

<?php 
      /****   Si l email esi vide l'utilisateur sera invit‚ a saisir son email        ********/             
      //$email="mloukinajib@gmail.com"; 
      $email="";
?>
var feedback_form = new App.Feedback("<?php echo $email; ?>");
jQuery('#feedbacker').bind('click', feedback_form.open);
</script>
