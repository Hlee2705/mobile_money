<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= isset($title) ? $title . ' — TanaPay' : 'TanaPay — Espace opérateur' ?></title>
<link rel="stylesheet" href="<?= base_url('assets/css/design-system.css') ?>">
</head>
<body>

<?php $active = $active ?? ''; ?>

<div class="app-shell">

  <aside class="sidebar">
    <div class="sidebar__brand">
      <div class="sidebar__brand-mark">TP</div>
      <div>
        <div class="sidebar__brand-name">TanaPay</div>
        <div class="sidebar__brand-sub">Espace opérateur</div>
      </div>
    </div>

    <nav>
      <div class="nav-section-label">Général</div>
      <a class="nav-link <?= $active === 'dashboard' ? 'is-active' : '' ?>" href="<?= base_url('dashboard') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/></svg>
        <span class="nav-link__label">Tableau de bord</span>
      </a>
      <a class="nav-link <?= $active === 'transactions' ? 'is-active' : '' ?>" href="<?= base_url('transactions') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 7l4-4 4 4M7 3v13"/><path d="M21 17l-4 4-4-4M17 21V8"/></svg>
        <span class="nav-link__label">Transactions</span>
      </a>
      <a class="nav-link <?= $active === 'beneficiaires' ? 'is-active' : '' ?>" href="<?= base_url('beneficiaires') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="3.2"/><path d="M5 20c0-3.9 3.1-6.5 7-6.5s7 2.6 7 6.5"/></svg>
        <span class="nav-link__label">Bénéficiaires</span>
      </a>
      <a class="nav-link <?= $active === 'comptes' ? 'is-active' : '' ?>" href="<?= base_url('comptes') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2.5" y="5" width="19" height="14" rx="2"/><path d="M2.5 9.5h19"/></svg>
        <span class="nav-link__label">Cartes &amp; comptes</span>
      </a>

      <div class="nav-section-label">Suivi</div>
      <a class="nav-link <?= $active === 'rapports' ? 'is-active' : '' ?>" href="<?= base_url('rapports') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19V9M12 19V5M20 19v-7"/></svg>
        <span class="nav-link__label">Rapports</span>
      </a>
      <a class="nav-link <?= $active === 'historique' ? 'is-active' : '' ?>" href="<?= base_url('historique') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 8v5l3 2"/><circle cx="12" cy="12" r="9"/></svg>
        <span class="nav-link__label">Historique</span>
      </a>
      <a class="nav-link <?= $active === 'parametres' ? 'is-active' : '' ?>" href="<?= base_url('parametres') ?>">
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="3"/><path d="M4 12h2m12 0h2M12 4v2m0 12v2M6.3 6.3l1.4 1.4m8.6 8.6l1.4 1.4M6.3 17.7l1.4-1.4m8.6-8.6l1.4-1.4"/></svg>
        <span class="nav-link__label">Paramètres</span>
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
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 8a6 6 0 10-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 01-3.4 0"/></svg>
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="17" rx="2"/><path d="M3 10h18M8 3v3M16 3v3"/></svg>
        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </div>
    </div>

    <div class="main__content">
