<main id="main" name="main">
    <form action="<?php echo site_url('slot/liste')?>" method="get">
        <div class="row mb-3">
            <span>Entrer deux dates</span>
            <label for="inputDate" class="col-sm-2 col-form-label">Entrer une date </label>
            <div class="col-sm-10">
                <input type="date" name="date1" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>
</main>