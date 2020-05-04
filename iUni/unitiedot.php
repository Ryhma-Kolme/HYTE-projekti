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
<div class="row">
    <div class="column">
        <div class="blue-title">
            <h3>Viimeiset 7 vuorokautta</h3>
        </div>

        <div class="uni-column-content">
            <div class="column-1">
            <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"> </script>
    <canvas id="uni7Chart"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const ctx = document.getElementById('uni7Chart').getContext('2d');
            const uniData = await getData();
            const uni7Chart = new Chart(ctx, {
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
                const response = await fetch('graafit/unitiedot7.csv');
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
    <canvas id="leposyke7Chart"></canvas>
    
    <script>
        chartIt();
         
        async function chartIt() {
            const ctx = document.getElementById('leposyke7Chart').getContext('2d');
            const leposykeData = await getData();
            const leposyke7Chart = new Chart(ctx, {
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
                        borderColor: 'rgba(146, 209, 226, 1)',
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
                        const response = await fetch('graafit/leposyke7.csv');
                        const data = await response.text();     
                        const date = [];
                        const bpm = [];
                        const average = [];
                        const rows = data.split('\n').slice(1);
                        rows.forEach(row => {
                        const cols = row.split(',');
                        date.push(cols[0]);
                        bpm.push(cols[1]);
                        average.push(parseFloat(cols[2]));
                        }); 
                        console.log(date, bpm, average);
                        return {date, bpm, average};
                    }
        
        </script>
            </div>
        </div>
    </div>
</div>
