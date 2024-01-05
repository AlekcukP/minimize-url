<div class="col-12 col-lg-11 col-xl-9 col-xxl-8 mx-3 mx-sm-auto border-0 bg-transparent">
    <div class="text-center text-sm-start px-2">
        <h2 class="display-5 fw-medium text-secondary-emphasis">
            Total URL Clicks
        </h2>
        <p class="text-start">
            The number of clicks from the shortened URL that redirected the user to the destination page.
        </p>
    </div>
</div>

<div class="container-fluid col-11 col-sm-12 col-lg-11 col-xl-9 col-xxl-8 mx-auto">
    <div class="row mb-2">
        <div class="col-12 col-sm-10 display-6 bg-white text-primary py-2 border rounded mb-1 mb-sm-0">
            <a class="text-decoration-none" target="_blank" href="<?= $minimized_url; ?>">
                <?= $host_url; ?>
            </a>
        </div>
        <div class="col-2 col-sm-2 bg-white display-6 fw-bolder border rounded">
            <p style="transform: scale(1.3) translateY(5px);"><?= $redirects; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-7 mb-1 mb-sm-0">
            <a href="/url/counter" class="btn btn-primary w-100">
                Track clicks from another short URL
            </a>
        </div>
        <div class="col-12 col-sm-5">
            <a href="/" class="btn btn-primary w-100">Shorten another URL</a>
        </div>
    </div>
</div>
