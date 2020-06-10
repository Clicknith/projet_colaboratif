<?php

require_once("../inc/init.php");

$r = $pdo->query("SELECT * FROM produit");

require_once("inc/header.php");

?>

<div class="col-md-10">

    <div class="table-responsive">

        <table class="table col-md-12">
            <thead class="thead-dark">
                <tr>

                    <!-- JE RÉCUPÈRE LE NOM DE MES COLONNES EN BDD -->
                    <!-- POUR GÉNÉRER LES TH DE MA TABLE HTML DYNAMIQUEMENT -->

                    <?php for($i=0; $i< $r->columnCount(); $i++ ) { ?>
                        <th> <?php echo $r->getColumnMeta($i)["name"]; ?> </th>
                    <?php } ?>

                    <th> modification </th>
                    <th> suppresion </th>

                </tr>
            </thead>
            <tbody>

                <!-- JE FETCH DANS LE JEU DE RÉSULTAT DE MA REQUÊTE SQL (PDOSTATEMENT)-->
                
                <?php while($produit = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                    
                    <tr>

                        <?php foreach($produit as $indice => $valeur) { ?>
                            <td> <?php echo $valeur;  ?>  </td>
                        <?php } ?>

                        <!-- LIEN DE MODIFICATION ET SUPPRESSION -->

                        <td>
                            <a href="?action=modification&id_produit= <?php echo $produit['id_produit']; ?>" class="badge badge-dark"> Modifier </a>
                        </td>
                        <td>
                            <a href="?action=suppression&id_produit= <?php echo $produit['id_produit']; ?>" class="badge badge-danger"> Supprimer </a>
                        </td>
                    
                    </tr>
                    
                <?php } ?>

            </tbody>
        </table>

    </div>


</div>


<?php
require_once("inc/footer.php");
?>