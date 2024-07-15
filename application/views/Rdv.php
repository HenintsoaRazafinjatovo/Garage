    
        <main id="main" class="main">
            <div class="pagetitle">
                <h1>Prendre rendez-vous</h1>
            </div>
            <div>
                <form action="<?php echo site_url('rdv/demandeRdv')?>" meyhod="post">
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Date </label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Heure debut</label>
                        <div class="col-sm-10">
                            <input type="time" name="heure" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Type de service</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="type" aria-label="Default select example">
                        <option selected>Choisissez votre type de service</option>
                        <?php foreach ($services as $key => $value) { ?>
                            
                        
                        <option value="<?php echo $value['Id_Client'] ?>"><?php echo $value['intitule'] ?></option>
                        
                        <?php } ?>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </div>

                </form>
        </main>

        