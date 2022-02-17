<nav aria-label="pagination admin books" class="text-center">
    <form action="" method="post">
        <ul class="pagination pagination-lg justify-content-center">
            <?php for ($i = 0; $i < ceil($booksCount / $limit); $i++): ?>
                <li class="page-item"><a class="page-link"
                                         href="?offset=<?= $i * $limit ?>"><?= $i + 1 ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </form>
</nav>