<div class="bg-white border rounded col-11 col-lg-10 col-xl-9 col-xxl-8 mx-auto">
    <div class="container px-0 py-2">
        <div class="row">
            <h2 class="col-12">Paste the URL to be shortened</h2>
        </div>
        <form method="post" action="/url/minimize" class="row mb-2">
            <div class="col-xl-7 col-lg-7 col-md-8 col-sm-12 col-12 mb-sm-1 mb-1">
                <input type="text" placeholder="Enter the link here" name="u" class="form-control py-3" required>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mb-md-2 mb-sm-1 mb-1">
                <input
                    type="date"
                    name="d"
                    class="form-control py-3 fs-6"
                    value="<?= $default_expires_date; ?>"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="Click to select when the minimized URL will expire"
                />
            </div>
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-12 mb-sm-1 mb-1">
                <button type="submit" class="btn btn-primary py-3 w-100">Minimize</button>
            </div>
        </form>
        <div class="row">
            <p class="col-12 mb-0">
                URL minimizer allows to create a shortened link making it easy to share
            </p>
        </div>
    </div>
</div>
