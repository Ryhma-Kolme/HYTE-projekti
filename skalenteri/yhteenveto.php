<div class="column">
    <div class="blue-title">
        <h3>Ravinto - kuukauden yhteenveto</h3>
    </div>
    <?php include("sravinto/ravintoAvg.php");?>
    <?php include("sravinto/ravintoChart.php");?>
</div>


<div class="column">
        <div class="blue-title">
            <h3>Uni - kuukauden yhteenveto</h3>
        

        </div>

        <div class="uni-column-content">
            <div class="column-1">
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>
    <canvas id="kkUniChart"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const ctx = document.getElementById('kkUniChart').getContext('2d');
            const uniData = await getData();
            const kkUniChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: uniData.date,
                    datasets: [
                    {
                        label: 'Keskiarvo',
                        type: 'line',
                        fill: false,
                        data: uniData.average,
                        backgroundColor: 'rgba(146, 209, 226, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        borderWidth: 1
                        },
                        {
                        label: 'Unen kesto',
                        data: uniData.duration,
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
                const response = await fetch('graafit/kkUni.csv');
                const data = await response.text();     
                const date = [];
                const duration = [];
                const average = [];
                const rows = data.split('\n').slice(1);
                rows.forEach(row => {
                const cols = row.split(',');
                date.push(cols[0]);
                duration.push(cols[1]);
                average.push(cols[3]);
                }); 
                return {date, duration, average};
            }
        
        </script>
                
            </div>
            
            <div class="column-2">
    <canvas id="kkLeposykeChart"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const ctx = document.getElementById('kkLeposykeChart').getContext('2d');
            const leposykeData = await getData();
            const kkLeposykeChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: leposykeData.date,
                    datasets: [
                    {
                        label: 'Leposyke',
                        data: leposykeData.bpm,
                        fill: false,
                        backgroundColor: 'rgba(31, 104, 137, 1)',
                        borderColor: 'rgba(31, 104, 137, 1)',
                        borderWidth: 1
                        },
                        {
                        label: 'Keskiarvo',
                        data: leposykeData.average,
                        fill: false,
                        backgroundColor: 'rgba(146, 209, 226, 1)',
                        borderColor: 'rgba(0, 0, 0, 1)',
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
                        const response = await fetch('graafit/kkLeposyke.csv');
                        const data = await response.text();     
                        const date = [];
                        const bpm = [];
                        const average = [];
                        const rows = data.split('\n').slice(1);
                        rows.forEach(row => {
                        const cols = row.split(',');
                        date.push(cols[0]);
                        bpm.push(cols[1]);
                        average.push(cols[2]);
                        }); 
                        console.log(date, bpm, average);
                        return {date, bpm, average};
                    }
        
        </script>
            </div>
        </div>
    </div>

