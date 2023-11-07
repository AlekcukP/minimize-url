<div class="card w-50 mx-auto">
    <div class="card-body px-2">
        <h5 class="card-title h2">Paste the URL to be shortened</h5>
        <form method="post" action="/url/minimize" class="d-flex needs-validation">
            <input type="text" placeholder="Enter the link here" name="u" class="form-control me-1 py-3 w-75" required>
            <input
                type="date"
                name="d"
                class="form-control me-1 py-3 w-25 fs-6"
                value="<?= $default_expires_date; ?>"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="Click to select when the minimized URL will expire"
            />
            <button type="submit" class="btn btn-primary w-25 py-3">Minimize URL</button>
        </form>
        <p class="card-text mt-2">
            URL minimizer allows to create a shortened link making it easy to share
        </p>
    </div>
</div>