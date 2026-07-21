<?= $this->include('includes/header') ?>

<div style="margin-bottom: var(--space-6);">
    <span class="eyebrow">
        Opérations
    </span>
    <h1>
        Historique des opérations
    </h1>
</div>

<div class="card">
    <div class="table-wrap" style="border:none;">
        <table class="table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Receveur</th>
                    <th>Montant</th>
                    <th>Frais</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($historique)): ?>
                    <tr>
                        <td colspan="5" class="text-muted text-sm" style="text-align:center; padding: var(--space-6);">
                            Aucune opération.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($historique as $operation): ?>
                        <?php
                        $libelle = $operation['libelle'];
                        $badgeClass = match (strtolower($libelle)) {
                            'depot'     => 'badge--success',
                            'retrait'   => 'badge--warning',
                            'transfert' => 'badge--info',
                            default     => 'badge--neutral',
                        };
                        ?>
                        <tr>
                            <td>
                                <span class="badge <?= $badgeClass ?>">
                                    <?= ucfirst($libelle) ?>
                                </span>
                            </td>
                            <td class="mono">
                                <?= $operation['numero_receveur'] ?? '-' ?>
                            </td>
                            <td class="cell-primary mono">
                                <?= number_format($operation['montant'], 0, ',', ' ') ?> Ar
                            </td>
                            <td class="mono text-muted">
                                <?= number_format($operation['frais'], 0, ',', ' ') ?> Ar
                            </td>
                            <td class="text-muted">
                                <?= $operation['date_operation'] ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('includes/footer') ?>