    <form action="#" method="post">
        <label for="">Nom Produit :</label>
        <input type="text" name="nom_produit" id=""><br>
        <br>
        <label for="">Prix :</label>
        <input type="number" min="0" name="prix" id=""><br>
        <br>
        <label for="">Quantité :</label>
        <input type="number" min="0" name="qte" id=""><br>
        <br>
        <input type="submit" value="Ajouter Produit" id=""><br>
        <br>
    </form>
    <form action="#" method="post">
        <label for="">Commentaire :</label>
        <textarea name="commentaire" id=""rows="10" cols="25"></textarea><br>
        <br>
        <input type="submit" value="Ajouter Commentaire" id=""><br>
    </form>
    <form action="#" method="post">
        <label for="">Username:</label>
        <input type="text" name="username" id=""><br>
        <br>
        <label for="">Email :</label>
        <input type="email" name="email" id=""><br>
        <br>
        <input type="submit" value="Ajouter user" name="add" id=""><br>
        <input type="submit" value="Supprimer user" name="supp" id=""><br>
        <br>
    </form>
<?php
    // 1 :
        $employes = [
            "employe1"=>["nom"=>"RAHEL","poste"=>"consultant","salaire"=>15000],
            "employe2"=>["nom"=>"ISFHSEF","poste"=>"Developpeur web","salaire"=>25000],
            "employe3"=>["nom"=>"ISFHSEF","poste"=>"Developpeur mobile","salaire"=>30000],
            "employe4"=>["nom"=>"HAJJOUJI","poste"=>"Developpeur web","salaire"=>25000],
            "employe5"=>["nom"=>"OUAHMAN","poste"=>"consultant technique","salaire"=>37000],
        ];
        function Calculer($tab) {        
            $somme = 0;
            foreach($tab as $k){
                $somme += $k["salaire"];
            }
            $m = $somme / count($tab);
            return $m;
        }
       echo "La moyenne des salaires des employes = " . Calculer($employes);
       echo "<br/>";
       
    // 2 :
        $trouve = false;
        foreach($employes as $k => $v){
            if ($k == $_POST["pseudoname"]) {
                $trouve = true;
                echo "<h2>Les infos d'employe recherche sont : </h2>";
                echo $v["nom"]."<br/>";
                echo $v["poste"]."<br/>";
                echo $v["salaire"]."<br/>";
                break;
            }
        }
        if(!$trouve){
            echo "L'employe n'existe pas";
        }
    echo "<br/>";
    // 3 :
        $users = [
            "user1"=>["email"=>"Othmane.rahel@gmail.com","password"=>123456789],
            "user2"=>["email"=>"Othmanerahel@gmail.com","password"=>15022005],
            "user3"=>["email"=>"rahelOthmane@gmail.com","password"=>20050215],
        ];
        $email = $_POST["email"];
        $password = $_POST["password"] ;
        $tr = 0;
        foreach($users as $user => $v){
            if($v["email"] == $email && $v["password"] == $password){
                $tr = 1;
                echo "<b> le $user avec l'email $email a été bien connecte </b>";
            }
        }
        if($tr == 0){
            echo "L'email ou Password est incorrectes";
        }
        
    // 4 :
        session_start();
        if (!isset($_SESSION["panier"])) {
            $_SESSION["panier"] = [];
        }
        $nom = $_POST["nom_produit"];
        $quantite = $_POST["qte"];
        $prix = $_POST["prix"];
        if (isset($nom) && isset($quantite) && isset($prix)) {
            $_SESSION["panier"][] = [
            "nom"=>$nom,
            "prix"=>$prix,
            "quantite"=>$quantite
            ];
        }
        echo "<h2>Contenu du Panier :</h2>";
            if (empty($_SESSION["panier"])) {
                echo "Le panier est vide.";
            } else {
                $total = 0;
                foreach ($_SESSION["panier"] as $p) {
                    echo $p["nom"] . " - Prix: " . $p["prix"] . "€ - Quantité: " . $p["quantite"] . "<br/>";
                    settype($p["quantite"],"int");
                    settype($p["prix"],"int");
                    $total += $p["prix"] * $p["quantite"];
                }
                echo "<b> Le total = $total Dh</b>";
            }
    // 5 :
        if (!isset($_SESSION["commentaires"])) {
            $_SESSION["commentaires"] = [];
        }
        $commentaire = $_POST["commentaire"];
        $time = time();
        if (isset($commentaire)) {
            $_SESSION["commentaires"][] = [
            "commentaire"=>$commentaire,
            "time"=>$time,
            ];
        }
        echo "<h2>Contenu du commentaires :</h2>";
            if (empty($_SESSION["commentaires"])) {
                echo "Les listes des commentaires est vide.";
            } else {
                foreach ($_SESSION["commentaires"] as $p) {
                    echo "Commentaire : ". $p["commentaire"] . " - Time : " . $p["time"] . "<br/>";
                }
            }
        echo "<br/>";
    // 6 :
        $tab =[
            "maroc" => 35.5,
            "espagne" => 42.0,
            "france" => 24.5,
            "algerie" => 38.5,
        ];
        function AfficherTempElevee($ta){
            // reset kat9der tjib biha awel valeur o kayna key kat9der tjib lia key lwl
            $max = reset($ta); 
            $nomv = "";
            foreach($ta as $k => $v){
                if ($v > $max) {
                    $max = $v;
                    $nomv = $k;
                }
            }
            echo "la ville ayant la température la plus élevée est $max avec le nom $nomv";
        }
        AfficherTempElevee($tab);
        echo "<br/>";
    // 9 :
    $etudiants = [
        "Ali" => ["Math" => 15, "Physique" => 14, "Chimie" => 16],
        "Sara" => ["Math" => 12, "Physique" => 11, "Chimie" => 13],
        "Youssef" => ["Math" => 18, "Physique" => 17, "Chimie" => 19],
    ];
    function CalculerMoyenne($tab){
        $somme = 0;
        $m = 0;
        $res = [];
        foreach($tab as $k => $e){
            $somme = $e["Math"]+$e["Physique"]+$e["Chimie"];
            $m = $somme / count($tab);
            $res[$k] = $m;
        }
        foreach($res as $k1 =>$v1){
            echo "Pour l'etudiant $k1 sa moyenne est ";
            echo $v1 . "<br/>";

        }
    }
    CalculerMoyenne($etudiants) . "<br/>";
    // 8 :
        $prod = $_POST["produits"];
        foreach($prod as $v){
            echo "produit choisi : $v <br/>"; 
        }
    // 10 :
        if (!isset($_SESSION['users'])) {
            $_SESSION['users'] = [];
        }
        if (isset($_POST['add'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            if (!empty($username) && !empty($email)) {
                $_SESSION['users'][] = ['username' => $username, 'email' => $email];
            }
        }
        if (isset($_POST['supp'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            foreach ($_SESSION['users'] as $k => $v) {
                if ($v["username"] == $username && $v["email"] == $email) {
                    unset($_SESSION['users'][$k]);
                }
                break;
            }
            $_SESSION['users'] = array_values($_SESSION['users']);
        }
        foreach ($_SESSION['users'] as $k => $v) {
            if (!empty($_SESSION["users"])) {
                echo "-------------------------------------------------------------- <br/>";
                echo "Username : " . $v["username"]."<br/>"."email : ".$v["email"]."<br/>";
                echo "-------------------------------------------------------------- <br/>";
            }
        }

?>