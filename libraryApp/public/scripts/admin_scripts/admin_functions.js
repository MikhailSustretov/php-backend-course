const {form} = document.forms;

function addBook(event) {
    event.preventDefault();

    const {elements} = form;
    const values = {};

    for (let i = 0; i < values.length; i++) {
        const formElement = elements[i];
        const {name} = formElement;

        if (name) {
            const {value} = formElement;

            values[name] = value;
        }
    }

    console.log('gets form inf example: ', values);
    console.log('form: ', form);
}

form.addEventListener('submit', addBook);

function logout() {

    // To invalidate a basic auth login:
    //
    // 	1. Call this logout function.
    //	2. It makes a GET request to an URL with false Basic Auth credentials
    //	3. The URL returns a 401 Unauthorized
    // 	4. Forward to some "you-are-logged-out"-page
    // 	5. Done, the Basic Auth header is invalid now

    $.ajax({
        type: "GET",
        url: "http://libraryServer/admin",
        async: false,
        username: "logmeout",
        password: "123456",
        headers: {"Authorization": "Basic xxx"}
    })
        .done(function () {
            // If we don't get an error, we actually got an error as we expect an 401!
        })
        .fail(function () {
            // We expect to get an 401 Unauthorized error! In this case we are successfully
            // logged out and we redirect the user.
            window.location = "/admin";
        });

    return false;
}

function deleteBook(idBook) {

    let myJson = JSON.stringify({id: idBook});
    $.ajax({
        type: "DELETE",
        url: "http://libraryServer/admin/delete",
        dataType: 'json',
        data: myJson,
        contentType: 'application/json; charset=utf-8'
    })
        .done(function () {
                location.href = location.href;
        })
}