<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="book_block col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <script id="pattern" type="text/template">
                <div data-book-id="{id}" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
                    <div class="book">
                        <a href="/book/{id}"><img src="img/books/{id}.jpg" alt="{title}">
                            <div data-title="{title}" class="blockI">
                                <div data-book-title="{title}" class="title size_text">{title}</div>
                                <div data-book-author="{author}" class="author">{author}</div>
                            </div>
                        </a>
                        <a href="/book/{id}">
                            <button type="button" class="details btn btn-success">Читать</button>
                        </a>
                    </div>
                </div>
            </script>
            <form name="bookForm">
                <div id="id" value=<?= $oneBook["id"] ?>>
                    <div id="bookImg" class="col-xs-12 col-sm-3 col-md-3 item" style="margin:;">
                        <img src="/public/images/<?= "{$oneBook["image_name"]}" ?>"
                             alt="Responsive image" class="img-responsive">
                        <hr>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 info">
                        <div class="bookInfo col-md-12">
                            <div id="title" class="titleBook"><?= $oneBook["name"] ?></div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="bookLastInfo">
                                <div class="bookRow"><span class="properties">автор:</span><span
                                        id="author"><?= $oneBook["author"] ?></span></div>
                                <div class="bookRow"><span class="properties">год:</span><span
                                        id="year"><?= $oneBook["publication_date"] ?></span></div>
                                <div class="bookRow"><span class="properties">страниц:</span><span
                                        id="pages"><?= $oneBook["pages_count"] ?></span></div>
                                <div class="bookRow"><span class="properties">isbn:</span><span
                                        id="isbn"><?= $oneBook["isbn"] ?></span></div>
                            </div>
                        </div>
                        <div class="btnBlock col-xs-12 col-sm-12 col-md-12">
                            <button id="btnWantRead" type="button" value="<?= $oneBook["id"] ?>" class="btnBookID btn-lg btn btn-success">Хочу читать!</button>
                        </div>
                        <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-xs hidden-sm">
                            <h4>О книге</h4>
                            <hr>
                            <p id="description"><?= $oneBook["about_book"] ?></p>
                        </div>
                    </div>
                    <div class="bookDescription col-xs-12 col-sm-12 col-md-12 hidden-md hidden-lg">
                        <h4>О книге</h4>
                        <hr>
                        <p class="description"><?= $oneBook["about_book"] ?></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>