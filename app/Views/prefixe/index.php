<?= $this->include('includes/header') ?>

<div class="row row--between row--wrap" style="margin-bottom:var(--space-6);">

    <div>
        <span class="eyebrow">Administration</span>
        <h1>Préfixes téléphoniques</h1>
        <p class="text-muted text-sm">
            Liste des préfixes enregistrés dans le système.
        </p>
    </div>

    <a href="<?= site_url('prefixe/create') ?>" class="btn btn--primary">
        Ajouter un préfixe
    </a>

</div>

<?php if (session('success')) : ?>

    <div class="alert alert--success" style="margin-bottom:var(--space-5);">
        <div>
            <span class="alert__title">Succès</span>
            <?= session('success') ?>
        </div>
    </div>

<?php endif; ?>

<div class="card">

    <div class="card__header">
        <h3>Liste des préfixes</h3>
    </div>

    <div class="card__body">

        <div class="table-wrap">

            <table class="table">

                <thead>

                    <tr>
                        <th style="width:180px;">Préfixe</th>
                        <th>Informations</th>
                    </tr>

                </thead>

                <tbody>

                    <?php if (empty($prefixes)): ?>

                        <tr>
                            <td colspan="2" style="text-align:center;">
                                Aucun préfixe enregistré.
                            </td>
                        </tr>

                    <?php else: ?>

                        <?php foreach ($prefixes as $prefixe): ?>

                            <tr>

                                <td class="mono cell-primary">
                                    <?= esc($prefixe['code']) ?>
                                </td>

                                <td>
                                    <?= esc($prefixe['libelle']) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->include('includes/footer') ?>