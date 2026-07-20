<?php if ($pager->getPageCount($group) > 1): ?>
    <div class="pagination">
        <button <?= !$pager->hasPreviousPage($group) ? 'disabled' : '' ?> onclick="location.href='<?= $pager->getPreviousPageURI($group) ?>'">‹</button>
        <?php for ($i = 1; $i <= $pager->getPageCount($group); $i++): ?>
            <button class="<?= $i === $pager->getCurrentPage($group) ? 'is-active' : '' ?>" onclick="location.href='<?= $pager->getPageURI($i, $group) ?>'"><?= $i ?></button>
        <?php endfor; ?>
        <button <?= !$pager->hasNextPage($group) ? 'disabled' : '' ?> onclick="location.href='<?= $pager->getNextPageURI($group) ?>'">›</button>
    </div>
<?php endif; ?>