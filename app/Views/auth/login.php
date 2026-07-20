<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ValsMobile — Connexion</title>
    <link rel="stylesheet" href="<?= base_url('template/design-system.css') ?>">
</head>

<body>
    <div style="min-height:100vh; display:flex; align-items:center; justify-content:center; padding: var(--space-5);">
        <div class="card" style="width:100%; max-width:400px;">
            <!-- Logo + titre -->
            <div class="card__header" style="justify-content:flex-start;">
                <div class="row" style="gap: var(--space-3);">
                    <div class="sidebar__brand-mark" style="background: var(--color-primary); color: var(--color-white);">
                        VM
                    </div>
                    <div>
                        <h2>
                            ValsMobile
                        </h2>
                        <p class="text-sm text-muted" style="margin:0;">
                            Mobile Money sécurisé
                        </p>
                    </div>
                </div>
            </div>
            <!-- Formulaire -->
            <div class="card__body">
                <div style="margin-bottom: var(--space-5);">
                    <h3>
                        Bienvenue
                    </h3>
                    <p class="text-muted text-sm" style="margin:0;">
                        Entrez votre numéro de téléphone pour accéder à votre compte.
                    </p>
                </div>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert--danger" style="margin-bottom: var(--space-4);">
                        <div><?= session()->getFlashdata('error') ?></div>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('/login') ?>">
                    <div class="form-group">
                        <label class="form-label">
                            Numéro de téléphone
                        </label>
                        <div class="input-affix">
                            <!-- <span class="affix">
                            +261
                        </span> -->
                            <input
                                type="text"
                                name="numero"
                                class="form-control"
                                placeholder="0330000000"
                                value="<?= old('numero') ?>"
                                autocomplete="tel"
                                required>
                        </div>
                        <div class="form-hint">
                            Exemple : 0330000000 ou 0371234567
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="btn btn--primary btn--block">
                        Se connecter
                    </button>
                </form>
            </div>
            <!-- Footer -->
            <div class="card__footer" style="text-align:center;">
                <span class="text-xs text-muted">
                    ValsMobile © <?= date('Y') ?>
                </span>
            </div>
        </div>
    </div>
</body>

</html>