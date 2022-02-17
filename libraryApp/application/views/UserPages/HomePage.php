<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php foreach ($booksList as $oneBook): ?>
                <form id="booksForm">
                    <div data-book-id="<?= $oneBook["id"] ?>"
                         class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                        <div class="book">
                            <a href="/books/<?= $oneBook["id"] ?>" onclick="increaseViewsCounter(<?= $oneBook["id"] ?>)"><img
                                    src="public/images/<?= $oneBook["image_name"] ?>"
                                    alt="<?= $oneBook["name"] ?>">
                                <div data-title="<?= $oneBook["name"] ?>" class="blockI" style="height: 46px;">

                                    <div data-book-title="<?= $oneBook["name"] ?>"
                                         class="title size_text"><?= $oneBook["name"] ?></div>

                                    <div data-book-author="<?= $oneBook["author"] ?>" class="author">
                                        <?= $oneBook["author"] ?>
                                    </div>

                                </div>
                            </a>
                            <a href="/books/<?= $oneBook["id"] ?>">
                                <button type="button" id="<?= $oneBook["id"] ?>" class="btn btn-success"
                                        onclick="increaseViewsCounter(<?= $oneBook["id"] ?>)">
                                    Читать</button>
                            </a>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?></div>
    </div>
</section>