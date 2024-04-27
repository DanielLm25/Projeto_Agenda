<?php 
include_once("TEMPLATES/header.php")
?>

<div class="container" id="view-contact-container">
  <?php include_once("TEMPLATES/backbtn.html"); ?>
  <h1 id="main-title"> 
    <?= $contacts["name"] ?>
  </h1>
  <p class="col-id">Telefone:</p>
  <p><?= $contacts["phone"]?></p>
  <p class="col-id">Observações:</p>
  <p><?= $contacts["observations"]?></p>
</div>

<?php 
include_once("TEMPLATES/footer.php")
?>
