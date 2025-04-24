<?php

session_start();


if (!isset($_SESSION['user_id']) || !isset($_SESSION['voyage'])) {
    header('Location: login.php');
    exit;
}


$voyage = $_SESSION['voyage'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement - Réservation de voyage</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container payment-page">
        <h1>Paiement</h1>
        
        <h2>Récapitulatif du voyage</h2>
        <div class="trip-summary">
            <h2>Récapitulatif du voyage</h2>
            <div class="summary-details">
                <p><strong>Titre:</strong> <?php echo htmlspecialchars($voyage['titre']); ?></p>
                <p><strong>Date de début:</strong> <?php echo htmlspecialchars($voyage['date_debut']); ?></p>
                <p><strong>Date de fin:</strong> <?php echo htmlspecialchars($voyage['date_fin']); ?></p>
                <p><strong>Prix total:</strong> <?php echo htmlspecialchars($voyage['prix']); ?> €</p>
            </div>
        </div>
        
        <!-- Formulaire de paiement -->
        <div class="payment-form">
            <h2>Informations de paiement</h2>
            
            <form action="verification_paiement.php" method="POST">
                <div class="form-group">
                    <label for="card_number">Numéro de carte bancaire</label>
                    <div class="card-input-group">
                        <input type="text" id="card_number_1" name="card_number_1" maxlength="4" pattern="\d{4}" required>
                        <input type="text" id="card_number_2" name="card_number_2" maxlength="4" pattern="\d{4}" required>
                        <input type="text" id="card_number_3" name="card_number_3" maxlength="4" pattern="\d{4}" required>
                        <input type="text" id="card_number_4" name="card_number_4" maxlength="4" pattern="\d{4}" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="card_holder">Nom et prénom du titulaire</label>
                    <input type="text" id="card_holder" name="card_holder" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group expiry">
                        <label for="expiry_month">Date d'expiration</label>
                        <div class="expiry-inputs">
                            <select id="expiry_month" name="expiry_month" required>
                                <option value="">Mois</option>
                                <?php for ($i = 1; $i <= 12; $i++): ?>
                                    <option value="<?php echo sprintf('%02d', $i); ?>"><?php echo sprintf('%02d', $i); ?></option>
                                <?php endfor; ?>
                            </select>
                            
                            <select id="expiry_year" name="expiry_year" required>
                                <option value="">Année</option>
                                <?php $currentYear = date('Y'); ?>
                                <?php for ($i = $currentYear; $i <= $currentYear + 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group cvv">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" maxlength="3" pattern="\d{3}" required>
                    </div>
                </div>
                
                <!-- Champs cachés pour transmettre les données nécessaires -->
                <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
                <input type="hidden" name="voyage_id" value="<?php echo htmlspecialchars($voyage['id']); ?>">
                
                <div class="buttons">
                    <a href="recapitulatif.php" class="btn btn-secondary">Retour au récapitulatif</a>
                    <button type="submit" class="btn btn-primary">Confirmer le paiement</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
