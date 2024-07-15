<main id="main" class="main">
            <div class="pagetitle">
                <h1>Insert rendez-vous</h1>
            </div>
            <div>
                <form action="<?php echo site_url(' ')?>" meyhod="post">
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Id </label>
                        <div class="col-sm-10">
                            <input type="number" name="id" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Heure</label>
                        <div class="col-sm-10">
                            <input type="number" name="heure" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Type de service</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="type" aria-label="Default select example">
                            <option selected>Choisir type de service</option>
                            <?php foreach ($services as $key => $value) { ?>
                                
                            
                            <option value="<?php echo $value['Id_Service'] ?>"><?php echo $value['intitule'] ?></option>
                            
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Id_Client </label>
                        <div class="col-sm-10">
                            <input type="number" name="Id_Client" class="form-control">
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label">Slot</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="type" aria-label="Default select example">
                            <option selected>Choisir Slot</option>
                            <?php foreach ($services as $key => $value) { ?>
                                
                            
                            <option value="<?php echo $value['Id_Slot'] ?>"><?php echo $value['intitule'] ?></option>
                            
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Prix </label>
                        <div class="col-sm-10">
                            <input type="number" name="prix" class="form-control">
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