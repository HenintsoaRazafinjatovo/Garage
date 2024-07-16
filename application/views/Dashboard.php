<main id="main" name="main">
    <div class="card-body">
              <h5 class="card-title">Doughnut Chart</h5>

              <!-- Doughnut Chart -->
              <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels: [
                        'Red',
                        'Blue',
                        'Yellow'
                      ],
                      datasets: [{
                        label: 'My First Dataset',
                        data: [300, 50, 100],
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Doughnut CHart -->
               <div>
                    <form action="<?php echo site_url('')?>" meyhod="post">
                        <div class="row mb-3">
                            <span>Entrer deux dates</span>
                            <label for="inputDate" class="col-sm-2 col-form-label">Date 1</label>
                            <div class="col-sm-10">
                                <input type="date" name="date1" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date 2</label>
                            <div class="col-sm-10">
                                <input type="date" name="date2" class="form-control">
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
                        <th scope="col">Date </th>
                        <th scope="col">Nombre de voitures </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rdv as $value) { ?>
                        <tr>
                            <td ><?php echo ?></td>
                            <td><?php echo  ?></td>
                            
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
               </div>

    </div>
</main>