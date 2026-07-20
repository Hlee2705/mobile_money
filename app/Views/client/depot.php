<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Dépôt</title>

</head>


<body>


<h1>Effectuer un dépôt</h1>


<?php if(session()->getFlashdata('error')): ?>

    <p style="color:red">
        <?= session()->getFlashdata('error') ?>
    </p>

<?php endif; ?>


<?php if(session()->getFlashdata('success')): ?>

    <p style="color:green">
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>



<form method="post" action="<?= base_url('/depot/effectuer') ?>">


    <label>
        Montant :
    </label>


    <input 
        type="number"
        name="montant"
        min="1"
        required
    >


    <br><br>


    <button type="submit">
        Déposer
    </button>


</form>



<br>


<a href="<?= base_url('/dashboard') ?>">
    Retour dashboard
</a>



</body>

</html>