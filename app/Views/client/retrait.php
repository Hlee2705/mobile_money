<?= $this->include('includes/header') ?>

<div style="text-align:center; margin-bottom: var(--space-6);">
    <span class="eyebrow">
        Opération
    </span>
    <h1>
        Effectuer un retrait
    </h1>
    <p class="text-muted text-sm" style="margin:0;">
        Retirez des fonds depuis votre compte ValsMobile.
    </p>
</div>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert--danger" style="margin-bottom: var(--space-5);">
        <div><?= session()->getFlashdata('error') ?></div>
    </div>
<?php endif; ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert--success" style="margin-bottom: var(--space-5);">
        <div><?= session()->getFlashdata('success') ?></div>
    </div>
<?php endif; ?>

<div class="card" style="max-width:480px; margin:0 auto;">
    <div class="card__body">
        <form method="post" action="<?= base_url('/retrait/effectuer') ?>">
            <div class="form-group">
                <label class="form-label">
                    Montant
                </label>
                <div class="input-affix">
                    <span class="affix affix--right">
                        Ar
                    </span>
                    <input
                        type="number"
                        name="montant"
                        class="form-control"
                        placeholder="0"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn--primary btn--block">
                Retirer
            </button>
        </form>
    </div>
</div>

<div style="text-align:center; margin-top: var(--space-4);">
    <a href="<?= base_url('/dashboard') ?>" class="btn btn--ghost btn--sm">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Retour
    </a>
</div>

<?= $this->include('includes/footer') ?>