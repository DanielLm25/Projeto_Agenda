<?php
include_once("TEMPLATES/header.php")
?>
<div class="container">
  <?php include_once("TEMPLATES/backbtn.html"); ?>
  <h1 id="main-title">Editar contato</h1>
  <form id="edit-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
    <input type="hidden" name="type" value="edit">
    <input type="hidden" name="id" value="<?= $contacts['id'] ?>">

    <div class="form-group">
      <label for="name">Nome do Contato:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do contato" value="<?= $contacts['name'] ?>" required>
    </div>
    <div class="form-group">
      <label for="phone">Telefone do Contato:</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o Telefone do contato" value="<?= $contacts['phone'] ?>" required>
    </div>
    <div class="form-group">
      <label for="observations">Observações do Contato:</label>
      <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Observações o nome do contato" rows="3"><?= $contacts['observations'] ?> </textarea>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
</div>
<?php
include_once("TEMPLATES/footer.php");
?>