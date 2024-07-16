<main id="main" name="main">
    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Slot</th>
                <th scope="col">Etat</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($slots as $value) { ?>
                <tr>
                    <td><?php echo $value['intitule'] ?></td>
                    <td><?php echo $value['etat'] ?></td>
                </tr>

            <?php } ?>
            </tbody>
        </table>
    </div>
</main>