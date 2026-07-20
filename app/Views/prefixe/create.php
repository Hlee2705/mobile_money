<?= $this->include('includes/header') ?>

<div class="main__content">

    <div class="row row--between row--wrap" style="margin-bottom: var(--space-6);">
        <div>
            <span class="eyebrow">Administration</span>
            <h1>Créer un préfixe téléphonique</h1>
            <p class="text-muted text-sm" style="margin:0;">
                Ajoutez un nouveau préfixe utilisé par les opérateurs Mobile Money.
            </p>
        </div>
    </div>

    <?php if (session('success')): ?>
        <div class="alert alert--success" style="margin-bottom:var(--space-5);">
            <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M4 12l5 5L20 6"/>
            </svg>
            <div>
                <span class="alert__title">Succès</span>
                <?= session('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container-grid">

        <!-- Formulaire -->
        <div class="card">

            <div class="card__header">
                <h3>Nouveau préfixe</h3>
            </div>

            <form action="<?= site_url('/prefixe/store') ?>" method="post">

                <?= csrf_field() ?>

                <div class="card__body">

                    <div class="form-group">
                        <label class="form-label">
                            Code téléphonique
                        </label>

                        <input
                                class="form-control <?= session('errors')['code'] ?? false ? 'is-error' : '' ?>"
                                type="text"
                                name="code"
                                value="<?= old('code') ?>"
                                placeholder="+261">

                        <?php if(session('errors')['code'] ?? false): ?>
                            <div class="form-hint is-error">
                                <?= session('errors')['code'] ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">

                        <label class="form-label">
                            Libellé
                        </label>

                        <input
                                class="form-control <?= session('errors')['libelle'] ?? false ? 'is-error' : '' ?>"
                                type="text"
                                name="libelle"
                                value="<?= old('libelle') ?>"
                                placeholder="Madagascar">

                        <?php if(session('errors')['libelle'] ?? false): ?>
                            <div class="form-hint is-error">
                                <?= session('errors')['libelle'] ?>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

                <div class="card__footer row row--between">

                    <span class="text-xs text-muted">
                        Le code doit contenir uniquement des chiffres et éventuellement le caractère "+".
                    </span>

                    <div class="row">
                        <button type="reset" class="btn btn--outline">
                            Réinitialiser
                        </button>

                        <button type="submit" class="btn btn--primary">
                            Enregistrer
                        </button>
                    </div>

                </div>

            </form>

        </div>

        <!-- Panneau d'information -->
        <div class="stack">

            <div class="alert alert--info">
                <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="9"/>
                    <path d="M12 8h.01M11 12h1v5h1"/>
                </svg>

                <div>
                    <span class="alert__title">Conseil</span>

                    Utilisez le format international des indicatifs
                    (+261, +33, +1, +225...).
                </div>
            </div>

            <div class="puce-box">

                <h4 style="margin-bottom:12px;">
                    Bonnes pratiques
                </h4>

                <ul class="puce-list puce-list--success">
                    <li>Chaque code doit être unique.</li>
                    <li>Ne pas ajouter d'espaces.</li>
                    <li>Utiliser le format international.</li>
                    <li>Le libellé doit correspondre au pays ou à la zone.</li>
                </ul>

            </div>

        </div>

    </div>

</div>

<?= $this->include('includes/footer') ?>