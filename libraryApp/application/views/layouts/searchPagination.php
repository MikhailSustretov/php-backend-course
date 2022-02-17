<div>
    <nav aria-label="Books list pagination" class="text-center">
        <ul class="pager">
            <?php if ($offset > 0): ?>
                <li><a href="http://libraryServer/?search=<?= $_GET['search']; ?>&offset=<?= $offset - $limit; ?>">
                        Предыдущая</a></li>
            <?php endif; ?>

            <?php if ($booksCount > $offset + $limit): ?>
            <li>
                <a href="http://libraryServer/?search=<?= $_GET['search']; ?>&offset=<?=$offset + $limit; ?>">Следующая</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</div>