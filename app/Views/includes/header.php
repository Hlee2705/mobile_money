<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($title) ? $title . ' - ValsMobile' : 'ValsMobile' ?></title>
  <link rel="stylesheet" href="<?= base_url('template/design-system.css') ?>">
</head>

<body>

  <?php $active = $active ?? ''; ?>

  <div class="app-shell">

    <aside class="sidebar">
      <div class="sidebar__brand">
        <div class="sidebar__brand-mark">VM</div>
        <div>
          <div class="sidebar__brand-name">ValsMobile</div>
          <div class="sidebar__brand-sub">Espace opérateur</div>
        </div>
      </div>

      <nav>
        <div class="nav-section-label">Préfixe</div>
        <a class="nav-link <?= $active === 'prefixe-nouveau' ? 'is-active' : '' ?>" href="<?= base_url('prefixe/create') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 5v14M5 12h14" />
          </svg>
          <span class="nav-link__label">Nouveau</span>
        </a>
        <a class="nav-link <?= $active === 'prefixe-liste' ? 'is-active' : '' ?>" href="<?= base_url('prefixes') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M4 6h16M4 12h16M4 18h10" />
          </svg>
          <span class="nav-link__label">Liste</span>
        </a>

        <div class="nav-section-label">Frais</div>
        <a class="nav-link <?= $active === 'frais-nouveau' ? 'is-active' : '' ?>" href="<?= base_url('frais/create') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 5v14M5 12h14" />
          </svg>
          <span class="nav-link__label">Nouveau</span>
        </a>
        <a class="nav-link <?= $active === 'frais-baremes' ? 'is-active' : '' ?>" href="<?= base_url('frais') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M4 19V9M12 19V5M20 19v-7" />
          </svg>
          <span class="nav-link__label">Barèmes</span>
        </a>

        <div class="nav-section-label">Compte</div>
        <a class="nav-link <?= $active === 'compte-clients' ? 'is-active' : '' ?>" href="<?= base_url('compte/clients') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <circle cx="12" cy="8" r="3.2" />
            <path d="M5 20c0-3.9 3.1-6.5 7-6.5s7 2.6 7 6.5" />
          </svg>
          <span class="nav-link__label">Liste des clients</span>
        </a>
        <a class="nav-link <?= $active === 'compte-solde' ? 'is-active' : '' ?>" href="<?= base_url('compte/solde') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="2.5" y="5" width="19" height="14" rx="2" />
            <path d="M2.5 9.5h19" />
          </svg>
          <span class="nav-link__label">Solde</span>
        </a>
        <a class="nav-link <?= $active === 'compte-historique' ? 'is-active' : '' ?>" href="<?= base_url('compte/historique') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 8v5l3 2" />
            <circle cx="12" cy="12" r="9" />
          </svg>
          <span class="nav-link__label">Historique</span>
        </a>

        <div class="nav-section-label">Opération</div>
        <a class="nav-link <?= $active === 'operation-depot' ? 'is-active' : '' ?>" href="<?= base_url('depot') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 19V5M6 11l6-6 6 6" />
          </svg>
          <span class="nav-link__label">Faire un dépôt</span>
        </a>
        <a class="nav-link <?= $active === 'operation-transfert' ? 'is-active' : '' ?>" href="<?= base_url('transfert') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M3 7l4-4 4 4M7 3v13" />
            <path d="M21 17l-4 4-4-4M17 21V8" />
          </svg>
          <span class="nav-link__label">Faire un transfert</span>
        </a>
        <a class="nav-link <?= $active === 'operation-retrait' ? 'is-active' : '' ?>" href="<?= base_url('retrait') ?>">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 5v14M6 13l6 6 6-6" />
          </svg>
          <span class="nav-link__label">Faire un retrait</span>
        </a>
      </nav>

      <div class="sidebar__footer">
        <div class="sidebar__user row">
          <div class="avatar avatar--dark"><?= isset($userInitials) ? esc($userInitials) : 'RH' ?></div>
          <div>
            <div class="sidebar__user-name"><?= isset($userName) ? esc($userName) : 'Rina H.' ?></div>
            <div class="sidebar__user-role"><?= isset($userRole) ? esc($userRole) : 'Agent guichet' ?></div>
          </div>
        </div>
      </div>
    </aside>

    <div class="main">

      <div class="topbar">
        <div class="row" style="gap:10px;">
          <div class="sidebar__brand-mark" style="width:30px;height:30px;font-size:12px;">TP</div>
          <strong style="color:#fff;font-family:var(--font-display);font-size:14px;">TanaPay</strong>
        </div>
        <div class="topbar__icons">
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9" />
            <path d="M13.7 21a2 2 0 01-3.4 0" />
          </svg>
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <rect x="3" y="4" width="18" height="17" rx="2" />
            <path d="M3 10h18M8 3v3M16 3v3" />
          </svg>
          <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </div>
      </div>

      <div class="main__content">