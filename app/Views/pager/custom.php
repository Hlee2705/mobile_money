<?php if ($pager->getPageCount() > 1): ?>

<div class="pagination">

    <button
        <?= !$pager->hasPrevious() ? 'disabled' : '' ?>
        onclick="location.href='<?= $pager->getPrevious() ?>'">
        ‹
    </button>

    <?php foreach ($pager->links() as $link): ?>
        <button
            class="<?= $link['active'] ? 'is-active' : '' ?>"
            onclick="location.href='<?= $link['uri'] ?>'">
            <?= $link['title'] ?>
        </button>
    <?php endforeach; ?>

    <button
        <?= !$pager->hasNext() ? 'disabled' : '' ?>
        onclick="location.href='<?= $pager->getNext() ?>'">
        ›
    </button>

</div>

<?php endif; ?>