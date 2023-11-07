<div class="card w-50 mx-auto border-0 bg-transparent">
    <div class="card-body text-start px-2">
        <h5 class="card-title h2">Your minimized URL</h5>
        <p class="card-text text-start text-nowrap">Copy the shortened link and share it in messages, texts, posts, websites and other locations.</p>
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

<script>
    document.getElementById("minimizedUrlCopyButton").addEventListener("click", function(e) {
        e.preventDefault();

        const inputField = document.getElementById("minimizedUrlInput");

        inputField.select();
        document.execCommand("copy");
        inputField.setSelectionRange(0, 0);

        const initialBtnTextContent = this.textContent;

        setTimeout(() => {
            this.textContent = initialBtnTextContent;
        }, 3000);

        this.textContent = "Copied!";
    });
</script>
