var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo $datum;  ?>],
        datasets: [{
            label: 'Volume',
            data: [<?php echo $volume;  ?>],
            borderColor: 'rgba(0,255,255,1)',
        }]
    },

});