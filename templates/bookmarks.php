<?php if (empty($items)): ?>

    <p class="alert alert-info"><?= t('No bookmark') ?></p>

<?php else: ?>

    <div class="page-header">
        <h2><?= t('Bookmarks') ?> (<?= $nb_items ?>)</h2>
    </div>

    <section class="items">
    <?php foreach ($items as $item): ?>
        <?php $item_id = Model\encode_item_id($item['id']) ?>
        <article id="item-<?= $item_id ?>" data-item-id="<?= $item_id ?>" class="<?= $item['status'] == 'read' ? 'item-status-read' : '' ?>">
            <h2>
                <a
                    href="?action=show&amp;id=<?= $item_id ?>"
                    id="open-<?= $item_id ?>"
                >
                    <?= Helper\escape($item['title']) ?>
                </a>
            </h2>
            <p>
                <?= Helper\get_host_from_url($item['url']) ?> |
                <?= dt('%e %B %Y %k:%M', $item['updated']) ?> |
                <a href="?action=bookmark&amp;value=0&amp;id=<?= $item_id ?>&amp;redirect=bookmarks"><?= t('remove bookmark') ?></a> |
                <a
                    href="<?= $item['url'] ?>"
                    id="original-<?= $item_id ?>"
                    rel="noreferrer"
                    target="_blank"
                    data-item-id="<?= $item_id ?>"
                >
                    <?= t('original link') ?>
                </a>
            </p>
        </article>
    <?php endforeach ?>

    <nav id="items-paging">
    <?php if ($offset > 0): ?>
        <a id="previous-page" href="?action=bookmarks&amp;offset=<?= ($offset - ITEMS_PER_PAGE) ?>">⇽ <?= t('Previous page') ?></a>
    <?php endif ?>
    &nbsp;
    <?php if (($nb_items - $offset) > ITEMS_PER_PAGE): ?>
        <a id="next-page" href="?action=bookmarks&amp;offset=<?= ($offset + ITEMS_PER_PAGE) ?>"><?= t('Next page') ?> ⇾</a>
    <?php endif ?>
    </nav>

    </section>

<?php endif ?>