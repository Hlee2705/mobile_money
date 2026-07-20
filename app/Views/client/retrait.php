<?= $this->include('includes/header') ?>


<h1>Effectuer un retrait</h1>


<?php if (session()->getFlashdata('error')): ?>

    <p style="color:red">
        <?= session()->getFlashdata('error') ?>
    </p>

<?php endif; ?>


<?php if (session()->getFlashdata('success')): ?>

    <p style="color:green">
        <?= session()->getFlashdata('success') ?>
    </p>

<?php endif; ?>



<form method="post"
    action="<?= base_url('/retrait/effectuer') ?>">


    <label>
        Montant :
    </label>


    <input
        type="number"
        name="montant"
        required>



    <br><br>


    <button>
        Retirer
    </button>


</form>



<br>


<a href="<?= base_url('/dashboard') ?>">
    Retour
</a>

<?= $this->include('includes/footer') ?>