<?php
require 'db/conexion.php';

$info ='';
$message = '';
if (isset($_POST['programme']) && isset($_POST['jour']) && isset($_POST['heure'])) {
  $programme = $_POST['programme'];
  $jour = $_POST['jour'];
  $heure = $_POST['heure'];
  $sql = 'INSERT INTO agenda(programme, jour, heure) VALUES(:programme, :jour, :heure)';
  $start = $connexion->prepare($sql);
  if (  $start->execute([':programme' => $programme, ':jour' => $jour, ':heure' => $heure])) {
    $message = 'Votre programme est ajouté avec succès';
  }
}
// Affichage des données a partir de la base de donnée
$sql1 = 'SELECT * FROM agenda ORDER BY id DESC';
$starte = $connexion->prepare($sql1);
$starte->execute();
$agenda = $starte->fetchAll(PDO::FETCH_OBJ);

//Suppression des données
// $id = $_GET['id'];
// $sql2 = 'DELETE FROM agenda WHERE id=:id';
// $star = $connexion->prepare($sql2);
//   if (  $star->execute([':id' => $id])) {
//     $info = "";
//   }
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5 mb-5">
        <div class="card d-flex justify-content-center">
            <div class="card-header">
              <h3 class="text-center">Todo List Kambire php</h3>
            </div>
            <div data-date="<?php echo '2022-12-12 07:25:14' ; ?>" id="cd_timer"></div>
            <script>
                $(function () {
                $("#cd_timer").TimeCircles();
                });
                </script>
            <div class="card-body">
              <?php if (!empty($message)): ?>
                <div class="alert alert-success">
                  <?= $message; ?>
              <?php endif; ?>
                </div>
                <div class=" mx-sm-3 mb-2">
                    <form method="POST" class="form-inline d-flex justify-content-center">
                        <input type="text" required  name="programme" class="form-control" placeholder="Entez votre programme">
                        <input type="date" required  name="jour" class="ml-3" placeholder="Entrez la date de l'évenement">
                        <input type="time" required  name="heure" class="ml-3" placeholder="Entrez la date de l'évenement">
                        <button type="submit" class="ml-4 btn btn-primary"><i class="fas fa-plus-square"></i> Ajouter</button>
                    </form>
                </div>
                <table class="table table-striped shadow">
                  <thead>
                    <tr>
                      <th scope="col">Evenements</th>
                      <th scope="col">Date de l'evenement</th>
                      <th scope="col">Heure de l'evenement</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($agenda as $event): ?>
                    <tr>
                      <td><?= $event->programme; ?></th>
                      <td><?= $event->jour; ?></td>
                      <td><?= $event->heure; ?></td>
                      <td>
                        <a onclick="return confirm('Voulez-vous supprimer lévenement ?')" href="del.php?id=<?= $event->id ?>" class="btn btn-danger"><i class="fas fa-trash"></i>Del</a>
                      </td>
                    </tr>
                   <?php endforeach; ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timecircles/1.5.3/TimeCircles.min.js" integrity="sha512-FofOhk0jW4BYQ6CFM9iJutqL2qLk6hjZ9YrS2/OnkqkD5V4HFnhTNIFSAhzP3x//AD5OzVMO8dayImv06fq0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>