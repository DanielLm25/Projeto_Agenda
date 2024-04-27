<?php

session_start();

include_once("connection.php"); // [4](https://pt.stackoverflow.com/questions/273918/recuperar-campo-sem-include/require)
include_once("url.php"); // [6](https://forum.imasters.com.br/topic/585759-apagar-foto-do-bd-e-da-pasta/?do=getLastComment)

$data = $_POST;

if (!empty($data)) {


  if ($data["type"] === "create") {
    $name = $data["name"];
    $phone = $data["phone"];
    $observations = $data["observations"];


    $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":observations", $observations);

    try {
      $stmt->execute();
      $_SESSION["msg"] = "Contato criado com sucesso!";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "ERRO: $error";
    }
  } else if ($data["type"] === "edit") {

    $name = $data["name"];
    $phone = $data["phone"];
    $observations = $data["observations"];
    $id = $data["id"];

    $query = "UPDATE contacts 
    SET name = :name, phone = :phone, observations = :observations 
    WHERE id = :id";
    $stmt = $conn->prepare($query);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":phone", $phone);
    $stmt->bindParam(":observations", $observations);
    $stmt->bindParam(":id", $id);

    try {
      $stmt->execute();
      $_SESSION["msg"] = "Contato atualizado com sucesso!";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "ERRO: $error";
    }
  } else if ($data["type"] === "delete") {
    $id = $data["id"];

    $query = "DELETE FROM contacts WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);

    try {
      $stmt->execute();
      $_SESSION["msg"] = "Contato removido com sucesso!";
    } catch (PDOException $e) {
      $error = $e->getMessage();
      echo "ERRO: $error";
    }
  }

  header("location:" . $BASE_URL . "../index.php");

  exit;
} else {
  $id;

  if (!empty($_GET)) {

    $id = $_GET["id"]; // [6](https://forum.imasters.com.br/topic/585759-apagar-foto-do-bd-e-da-pasta/?do=getLastComment)
  }

  if (!empty($id)) {

    $query = "SELECT * FROM contacts WHERE id = :id";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(":id", $id);
    $stmt->execute();

    $contacts = $stmt->fetch();
  } else {


    $contacts = [];


    $query = "SELECT * FROM contacts";

    $stmt = $conn->prepare($query);

    $stmt->execute();
    $contacts = $stmt->fetchAll();
  }
}

$conn = null;
