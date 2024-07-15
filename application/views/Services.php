<main id="main" class="main">
            <div class="pagetitle">
                <h1>Services</h1>
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
                        <label for="inputTime" class="col-sm-2 col-form-label">Intitule</label>
                        <div class="col-sm-10">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Duree </label>
                        <div class="col-sm-10">
                            <input type="number" name="duree" class="form-control">
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

                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Intitule</th>
                            <th scope="col">Duree</th>
                            <th scope="col">Prix</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo ?></th>
                            <td><?php echo ?></td>
                            <td><?php echo ?></td>
                            <td><?php echo ?></td>
                            <td>
                                <a href="<?php echo ?>" class="btn btn-warning btn-sm">Modifier</a>
                                <a href="<?php echo ?>" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                
        </main>