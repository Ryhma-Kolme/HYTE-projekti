    <!-- <div class="column">
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
    </div> -->
        
    <div class="column">
        <div class="blue-title">
            <h3>Viimeiset 7 vuorokautta</h3>
        

        </div>

        <div class="uni-column-content">
            <div class="column-1">
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>
    <body>
    <canvas id="uni7Chart"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const uni7Data = await getData();
            const ctx = document.getElementById('uni7Chart').getContext('2d');
            const myChart1 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: uni7Data.xs,
                    datasets: [
                    {
                        label: 'Unen kesto',
                        data: uni7Data.ys,
                        backgroundColor: 'rgba(38, 126, 166, 1)',
                        borderColor: 'rgba(31, 104, 137, 1)',
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
                        
                const response = await fetch('graafit/viikkouni.csv');
                const uni7Data = await response.text();
            

                const uni7Table = uni7Data.split('\n').slice(1);
                uni7Table.forEach(row => {
                const uni7Columns = row.split(',')
                const uni7Date = uni7Columns[0];
                xs.push(uni7Date);
                const uni7Duration = uni7Columns[1];
                ys.push(uni7Duration);
                console.log(uni7Date, uni7Duration);
                }); 
                return {xs, ys};
            }
        
        </script>
                
            </div>
            
            <div class="column-2">
                <h4></h4>
            <body>
    <canvas id="leposyke7Chart"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const leposyke7Data = await getData();
            const ctx = document.getElementById('leposyke7Chart').getContext('2d');
            const myChart2 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: leposyke7Data.xs,
                    datasets: [
                    {
                        label: 'Leposyke',
                        data: leposyke7Data.ys,
                        fill: false,
                        backgroundColor: 'rgba(31, 104, 137, 1)',
                        borderColor: 'rgba(31, 104, 137, 1)',
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
                                    return value + 'l/m';
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
                        
                const response = await fetch('graafit/leposyke7.csv');
                const leposyke7Data = await response.text();
            

                const leposyke7Table = leposyke7Data.split('\n').slice(1);
                leposyke7Table.forEach(row => {
                const leposyke7Columns = row.split(',')
                const leposyke7Date = leposyke7Columns[0];
                xs.push(leposyke7Date);
                const leposyke7Duration = leposyke7Columns[1];
                ys.push(leposyke7Duration);
                console.log(leposyke7Date, leposyke7Duration);
                }); 
                return {xs, ys};
            }
        
        </script>
            </div>
        </div>
    </div>
