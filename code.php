<?php
session_start();
require 'db.php';

if(isset($_POST['supprimer']))
    {
    $candidats_id = mysqli_real_escape_string($conn, $_POST['supprimer']);

    $query ="DELETE FROM candidats WHERE id ='$candidats_id' " ;
    $query_run = mysqli_query($conn, $query);

    if($query_run && mysqli_affected_rows($conn) > 0)
    {
        $_SESSION['message'] = "supression effectuée avec succes";
        header("location:candidats.php");
        exit(0);
    } 
    else
      {
          $_SESSION['message'] = "candidats non supprimé";
          header("location:candidats.php");
          exit(0);
      }
    }  


if(isset($_POST['modifier']))
    {
    $candidats_id = mysqli_real_escape_string($conn, $_POST['candidats_id']);
    $matricule = mysqli_real_escape_string($connn,$_POST['matricule']);
    $nom = mysqli_real_escape_string($conn,$_POST['nom']);
    $prenoms = mysqli_real_escape_string($conn,$_POST['prenoms']);
    $date_naissance = mysqli_real_escape_string($conn,$_POST['date_naissance']);
    $filiere = mysqli_real_escape_string($conn,$_POST['filiere']);

    $query = "UPDATE  candidats SET  matricule = '$matricule', nom = '$nom' , prenoms = '$prenoms' , date_naissance = '$date_naissance' , filiere = '$filiere' WHERE id ='$candidats_id' " ;
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "candidats modifier avec succes";
        header("location:candidats.php");
        exit(0);
    }
      else
      {
          $_SESSION['message'] = "candidats non modifiees";
          header("location:candidats.php");
          exit(0);
      }
    }

?>
 
