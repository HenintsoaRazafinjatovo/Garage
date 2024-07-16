<main id="main" class="main">
    <div class="pagetitle">
        <h1>Import donnees</h1>
    </div>
            <div>
                <form action="<?php echo site_url('')?>" method="post">
                    <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Services</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Travaux</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>

                </form>
            </div>
</main>