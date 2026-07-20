<?= $this->include('includes/header') ?>

<div class="row row--between row--wrap" style="margin-bottom:var(--space-6);">

    <div>
        <span class="eyebrow">Administration</span>
        <h1>Tranches</h1>
        <p class="text-muted text-sm">
            Liste des tranches de montant enregistrées dans le système.
        </p>
    </div>

    <a href="<?= site_url('tranche/create') ?>" class="btn btn--primary">
        Ajouter une tranche
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
        <h3>Liste des tranches</h3>
    </div>


    <div class="card__body">

        <div class="table-wrap">

            <table class="table">

                <thead>

                    <tr>
                        <th style="width:120px;">ID</th>
                        <th>Montant minimum</th>
                        <th>Montant maximum</th>
                    </tr>

                </thead>


                <tbody>

                    <?php if (empty($tranches)): ?>

                        <tr>
                            <td colspan="3" style="text-align:center;">
                                Aucune tranche enregistrée.
                            </td>
                        </tr>


                    <?php else: ?>


                        <?php foreach ($tranches as $tranche): ?>

                            <tr>

                                <td class="mono cell-primary">
                                    <?= esc($tranche['id']) ?>
                                </td>


                                <td>
                                    <?= number_format($tranche['min'], 0, ',', ' ') ?> Ar
                                </td>


                                <td>
                                    <?= number_format($tranche['max'], 0, ',', ' ') ?> Ar
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