<?php

session_start();
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit(); 
}
// Charger le fichier JSON
date_default_timezone_set('Europe/Paris');
$voyages_json = file_get_contents("voyagesv2.json");
$voyages = json_decode($voyages_json, true);

// Récupérer l'ID du voyage depuis l'URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;
$voyage = ($id >= 0 && isset($voyages[$id])) ? $voyages[$id] : null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vue détaillée du voyage</title> 
    <link rel="stylesheet" href="../style/nav_footer.css"> 
    <link rel="stylesheet" href="../style/vuedetaille.css">
</head>
<body>
<?php include("navbar.php"); ?>

<?php if ($voyage): ?>
<section class="hero" style="background-image: url('<?= $voyage['image'] ?>');">
    <div class="overlay">
        <h1>Plongée au coeur de<br>inoubliables <span><?= $voyage['titre'] ?></span> !</h1>
        <a href="#details" class="btn-scroll">Descendez pour les détails du voyage</a>
    </div>
</section>

        <div class="form-section">
            <label>Hébergement :</label>
            <div class="ensemble-carré-info">
                <label class="un-carré-info">
                    <input type="radio" name="hebergement" value="Hôtel 3★" required>
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb" alt="Hôtel 3★">
                    <span>Hôtel 3★</span>
                </label>

                <label class="un-carré-info">
                    <input type="radio" name="hebergement" value="Hôtel 4★">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c" alt="Hôtel 4★">
                    <span>Hôtel 4★</span>
                </label>

                <label class="un-carré-info">
                    <input type="radio" name="hebergement" value="Auberge">
                    <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be" alt="Auberge">
                    <span>Auberge</span>
                </label>

                <label class="un-carré-info">
                    <input type="radio" name="hebergement" value="Camping">
                    <img src="https://images.unsplash.com/photo-1523413651479-597eb2da0ad6" alt="Camping">
                    <span>Camping</span>
                </label>
            </div>
        </div>


    <div class="form-section">
        <label>Restauration :</label>
        <div class="ensemble-carré-info">
            <label class="un-carré-info">
                <input type="radio" name="restauration" value="Pension complète" required>
                <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092" alt="Pension complète">
                <span>Pension complète</span>
            </label>

            <label class="un-carré-info">
                <input type="radio" name="restauration" value="Demi-pension">
                <img src="https://images.unsplash.com/photo-1543353071-873f17a7a088" alt="Demi-pension">
                <span>Demi-pension</span>
            </label>

            <label class="un-carré-info">
                <input type="radio" name="restauration" value="Petit-déjeuner uniquement">
                <img src="https://images.unsplash.com/photo-1556911073-52527ac437f5" alt="Petit-déjeuner">
                <span>Petit-déjeuner uniquement</span>
            </label>

            <label class="un-carré-info">
                <input type="radio" name="restauration" value="Sans restauration">
                <img src="https://images.unsplash.com/photo-1555244162-803834f70033" alt="Sans restauration">
                <span>Sans restauration</span>
            </label>
        </div>
    </div>


        <div class="form-section">
            <label>Activités :</label>
            <div class="ensemble-carré-info">
                <!-- 1 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Plongée">
                    <img src="https://4kwallpapers.com/images/wallpapers/scuba-diver-underwater-under-the-sea-scuba-diving-sun-rays-3840x2160-8281.jpg" alt="Plongée">
                    <span>Plongée</span>
                </label>

                <!-- 2 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Canoë-Kayak de jour">
                    <img src="https://vertentenatural.com/wp-content/uploads/2020/06/Kayak-12-1.jpg" alt="Kayak jour">
                    <span>Canoë-Kayak de jour</span>
                </label>

                <!-- 3 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Canoë-Kayak de nuit">
                    <img src="https://res.cloudinary.com/manawa/image/private/f_auto,c_limit,w_3840,q_auto/fc156b9732e234b60278f8bafe7ae823" alt="Kayak nuit">
                    <span>Canoë-Kayak de nuit</span>
                </label>

                <!-- 4 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Jet Ski">
                    <img src="https://t4.ftcdn.net/jpg/11/07/27/03/360_F_1107270359_VQEtzUJxgWZTgu5SLAkrAGoBjj4EDThf.jpg" alt="Jet Ski">
                    <span>Jet Ski</span>
                </label>

                <!-- 5 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Paddle">
                    <img src="https://www.atoutnautic.fr/wp-content/uploads/2020/04/decouverte-stand-up-paddle.jpg" alt="Paddle">
                    <span>Paddle</span>
                </label>

                <!-- 6 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Parachute ascensionnel">
                    <img src="https://images.unsplash.com/photo-1505738313577-5357ff512f16?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGFyYWNodXRlJTIwYXNjZW5zaW9ubmVsfGVufDB8fDB8fHww">
                    <span>Parachute ascensionnel</span>
                </label>

                <!-- 7 -->
                <label class="un-carré-info">
                    <input type="checkbox" name="activites[]" value="Ski nautique">
                    <img src="https://www.biscagrandslacs.com/sites/default/files/medias/images/ski-nautique-lac-sanguinet-pierre-louis-germain.jpg" alt="Ski nautique">
                    <span>Ski nautique</span>
                </label>
            </div>
        </div>
       
        <div class="form-section">
            <label for="nb_personnes">Nombre de personnes par activité :</label>
            <input type="number" name="nb_personnes" id="nb_personnes" min="1" max="20" value="1">
        </div>

    <div class="form-section">
        <label>Transport vers la prochaine étape :</label>
        <div class="ensemble-carré-info">
            <label class="un-carré-info">
                <input type="radio" name="transport" value="Bateau" required>
                <img src="https://images.unsplash.com/photo-1519608487953-e999c86e7455" alt="Bateau">
                <span>Bateau</span>
            </label>

            <label class="un-carré-info">
                <input type="radio" name="transport" value="Bus">
                <img src="https://www.ivecobus.com/france/-/media/IvecoBus/France/urbain/banner-GX-ok.png?h=1080&iar=0&w=1920&rev=3faf6229380548b88599c025dcd15751" alt="Bus">
                <span>Transports en commun</span>
            </label>

            <label class="un-carré-info">
                <input type="radio" name="transport" value="Voiture de location">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70" alt="Voiture de location">
                <span>Voiture de location</span>
            </label>

            <label class="un-carré-info">
                <input type="radio" name="transport" value="Pas de transport">
                <img src="https://www.neozone.org/blog/wp-content/uploads/2021/10/velo-meilleur-sante-marche-etude-scientifique-001.jpg">
                <span>Mobilité douce</span>
            </label>
        </div>
    </div>


        <button type="submit" class="boutton-recherche">Valider et voir le récapitulatif</button>
    </form>
</section>

<?php else: ?>
    <p style="color:red; text-align:center; margin-top: 2rem;">Erreur : voyage introuvable.</p>
<?php endif; ?>

<?php include("footer.php"); ?>
</body>
</html>
