<!DOCTYPE html>
<html lang="en">

<head>
    <title>URL Minimizer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light vh-100">

    <header class="container-fluid bg-white border-bottom mb-4">
        <h1 class="lh-lg text-center text-primary fw-bold m-0">URL Minimizer</h1>
    </header>

    <main class="container bg-3 text-center">
        <?= $content; ?>
    </main>
    <br>

    <footer class="container-fluid bg-dark py-2">
        <p class="text-white mx-auto my-0 text-center">© 2023 MinimizeUrl.test - Tool to shorten a long link</p>
        <ul class="nav justify-content-center fw-bolder">
            <li class="nav-item">
                <a class="nav-link" href="/">ShortURL</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">URL Click Counter</a>
            </li>
        </ul>
    </footer>

</body>

</html>
