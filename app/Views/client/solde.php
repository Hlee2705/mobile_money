<?= $this->include('includes/header') ?>

<div style="text-align:center; margin-bottom: var(--space-6);">
    <span class="eyebrow">
        Mon compte
    </span>
    <h1>
        Mon solde
    </h1>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert--danger" style="max-width:400px; margin:0 auto var(--space-5);">
        <div><?= session()->getFlashdata('error') ?></div>
    </div>
<?php endif; ?>

<div class="card" style="max-width:400px; margin:0 auto;">
    <div class="card__body" style="text-align:center;">
        <div class="stat-card">
            <div class="stat-card__label">
                Votre solde actuel est
            </div>
            <div class="amount-lg mono" style="font-size:28px;">
                <?= number_format($solde, 0, ',', ' ') ?> Ar
            </div>
        </div>
    </div>
</div>

<div style="text-align:center; margin-top: var(--space-4);">
    <a href="<?= base_url('/dashboard') ?>" class="btn btn--ghost btn--sm">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Retour
    </a>
</div>

<?= $this->include('includes/footer') ?>