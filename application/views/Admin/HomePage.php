<section id="main" class="main-wrapper">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="text-center">
            <label>Все книги:</label>
        </div>
        <hr>

        <table class="table table-striped table-bordered">
            <thead>
            <tr class="row">
                <th scope="col">Название книги</th>
                <th scope="col">Авторы</th>
                <th scope="col">Год</th>
                <th scope="col">Действия</th>
                <th scope="col">Кликов</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($booksList as $oneBook): ?>
                <tr class="row">
                    <th scope="row"><?= $oneBook["name"] ?></th>
                    <td><?= $oneBook["author"] ?></td>
                    <td><?= $oneBook["publication_date"] ?></td>
                    <td>
                        <button type="button" class="btn btn-danger"
                                onclick="deleteBook(<?= $oneBook["id"] ?>)">Удалить
                        </button>
                    </td>
                    <td><?= $oneBook["number_of_button_clicks"] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <?php require_once 'application/views/layouts/adminPagination.php' ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="text-center">
            <label>Добавить новую книгу:</label>
        </div>
        <hr>
        <form action="admin/addBook" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <label>
                    <input type="text" name="book_name" class="form-control" placeholder="Название книги">
                </label>

                <label>
                    <input type="text" name="publishing_year" class="form-control" placeholder="Год издания">
                </label>

                <label>Загрузить обложку книги:</label>
                <input type="file" class="form-control" id="file" name="book_image"/>
                <script>
                    document.getElementById('file').addEventListener('change', handleFileSelect, false);
                </script>
                <br><span id="output"></span>
                <br>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>

            <div class="form-group col-md-6">
                <label>
                    <input type="text" name="author1" class="form-control" placeholder="автор 1">
                </label>
                <label>
                    <input type="text" name="author2" class="form-control" placeholder="автор 2">
                </label>
                <label>
                    <input type="text" name="author3" class="form-control" placeholder="автор 3">
                </label>
                <label>
                    <textarea class="form-control" name="book_description" rows="8" cols='45'
                              placeholder="описание книги"></textarea>
                </label>
                <label>Оставьте поля пустыми если авторов <3</label>
            </div>
        </form>
    </div>
</section>
