<main id="main" class="main">
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date debut</th>
                <th scope="col">Id Service</th>
                <th scope="col">Id Client</th>
                <th scope="col">Id slot</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rdv as $value) { ?>
                <tr>
                    <th scope="row"><?php echo $value['Id_Rdv']?></th>
                    <td><?php echo $value['dateHdebut'] ?></td>
                    <td><?php echo $value['Id_Service'] ?></td>
                    <td><?php echo $value['Id_Client']?></td>
                    <td><?php echo $value['Id_Slot']?></td>
                    <td>
                        <a href="<?php echo site_url('devis/paiement/'.$value['Id_Rdv']) ?>" class="btn btn-warning btn-sm">Payer</a>
                    </td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>
</main>