function increaseViewsCounter(bookId) {

    let request = JSON.stringify({"bookId": bookId});

    $.ajax({
        type: "POST",
        url: "http://libraryServer/increasePageViewsCount",
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        data: request,
    })
        .done(function () {
        })
        .fail(function () {
        alert('problems found')
    });

}

$('.btnBookID').click(function (event) {
    {
        let bookId = document.getElementById("btnWantRead").value;

        let request = JSON.stringify({"bookId": bookId});
        $.ajax({
            type: "POST",
            url: "http://libraryServer/increaseClickCount",
            headers: {'Content-Type': 'application/json'},
            dataType: 'json',
            data: request,
        })
            .done(function () {
                alert(
                    "Книга свободна и ты можешь прийти за ней." +
                    " Наш адрес: г. Кропивницкий, переулок Васильевский 10, 5 этаж." +
                    " Лучше предварительно прозвонить и предупредить нас, чтоб " +
                    " не попасть в неловкую ситуацию. Тел. 099 196 24 69"
                );
            });
    }

});
