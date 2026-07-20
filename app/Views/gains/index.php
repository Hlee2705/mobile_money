<?= $this->include('includes/header') ?>

<div class="row row--between row--wrap" style="margin-bottom: var(--space-6);">
    <div>
        <span class="eyebrow">Espace opérateur</span>
        <h1>Gains</h1>
        <p class="text-muted text-sm" style="margin:0;">Vue d'ensemble des frais et commissions perçus</p>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-card__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M3 7l4-4 4 4M7 3v13" />
                <path d="M21 17l-4 4-4-4M17 21V8" />
            </svg>
        </div>
        <div class="stat-card__label">Frais — transferts normaux</div>
        <div class="stat-card__value"><?= number_format($gainFraisTransfertNormal, 0, ',', ' ') ?> Ar</div>
    </div>

    <div class="stat-card">
        <div class="stat-card__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M3 7l4-4 4 4M7 3v13" />
                <path d="M21 17l-4 4-4-4M17 21V8" />
            </svg>
        </div>
        <div class="stat-card__label">Frais — transferts autres</div>
        <div class="stat-card__value"><?= number_format($gainFraisTransfertAutre, 0, ',', ' ') ?> Ar</div>
    </div>

    <div class="stat-card" style="border-color: var(--color-primary-soft); background: var(--color-primary-light);">
        <div class="stat-card__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <circle cx="8" cy="15" r="4" />
                <circle cx="15" cy="9" r="4" />
            </svg>
        </div>
        <div class="stat-card__label">Commission — transferts autres</div>
        <div class="stat-card__value"><?= number_format($gainCommissionTransfertAutre, 0, ',', ' ') ?> Ar</div>
        <div class="stat-card__delta stat-card__delta--up">5 % du montant envoyé</div>
    </div>

    <div class="stat-card">
        <div class="stat-card__icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M12 19V5M6 11l6-6 6 6" />
            </svg>
        </div>
        <div class="stat-card__label">Frais — retraits</div>
        <div class="stat-card__value"><?= number_format($gainFraisRetrait, 0, ',', ' ') ?> Ar</div>
    </div>
</div>

<div class="stack" style="gap: var(--space-6);">

    <div class="card">
        <div class="card__header">
            <h3>Transferts vers préfixe normal</h3>
        </div>
        <div class="card__body" style="padding-bottom:0;">
            <div class="table-wrap" style="border:none;border-radius:0;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Émetteur</th>
                            <th>Bénéficiaire</th>
                            <th>Montant</th>
                            <th>Frais</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transfertsNormaux as $t): ?>
                            <tr>
                                <td class="mono cell-primary"><?= esc($t['numero_emetteur']) ?></td>
                                <td class="mono"><?= esc($t['numero_receveur']) ?></td>
                                <td class="amount"><?= number_format($t['montant'], 0, ',', ' ') ?> Ar</td>
                                <td class="amount amount--pos">+<?= number_format($t['frais'], 0, ',', ' ') ?> Ar</td>
                                <td class="text-sm text-muted"><?= esc($t['date_operation']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?= $pagerTransfertsNormaux->links('transfertsNormaux', 'custom') ?>
        </div>
    </div>

    <div class="card">
        <div class="card__header">
            <h3>Transferts vers autres opérateurs</h3>
        </div>
        <div class="card__body" style="padding-bottom:0;">
            <div class="table-wrap" style="border:none;border-radius:0;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Émetteur</th>
                            <th>Bénéficiaire</th>
                            <th>Montant</th>
                            <th>Frais</th>
                            <th>Commission</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transfertsAutres as $t): ?>
                            <tr>
                                <td class="mono cell-primary"><?= esc($t['numero_emetteur']) ?></td>
                                <td class="mono"><?= esc($t['numero_receveur']) ?></td>
                                <td class="amount"><?= number_format($t['montant'], 0, ',', ' ') ?> Ar</td>
                                <td class="amount amount--pos">+<?= number_format($t['frais'], 0, ',', ' ') ?> Ar</td>
                                <td class="amount amount--pos">+<?= number_format($t['commission'], 0, ',', ' ') ?> Ar</td>
                                <td class="text-sm text-muted"><?= esc($t['date_operation']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?= $pagerTransfertsAutres->links('transfertsAutres', 'custom') ?>
        </div>
    </div>

    <div class="card">
        <div class="card__header">
            <h3>Retraits</h3>
        </div>
        <div class="card__body" style="padding-bottom:0;">
            <div class="table-wrap" style="border:none;border-radius:0;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Émetteur</th>
                            <th>Montant</th>
                            <th>Frais</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($retraits as $t): ?>
                            <tr>
                                <td class="mono cell-primary"><?= esc($t['numero_emetteur']) ?></td>
                                <td class="amount"><?= number_format($t['montant'], 0, ',', ' ') ?> Ar</td>
                                <td class="amount amount--pos">+<?= number_format($t['frais'], 0, ',', ' ') ?> Ar</td>
                                <td class="text-sm text-muted"><?= esc($t['date_operation']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?= $pagerRetraits->links('retraits', 'custom') ?>
        </div>
    </div>

</div>

<?= $this->include('includes/footer') ?>