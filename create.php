<?php
include_once("TEMPLATES/header.php")
?>
<div class="container">
  <?php include_once("TEMPLATES/backbtn.html"); ?>
  <h1 id="main-title">Criando contato</h1>
  <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
    <input type="hidden" name="type" value="create">
    <div class="form-group">
      <label for="name">Nome do Contato:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do contato" required>
    </div>
    <div class="form-group">
      <label for="phone">Telefone do Contato:</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o Telefone do contato" required>
    </div>
    <div class="form-group">
      <label for="observations">Observações do Contato:</label>
      <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Observações o nome do contato" rows="3"> </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </form>
</div>
<?php
include_once("TEMPLATES/footer.php");
?>