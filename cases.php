<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Csgo Case Stats</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>
<body>

    <script src="js/caseclicktable.js"></script>

<div class="replace">
    <div class="container-cases">

        <!-- NAVBAR -->

        <div class="navbar-div navbar-margin">
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
                    <a href="cases.php" class="nav-link active">
                        
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

        <!-- CASES TABELA -->

        
        <div class="cases">
            <div class="black-box bb-big shadow center">
                <h3 class="black-box-text">All Cases</h3>
            </div>
            <div class="white-box shadow">
                <div class="table-margin">
                    <table style="width:100%" class="cases-table">
                        <tr>
                            <th style="text-align:right" class="table-1row">Case</th>
                            <th></th>
                            <th style="text-align:center" class="table-1row return">Return</th>
                            <th style="text-align:center" class="table-1row volume">Volume</th>
                            <th style="text-align:center" class="table-1row price">Price</th>
                        </tr>
                            <?php
                                include 'phps/table.php';
                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>  

    <script src="js/jquery.js"></script>
    <script src="js/chart.js"></script>
</body>
</html>