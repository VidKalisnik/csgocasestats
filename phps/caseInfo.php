<?php

    include 'caseName.php';

?>
    <div class="case-container">
        <div class="navbar-div navbar-align">
            <nav class="navbar shadow">
            <ul class="flex-center">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <img src="images/logo.png" alt="" class="logo">
                    </a>
                </li>

                <li class="nav-item">

                    <a href="index.php" class="nav-link">

                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 32.299 29.815">
                            <path id="Icon_ionic-md-home" data-name="Icon ionic-md-home" d="M15.8,34.315V24.377h7.454v9.938h7.578V19.407h4.845L19.525,4.5,3.375,19.407H8.22V34.315Z" transform="translate(-3.375 -4.5)" />
                        </svg>
                        
                        <span class="link-text">Home</span>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="cases.php" class="nav-link">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" viewBox="0 0 32.697 32.616">
                            <path id="Icon_material-data-usage" data-name="Icon material-data-usage" d="M20.983,3.075V8.029a11.436,11.436,0,0,1,9.809,11.313,11.646,11.646,0,0,1-.785,4.153L34.259,26A16.146,16.146,0,0,0,35.7,19.342,16.358,16.358,0,0,0,20.983,3.075ZM19.349,30.786A11.437,11.437,0,0,1,17.714,8.029V3.075A16.347,16.347,0,1,0,32.509,29l-4.251-2.5A11.363,11.363,0,0,1,19.349,30.786Z" transform="translate(-3 -3.075)" />
                        </svg>
                        
                        <span class="link-text">Cases</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="contact.php" class="nav-link">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="27" viewBox="0 0 32.697 32.697">
                            <path id="Icon_ionic-md-contact" data-name="Icon ionic-md-contact" d="M19.724,3.375A16.349,16.349,0,1,0,36.072,19.724,16.4,16.4,0,0,0,19.724,3.375Zm0,4.9a4.9,4.9,0,1,1-4.9,4.9A4.921,4.921,0,0,1,19.724,8.28Zm0,23.611a11.91,11.91,0,0,1-9.809-5.235c.079-3.27,6.539-5.07,9.809-5.07s9.731,1.8,9.809,5.07A11.93,11.93,0,0,1,19.724,31.891Z" transform="translate(-3.375 -3.375)" />
                        </svg>
                                                
                        <span class="link-text">Contact</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="33.962" height="24.258" viewBox="0 0 33.962 24.258">
                            <path id="Icon_ionic-logo-polymer" data-name="Icon ionic-logo-polymer" d="M29.563,6.75H23.658L12.014,25.9l-3.859-7.02L14.8,6.75H8.9L2.25,18.879,8.9,31.008H14.8l7.811-12.837,3.841-6.312,3.851,7.02L23.658,31.008h5.905l6.648-12.129Z" transform="translate(-2.25 -6.75)" fill="black"/>
                        </svg>

                    </a>
                </li>
            </ul>
            </nav>
        </div>
        <div class="case flex-column">
            <div class="together">
                <div class="black-box bb-small shadow center">
                    <h3 class="black-box-text">Case</h3>
                </div>
                <div class="white-box wb-medium shadow">
                    <div class="flex-center">
                        <img src="images/<?php echo $caseFolder; ?>/256fx256f.png" 
                        alt="" class="img-center">
                        <h2 class="case-name"><?php 
                                    echo $_POST['caseName'];
                        ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="graph2">
            <div class="together">
                <div class="white-box wb-medium shadow">
                    <div class="flex-center">
                        <?php
                            include 'skinsGraph.php';
                        ?>
                        
                        <canvas id="skinsChart" width="900" height="200"></canvas>
                        <script>
                            var ctx = document.getElementById('skinsChart').getContext('2d');
                            var skinsChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: [<?php echo $datum  ?>],
                                    datasets: [{
                                    label: 'Price',
                                    data: [<?php echo $price  ?>],
                                    borderColor: 'rgb(255,0,0)',
                                    borderWidth: 1,
                                    backgroundColor: 'rgba(10,0,0,0.1)',
                                    yAxisID: 'yLeft'
                                    }, {
                                    label: 'Volume',
                                    type: 'bar',
                                    data: [<?php echo $volume  ?>],
                                    borderColor: 'rgb(0,0,0)',
                                    borderWidth: 1,
                                    backgroundColor: 'rgba(0,0,0,0.1)',
                                    yAxisID: 'yRight'
                                    }]
                                },
                                options: {
                                    scales: {
                                    yAxes: [{
                                        id: 'yLeft',
                                    },
                                    {
                                        id: 'yRight',
                                        position: 'right',
                                    }]
                                    },
                                    elements: {
                                    point: {
                                        radius: 0
                                    }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="data">
            <table class="case-table shadow" cellspacing="0" cellpadding="0">
                <tr>
                    <th>Return</th>
                    <th>Volume</th>
                    <th>Price</th>
                </tr>
                <tr class="data-column">
                    <td><?php echo $result[0]; ?>%</td>
                    <td><?php echo $result[1]; ?></td>
                    <td><?php echo $result[2]; ?>$</td>
                </tr>
              </table>
        </div>
        <div class="skins white-box skins-box shadow">
                    <svg class="prev" xmlns="http://www.w3.org/2000/svg" width="13.503" height="23.619" viewBox="0 0 13.503 23.619">
                        <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M15.321,18l8.937-8.93a1.688,1.688,0,0,0-2.391-2.384L11.742,16.8a1.685,1.685,0,0,0-.049,2.327L21.86,29.32a1.688,1.688,0,0,0,2.391-2.384Z" transform="translate(-11.251 -6.194)"/>
                    </svg>
                    <div>
                    <?php
                        include 'skins.php';
                    ?>
                    </div>
                    <svg class="next" xmlns="http://www.w3.org/2000/svg" width="13.503" height="23.616" viewBox="0 0 13.503 23.616">
                        <path id="Icon_ionic-ios-arrow-forward" data-name="Icon ionic-ios-arrow-forward" d="M20.679,18,11.742,9.07a1.681,1.681,0,0,1,0-2.384,1.7,1.7,0,0,1,2.391,0L24.258,16.8a1.685,1.685,0,0,1,.049,2.327L14.14,29.32a1.688,1.688,0,0,1-2.391-2.384Z" transform="translate(-11.246 -6.196)"/>
                    </svg>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/chart.js"></script>
