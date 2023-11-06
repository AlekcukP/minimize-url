<div class="card w-50 mx-auto border-0 bg-transparent">
    <div class="card-body text-start">
        <h5 class="card-title h2">Total URL Clicks</h5>
        <p class="card-text text-start text-nowrap">The number of clicks from the shortened URL that redirected the user to the destination page.</p>
    </div>
</div>

<div class="card w-50 mx-auto">
    <div class="card-body">
        <form class="d-flex">
            <input id="minimizedUrlInput" type="text" class="form-control me-1 py-3" value="<?= $minimized_url; ?>" required>
            <button id="minimizedUrlCopyButton" class="btn btn-primary w-25 py-3">Copy URL</button>
        </form>
        <p class="card-text mt-4 text-start">
            Expires: <?= $expires_at; ?>
        </p>
        <p class="card-text text-start">
            Long URL: <a href="<?= $original_url; ?>"><?= $original_url; ?></a>
        </p>
        <a href="/url/count/<?= $url_key; ?>" class="btn btn-primary">Total of clicks of your short URL</a>
        <a href="/" class="btn btn-primary">Shorten another URL</a>
    </div>
</div>