
    <div class="column">
        <div class="blue-title">
            <h3>Viimeisin yö</h3>
        </div>

        <div class="uni-column-content">
            <div class="column-1">
                <h4>Unen kesto</h4>
                <img style="width: 100%" src="images/graafi.png" alt="Graafi kuvainnollistamassa">
            </div>

            <div class="column-2">
                <h4>Leposyke</h4>
                <img style="width: 100%" src="images/graafi.png" alt="Graafi kuvainnollistamassa">
            </div>
        </div>
    </div>
        
    <div class="column">
        <div class="blue-title">
        

        </div>

        <div class="uni-column-content">
            <div class="column-1">
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>
    <body>
    <canvas id="chart" width="800" height="400"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const data = await getData();
            const ctx = document.getElementById('chart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.xs,
                    datasets: [
                    {
                        label: 'Unen kesto',
                        data: data.ys,
                        backgroundColor: 'rgba(0, 80, 240, 1)',
                        borderColor: 'rgba(82, 139, 255, 1)',
                        borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values){
                                    return value + 'h';
                                }
                                    }
                                }]
                            }
                        }               
                    });
                    }           

            async function getData(){            
                const xs = [];
                const ys = [];
                        
                const response = await fetch('viikkouni/viikkouni.csv');
                const data = await response.text();
            

                const table = data.split('\n').slice(1);
                table.forEach(row => {
                const columns = row.split(',')
                const date = columns[0];
                xs.push(date);
                const duration = columns[1];
                ys.push(duration);
                console.log(date, duration);
                }); 
                return {xs, ys};
            }
        
        </script>
                
            </div>
            
            <div class="column-2">
                <h4>Leposyke</h4>
                <img style="width: 100%" src="images/graafi.png" alt="Graafi kuvainnollistamassa">
            </div>
        </div>
    </div>
