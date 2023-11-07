<div class="card w-50 mx-auto border-0 bg-transparent">
    <div class="card-body text-start px-2">
        <h5 class="card-title h2">Total URL Clicks</h5>
        <p class="card-text text-start text-nowrap">The number of clicks from the shortened URL that redirected the user to the destination page.</p>
    </div>
</div>

<div class="card w-50 mx-auto border-0 bg-transparent">
    <div class="card-body">
        <div class="bg-white text-primary fs-5 w-50 mb-1 py-1">
            <a class="text-decoration-none" href="<?= $minimized_url; ?>"><?= $host_url; ?></a>
        </div>
        <div class="bg-white fs-1 fw-bolder w-25">
            <p><?= $redirects; ?></p>
        </div>
        <a href="/url/counter" class="btn btn-primary">Track clicks from another short URL</a>
        <a href="/" class="btn btn-primary">Shorten another URL</a>
    </div>
</div>
