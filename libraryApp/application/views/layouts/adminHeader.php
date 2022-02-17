<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>shpp-library</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="library Sh++">

    <script src="/public/scripts/admin_scripts/admin_functions.js"></script>
    <link rel="stylesheet" href="/public/styles/books_styles/libs.min.css">
    <link rel="stylesheet" href="/public/styles/books_styles/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function handleFileSelect(evt) {
            let file = evt.target.files; // FileList object
            let f = file[0];
            // Only process image files.
            if (!f.type.match('image.*')) {
                alert("Image only please....");
            }
            let reader = new FileReader();
            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    let span = document.getElementById('output');
                    span.innerHTML = ['<img class="thumb" width="50%" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          crossorigin="anonymous"/>

    <link rel="shortcut icon" href="http://localhost:3000/favicon.ico">
    <style>
        .details {
            display: none;
        }
    </style>
</head>

<body data-gr-c-s-loaded="true" class="">

<section id="header" class="header-wrapper">
    <nav class="navbar">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="navbar-brand">
                Библиотека++
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <span class="pull-right">
                <button type="button" class="btn btn-light btn-lg" onclick="logout()">Выход</button>
            </span>
        </div>
    </nav>
</section>