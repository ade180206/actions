<?php
require_once('db.php');
 ?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>modification des candidats </title>
  </head>
  <body> 
    <div class="container  mt-5">
       
        <?php include('message.php') ; ?>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <h4> MODIFIER UN CANDIDAT  
                        <a href="modifier.php" class="btn btn-primary float-end">RETOUR</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['ID'])) {
                        $candidats_id = mysqli_real_escape_string($con, $_GET['ID']);
                        $query = "SELECT * FROM candidats WHERE id = '$candidats_id' ";
                        $query_run = mysqli_query($con, $query);
                        
                        if(mysqli_num_rows($query_run) > 0 )
                            {
                                $candidats_id = mysqli_fetch_array($query_run) ;
                            }    
                         
                        ?>

                    <form action="code.php" method="POST">
                        <input type="hidden" name="candidats_id" value="<?= $candidat_id['id']; ?>">

                        <div class="mb-3">
                            <label for="nom">MATRICULE</label>
                            <input type="text" id="matricule" name="matricule" class="form-control"
                                   value="<?= htmlspecialchars($candidats_id['NOM_PRENOMS']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email">EMAIL</label>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="<?= htmlspecialchars($candidats_id['EMAIL']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telephone">TELEPHONE</label>
                            <input type="text" id="telephone" name="telephone" class="form-control"
                                   value="<?= htmlspecialchars($candidats_id['TELEPHONE']); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ecole">ECOLE</label>
                            <input type="text" id="ecole" name="ecole" class="form-control"
                                   value="<?= htmlspecialchars($candidats_id['ECOLE']); ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="modifier" class="btn btn-primary"> MODIFIER </button>
                        </div>
                    </form>
                <?php
                    
                    
                }
                else
                {
                    echo "<h5>Aucun ID fourni pour l'etudiant </h5>";
                }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>