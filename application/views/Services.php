<?php
    if(isset($idUpdate)){
        $action="services/update/$idUpdate";
    }
    
    else{
        $action="services/insert";
    }

?>

<main id="main" class="main">
            <div class="pagetitle">
                <h1>Services</h1>
            </div>
            <div>
                <form action="<?php echo site_url($action)?>" method="post">
                    <div class="row mb-3">
                        <label for="inputTime" class="col-sm-2 col-form-label">Intitule</label>
                        <div class="col-sm-10">
                            <input type="text" name="intitule" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Duree </label>
                        <div class="col-sm-10">
                            <input type="text" name="duree" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDate" class="col-sm-2 col-form-label">Prix </label>
                        <div class="col-sm-10">
                            <input type="text" name="prix" class="form-control">
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
                        <?php foreach ($services as $value) { ?>
                            <tr>
                                <th scope="row"><?php echo $value['Id_Service']?></th>
                                <td><?php echo $value['intitule'] ?></td>
                                <td><?php echo $value['duree'] ?></td>
                                <td><?php echo $value['prix']?></td>
                                <td>
                                    <a href="<?php echo site_url('services?idUpdate='.$value['Id_Service']) ?>" class="btn btn-warning btn-sm">Modifier</a>
                                    <a href="<?php echo site_url('services/delete/'.$value['Id_Service']) ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                
        </main>