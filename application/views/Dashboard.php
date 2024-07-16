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
                            <th scope="row"><?php echo ?></th>
                            <td><?php echo  ?></td>
                            
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>
               </div>

    </div>
</main>