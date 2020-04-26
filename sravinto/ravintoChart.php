<div id="chartContainer" style="height: 300px; width: 100%;">
    <script>
// PHP muuttujat Javascript muuttujiin

        // Kalenterin otsikko (esim Huhtikuu, 2020) 
        var mTitle = '<?php echo ucwords($title) ?>';
        // Kalenterista valittu päivä
        var clickedDay = '<?php echo($clickedDay)?>';
        
        // Kuukauden ravintojen keskiarvot
        var monthCalAvg = parseInt('<?php echo($monthCalAvg)?>', 10); 
        var monthFatAvg = parseInt('<?php echo($monthFatAvg)?>', 10); 
        var monthChAvg = parseInt('<?php echo($monthChAvg)?>', 10); 
        var monthProAvg = parseInt('<?php echo($monthProAvg)?>', 10);

        // Valitun päivän ravintojen määrät yhteensä
        var CalTotal = parseInt('<?php echo($caloriestotal)?>', 10); 
        var FatTotal = parseInt('<?php echo($fatstotal)?>', 10); 
        var ChTotal = parseInt('<?php echo($chtotal)?>', 10); 
        var ProTotal = parseInt('<?php echo($proteinstotal)?>', 10); 

// Luodaan taulukko 
    // (Pohjana käytetty CanvasJS Lähde: https://canvasjs.com/javascript-charts/multiple-axis-column-chart)
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        axisX:{ // X-tason värit ja paksuus
            labelFontColor: "#767676",
            gridColor: "#f2f2f2" ,
            gridThickness: 2        
        },
        axisY: { // Y-tason värit ja otsikko
            labelFontColor: "#767676",
            labelFontFamily: "Arial",
            gridColor: "#f2f2f2",
            title: "Ravintomäärä",
            titleFontColor: "#767676"
        },
        // Näyttää hiiren ollessa palkilla datojen nimet (dataSeries)
        toolTip: {
            shared: true
        },
        // Voi klikata legendtekstiä painamalla datapalkin pois näkyvistä
        legend: {
            cursor:"pointer",
            itemclick: toggleDataSeries
        },
        // Kuukauden keskiarvon datat ja ominaisuudet
        data: [{
            // datan esitystyyppi
            type: "column",
            // datapalkin väri
            color: "#267ea6",
            // Hiiren ollessa palkilla datan otsikko (esim. Huhtikuu, 2020)
            name: mTitle,
            // Palkin kuvausteksti jota klikkaamalla saa palkin piiloon
            legendText: "Kuukauden keskiarvo",
            axisYType: "primary",
            showInLegend: true, 
            // y-muuttujien arvot ja x-akselin labelit
            dataPoints:[
                { y: monthCalAvg, label: "Kalorit (kcal)"},
                { y: monthProAvg,  label: "Proteiinit (g)"},
                { y: monthChAvg,  label: "Hiilihydraatit (g)" },
                { y: monthFatAvg,  label: "Rasvat (g)"}
            ]
        },
        { // Valitun päivän datat ja ominaisuudet
            // datan esitystyyppi
            type: "column",	
            // datapalkin väri
            color: "#b1cfd8",
            // Hiiren ollessa palkilla ja päivän ollessa valittuna datan otsikko (esim. 25.4.2020)
            name: clickedDay,
            // Palkin kuvausteksti jota klikkaamalla saa palkin piiloon
            legendText: "Valitun päivän arvo",
            showInLegend: true,
            // y-muuttujien arvot ja x-akselin labelit
            dataPoints:[
                { y: CalTotal, label: "Kalorit (kcal)" },
                { y: ProTotal,  label: "Proteiinit (g)"  },
                { y: ChTotal,  label: "Hiilihydraatit (g)" },
                { y: FatTotal,  label: "Rasvat (g)"}
            ]
        }]
    });
    chart.render();

    // Funktio joka legendTextiä klikattaessa piilottaa valitun datasarjan palkit
    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

    }

    </script>
</div>