<div class="card w-50 mx-auto border-0 bg-transparent">
    <div class="card-body text-start px-2">
        <h5 class="card-title h2">URL Click Counter</h5>
        <p class="card-text text-start text-nowrap">Enter the URL to track how many clicks it received.</p>
    </div>
</div>

<div class="card w-50 mx-auto">
    <div class="card-body">
        <form method="post" action="/url/track" class="d-flex">
            <input type="text" name="m" class="form-control me-1 py-3" placeholder="Enter here your minimized URL" required>
            <button type="submit" class="btn btn-primary w-25 py-3">Track Clicks</button>
        </form>
        <p class="card-text mt-2 text-start">
            Example: <?= $host; ?>/AbCdE
        </p>
    </div>
</div>
