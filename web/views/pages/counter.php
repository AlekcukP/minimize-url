<div class="col-12 col-lg-11 col-xl-9 col-xxl-8 mx-3 mx-sm-auto border-0 bg-transparent">
    <div class="text-center text-sm-start px-2">
        <h2 class="display-5 fw-medium text-secondary-emphasis">URL Click Counter</h2>
        <p class="text-center text-sm-start">Enter the URL to track how many clicks it received.</p>
    </div>
</div>

<div class="col-12 col-lg-11 col-xl-9 col-xxl-8 mx-auto">
    <div class="container-fluid bg-white border rounded py-2">
        <form method="post" action="/url/track" class="row mb-2">
            <div class="col-12 col-sm-8 col-md-9 mb-1 mb-sm-0">
                <input type="text" name="m" class="form-control py-3" placeholder="Enter here your minimized URL" required>
            </div>
            <div class="col-12 col-sm-4 col-md-3">
                <button type="submit" class="btn btn-primary py-3 w-100">Track Clicks</button>
            </div>
        </form>
        <div class="row">
            <p class="col-12 text-start">
                Example: <?= $host; ?>/AbCdE
            </p>
        </div>
    </div>
</div>
