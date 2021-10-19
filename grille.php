<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Jeu de loterie</title>
    <meta charset="UTF-8">
   <!--
    bien mettre cette ligne pour css
    --->
    <link rel="stylesheet" href="style.css?t=<?php echo time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Veuillez sélectionner 6 uniquement cases pour jouer</h1>

<!-----
création de la grille
--->
    <div id="grille">

        <?php
        /**** pour valeur i=0, i va à 49, rajoute jusqu'à 49*****/
        for($i=1; $i<49; $i++){
        ?>
        <input type="button" value="<?php echo $i?>" id="<?php echo $i?>" onclick="jouer(this.value)" />
        <?php
            /******** retour à la ligne pour une valeur 7 ou multiple de 7**********/
            if ($i%7==0)
                echo "<br />";
        }
        ?>

    </div>
<!---- ce conteneur va accueillir les numéros qui ont été jouer ----->
<div id="selection">
    <form name="fo" method="post" action="tirage.php">
        <input type="hidden" name="selection">
        <input type="submit" value="Jouer" name="jouer"/>

    </form>
</div>



<!--- script de la fonction jouer()----->
<script>
    /*********
     ici pour mettre une condition: je limite à 6 numéros
     *****/
    i=0;
    <!--- fonction jouer() permet de cacher les numéros----->
    function jouer(val){
        if (i<6) {
            document.getElementById(val).style.visibility = "hidden";
            /****permet au click de chaque numéros, d'afficher le numéro******/
            document.getElementById("selection").innerHTML += '<input type="button" value="' + val + '"  />';
            document.fo.selection.value+=val+" ";
            i+=1;
            if(i==6){
                document.fo.jouer.style.visibility="visible";
            }

        }
    }
</script>
</body>
</html>
