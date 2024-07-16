<main id="main" class="main">
<div class="pagetitle">
                <h1>Paiement</h1>
            </div>
            <div>
                <form action="<?php echo site_url('devis/insertPaiement/'.$rdv['Id_Rdv'])?>" method="post">
                    <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Date paiement</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>
                <form>
</main>