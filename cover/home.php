<!-- <h2>HOME</h2> -->
  
	<?php 
		// print_r($_SESSION); 
		// print_r($_SESSION['admin']['username']); 

		include 'conn.php';
        // echo $_GET['kota'];

        if ($_GET['kota']=="Semua") {
        
        
      $stmt = $conn->query('SELECT Lokasi,count(Title) as number FROM produk WHERE Tipe_Penawaran="Dijual" GROUP BY Lokasi ORDER BY Lokasi DESC');

      $result = $stmt->fetch_all();

      // print_r($result);

      $result=json_encode($result);



      $stmtsewa = $conn->query('SELECT Lokasi,count(Title) as number FROM produk WHERE Tipe_Penawaran="Disewakan" GROUP BY Lokasi ORDER BY Lokasi DESC');

      $resultsewa = $stmtsewa->fetch_all();

      // print_r($result);

      $resultsewa=json_encode($resultsewa);


      $stmthargaluasbangunansewa = $conn->query('SELECT Price,Luas_Bangunan FROM Produk WHERE Tipe_penawaran="Disewakan"');

      $resulthargaluasbangunansewa = $stmthargaluasbangunansewa->fetch_all();

      // print_r($result);

      $resulthargaluasbangunansewa=json_encode($resulthargaluasbangunansewa);


      // hargaluasbangunanjual
      $stmthargaluasbangunanjual = $conn->query('SELECT Price,Luas_Bangunan FROM Produk WHERE Tipe_penawaran="Dijual"');
      $resulthargaluasbangunanjual = $stmthargaluasbangunanjual->fetch_all();
      // print_r($result);
      $resulthargaluasbangunanjual=json_encode($resulthargaluasbangunanjual);


      // hargaluasTanahsewa
      $stmthargaluasTanahsewa = $conn->query('SELECT Price,Luas_Tanah FROM Produk WHERE Tipe_penawaran="Disewakan"');
      $resulthargaluasTanahsewa = $stmthargaluasTanahsewa->fetch_all();
      // print_r($result);
      $resulthargaluasTanahsewa=json_encode($resulthargaluasTanahsewa);


      // hargaluasTanahjual
      $stmthargaluasTanahjual = $conn->query('SELECT Price,Luas_Tanah FROM Produk WHERE Tipe_penawaran="Dijual"');
      $resulthargaluasTanahjual = $stmthargaluasTanahjual->fetch_all();
      // print_r($result);
      $resulthargaluasTanahjual=json_encode($resulthargaluasTanahjual);

    }

    else {
        $lok=$_GET['kota'];
        // $lok="Surabaya";
        
      $stmt = $conn->query("SELECT Lokasi,count(Title) as number FROM produk WHERE Tipe_Penawaran='Dijual' AND Lokasi='$lok' GROUP BY Lokasi ORDER BY Lokasi DESC");

      $result = $stmt->fetch_all();

      // print_r($result);

      $result=json_encode($result);



      $stmtsewa = $conn->query("SELECT Lokasi,count(Title) as number FROM produk WHERE Tipe_Penawaran='Disewakan' AND Lokasi='$lok' GROUP BY Lokasi ORDER BY Lokasi DESC");

      $resultsewa = $stmtsewa->fetch_all();

      // print_r($result);

      $resultsewa=json_encode($resultsewa);


      $stmthargaluasbangunansewa = $conn->query("SELECT Price,Luas_Bangunan FROM Produk WHERE Tipe_penawaran='Disewakan' AND Lokasi='$lok'");

      $resulthargaluasbangunansewa = $stmthargaluasbangunansewa->fetch_all();

      // print_r($result);

      $resulthargaluasbangunansewa=json_encode($resulthargaluasbangunansewa);


      // hargaluasbangunanjual
      $stmthargaluasbangunanjual = $conn->query("SELECT Price,Luas_Bangunan FROM Produk WHERE Tipe_penawaran='Dijual' AND Lokasi='$lok'");
      $resulthargaluasbangunanjual = $stmthargaluasbangunanjual->fetch_all();
      // print_r($result);
      $resulthargaluasbangunanjual=json_encode($resulthargaluasbangunanjual);


      // hargaluasTanahsewa
      $stmthargaluasTanahsewa = $conn->query("SELECT Price,Luas_Tanah FROM Produk WHERE Tipe_penawaran='Disewakan' AND Lokasi='$lok'");
      $resulthargaluasTanahsewa = $stmthargaluasTanahsewa->fetch_all();
      // print_r($result);
      $resulthargaluasTanahsewa=json_encode($resulthargaluasTanahsewa);


      // hargaluasTanahjual
      $stmthargaluasTanahjual = $conn->query("SELECT Price,Luas_Tanah FROM Produk WHERE Tipe_penawaran='Dijual' AND Lokasi='$lok'");
      $resulthargaluasTanahjual = $stmthargaluasTanahjual->fetch_all();
      // print_r($result);
      $resulthargaluasTanahjual=json_encode($resulthargaluasTanahjual);

    }


	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    

    <!-- PRINT CHART -->
    <div id="barchart_values" style="width: 100%; height: 100%;"></div>
    <div id="barchart_valuessewa" style="width: 100%; height: 100%;"></div>
    <div id="hargaluasbangunansewa" style="width: 100%; height: 100%;"></div>
    <div id="hargaluasbangunanjual" style="width: 100%; height: 100%;"></div>
    <div id="hargaluasTanahsewa" style="width: 100%; height: 100%;"></div>
    <div id="hargaluasTanahjual" style="width: 100%; height: 100%;"></div>

    <script type="text/javascript">
      	window.onload = function() {
        	google.charts.load('current', {'packages' : ['corechart']});
        	google.charts.setOnLoadCallback(function() {drawChart()});    
    	};

        function drawChart() {
            result=JSON.parse('<?php echo $result;?>');
            resultsewa=JSON.parse('<?php echo $resultsewa;?>');
            resulthargaluasbangunansewa=JSON.parse('<?php echo $resulthargaluasbangunansewa;?>');
            
            

            var data = new google.visualization.DataTable();
            var datasewa = new google.visualization.DataTable();
            var datahargaluasbangunansewa = new google.visualization.DataTable();

            
            data.addColumn('string', 'Rumah Dijual');
            data.addColumn('number', 'Total');

            datasewa.addColumn('string', 'Rumah Disewakan');
            datasewa.addColumn('number', 'Total');

            datahargaluasbangunansewa.addColumn('string', 'Harga');
            datahargaluasbangunansewa.addColumn('number', 'Luas Bangunan');
            

            var array=[];
            var arraysewa=[];
            var arrayhargaluasbangunansewa=[];

            console.log(result);
            console.log(resultsewa);
            console.log(resulthargaluasbangunansewa);

            // hargaluasbangunansewa

            $.each(result, function(i, obj) {
                array.push([obj[0], parseInt(obj[1])]);
            });

            $.each(resultsewa, function(i, obj) {
                arraysewa.push([obj[0], parseInt(obj[1])]);
            });


            $.each(resulthargaluasbangunansewa, function(i, obj) {
                arrayhargaluasbangunansewa.push([obj[0], parseInt(obj[1])]);
            });

            data.addRows(array);
            datasewa.addRows(arraysewa);
            datahargaluasbangunansewa.addRows(arrayhargaluasbangunansewa);


            // Bar Rating
            var options = {
	        title: "Jumlah Rumah dijual di setiap daerah",
	        width: 600,
	        height: 400,
	        bar: {groupWidth: "95%"},
	        legend: { position: "none" },
	      };
	      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
	      chart.draw(data, options);



           // Bar Rating Sewa
            var optionssewa = {
            title: "Jumlah Rumah disewakan di setiap daerah",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
          };
          var chartsewa = new google.visualization.BarChart(document.getElementById("barchart_valuessewa"));
          chartsewa.draw(datasewa, optionssewa);
  

          // Area Harga Luas Bangunan
        var optionshargaluasbangunansewa = {
          title: 'Persebaran Harga Sewa berbanding Luas Bangunan',
          hAxis: {title: 'Harga Sewa', minValue: 0},
          vAxis: {title: 'Luas Bangunan', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var charthargaluasbangunansewa = new google.visualization.ScatterChart(document.getElementById('hargaluasbangunansewa'));
        charthargaluasbangunansewa.draw(datahargaluasbangunansewa, optionshargaluasbangunansewa);
        

        // Harga Luas Bangunan Jual
        resulthargaluasbangunanjual=JSON.parse('<?php echo $resulthargaluasbangunanjual;?>');

      var datahargaluasbangunanjual = new google.visualization.DataTable();
      
      datahargaluasbangunanjual.addColumn('string', 'Harga');
            datahargaluasbangunanjual.addColumn('number', 'Luas Bangunan');

      var arrayhargaluasbangunanjual=[];

      console.log(resulthargaluasbangunanjual);

      $.each(resulthargaluasbangunanjual, function(i, obj) {
                arrayhargaluasbangunanjual.push([obj[0], parseInt(obj[1])]);
            });

      datahargaluasbangunanjual.addRows(arrayhargaluasbangunanjual);

      var optionshargaluasbangunanjual = {
          title: 'Persebaran Harga jual berbanding Luas Bangunan',
          hAxis: {title: 'Harga jual', minValue: 0},
          vAxis: {title: 'Luas Bangunan', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var charthargaluasbangunanjual = new google.visualization.ScatterChart(document.getElementById('hargaluasbangunanjual'));
        charthargaluasbangunanjual.draw(datahargaluasbangunanjual, optionshargaluasbangunanjual);


        // Harga Luas Tanah Sewa
        resulthargaluasTanahsewa=JSON.parse('<?php echo $resulthargaluasTanahsewa;?>');

      var datahargaluasTanahsewa = new google.visualization.DataTable();

      datahargaluasTanahsewa.addColumn('string', 'Harga');
            datahargaluasTanahsewa.addColumn('number', 'Luas Tanah');

      var arrayhargaluasTanahsewa=[];

      console.log(resulthargaluasTanahsewa);

      $.each(resulthargaluasTanahsewa, function(i, obj) {
                arrayhargaluasTanahsewa.push([obj[0], parseInt(obj[1])]);
            });

      datahargaluasTanahsewa.addRows(arrayhargaluasTanahsewa);

      var optionshargaluasTanahsewa = {
          title: 'Persebaran Harga sewa berbanding Luas Tanah',
          hAxis: {title: 'Harga sewa', minValue: 0},
          vAxis: {title: 'Luas Tanah', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var charthargaluasTanahsewa = new google.visualization.ScatterChart(document.getElementById('hargaluasTanahsewa'));
        charthargaluasTanahsewa.draw(datahargaluasTanahsewa, optionshargaluasTanahsewa);

        // Harga Luas Tanah Jual
        resulthargaluasTanahjual=JSON.parse('<?php echo $resulthargaluasTanahjual;?>');

      var datahargaluasTanahjual = new google.visualization.DataTable();

      datahargaluasTanahjual.addColumn('string', 'Harga');
            datahargaluasTanahjual.addColumn('number', 'Luas Tanah');

      var arrayhargaluasTanahjual=[];

      console.log(resulthargaluasTanahjual);

      $.each(resulthargaluasTanahjual, function(i, obj) {
                arrayhargaluasTanahjual.push([obj[0], parseInt(obj[1])]);
            });

      datahargaluasTanahjual.addRows(arrayhargaluasTanahjual);

      var optionshargaluasTanahjual = {
          title: 'Persebaran Harga jual berbanding Luas Tanah',
          hAxis: {title: 'Harga jual', minValue: 0},
          vAxis: {title: 'Luas Tanah', minValue: 0, maxValue: 15},
          legend: 'none'
        };

        var charthargaluasTanahjual = new google.visualization.ScatterChart(document.getElementById('hargaluasTanahjual'));
        charthargaluasTanahjual.draw(datahargaluasTanahjual, optionshargaluasTanahjual);
            // Tutup Semua
            }

    </script>
    	