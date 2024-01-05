<div class="col-12 col-lg-11 col-xl-9 col-xxl-8 mx-3 mx-sm-auto border-0 bg-transparent">
    <div class="text-center text-sm-start px-2">
        <h2 class="display-5 fw-medium text-secondary-emphasis">Your minimized URL</h2>
        <p class="text-start">
            Copy the shortened link and share it in messages, texts, posts, websites and other locations.
        </p>
    </div>
</div>

<div class="col-11 col-sm-12 col-lg-11 col-xl-9 col-xxl-8 border bg-white rounded mx-auto">
    <div class="container-fluid py-2 px-0">
        <form name="minimizedUrlForm" class="row">
            <div class="col-12 col-sm-9 col-md-9 mb-1 mb-sm-0">
                <input
                    name="url"
                    type="text"
                    class="form-control py-3 w-100"
                    value="<?= $minimized_url; ?>"
                    required
                    >
            </div>
            <div class="col-12 col-sm-3 col-md-3">
                <button name="btn" type="submit" class="btn btn-primary py-3 w-100">
                    Copy URL
                </button>
            </div>
        </form>
        <div class="row">
            <p class="mt-4 text-start col-12">
                Expires: <?= $expires_at; ?>
            </p>
            <p class="text-start col-12 text-break">
                Long URL: <a href="<?= $original_url; ?>"><?= $original_url; ?></a>
            </p>
        </div>
        <div class="row">
            <div class="col-12 col-sm-7 col-md-8 mb-1 mb-sm-0">
                <a href="/url/count/<?= $url_key; ?>" class="btn btn-primary w-100">
                    Total of clicks of your short URL
                </a>
            </div>
            <div class="col-12 col-sm-5 col-md-4">
                <a href="/" class="btn btn-primary w-100">Shorten another URL</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.forms.minimizedUrlForm.addEventListener("submit", function (e) {
        e.preventDefault();

        this.url.select();
        document.execCommand("copy");
        this.url.setSelectionRange(0, 0);

        setTimeout(() => {
            this.btn.textContent = "Copy URL";
            this.btn.classList.remove("btn-success");
        }, 1500);

        this.btn.classList.add("btn-success");
        this.btn.textContent = "Copied!";
    });
</script>
