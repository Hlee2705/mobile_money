<?= $this->include('includes/header') ?>

<div style="margin-bottom: var(--space-6);">
    <span class="eyebrow">
        Clients
    </span>
    <h1>
        Liste des clients
    </h1>
</div>

<div class="card">
    <div class="table-wrap" style="border:none;">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Numéro
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr>
                        <td class="cell-primary mono">
                            <?= esc($client['numero']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('includes/footer') ?>