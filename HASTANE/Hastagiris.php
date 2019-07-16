<?php
require "Sessions.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Hasta Giriş</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<style>

		.hastakayit {
			height: 97px;
			width: 570px;
			position: fixed;
			z-index: 1;
			top: 17px;
			left: 65px;
			background:rgba(0,0,128, 0.1);
			overflow-x: hidden;
			padding-top: 10px;
			color:white;
		}
		
		.sidebar {
			height: 75%;
			width: 620px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 700px;
			background:rgba(0,0,128, 0.0);
			overflow-x: hidden;
			padding-top: 16px;
		}

		.sidebar a {
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 20px;
			color: #818181;
			display: block;
		}

		.sidebar a:hover {
			color: #f1f1f1;
		}

		.main {
			margin-left: 160px; /* Same as the width of the sidenav */
			padding: 0px 10px;
		}

		@media screen and (max-height: 450px) {
			.sidebar {padding-top: 15px;}
			.sidebar a {font-size: 18px;}
		}
		form {
			position:fixed;
			top:120px;
			left:50px; 
			width:600px
		}
		h2 {
			color:lightgreen;
		}
		.baslik {
			color:lightgreen;
		}
	</style>
	
</head>

<body>
<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
<div class="w3-container">
    <br>
    <br>
    <div class="w3-card-4">
      <div class="hastakayit">
		<span class="login100-form-title p-b-30">
        <h3 style="color:lightgreen;">&nbsp Hasta Bilgilerini Giriniz:</h3>
		</span>
      </div>

      <form class="w3-container" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <p>
          <i class="fa fa-bed" style="font-size:40px;color:lightgreen"></i><label class="baslik">&nbsp Yatacak Hastanın Adı</label></p>
		  <input class="w3-input w3-border" name="yatanhasta" type="text">
        <p>
          <i class="fa fa-calendar" style="font-size:40px;color:lightgreen"></i><label class="baslik">&nbsp Yatış Tarihi</label></p>
		  <input class="w3-input w3-border" name="yatistarih" type="date">
        <p>     
          <i class="fas fa-door-open" style="font-size:40px;color:lightgreen"></i><label class="baslik">&nbsp Oda Numarası</label></p>
		  <input class="w3-input w3-border" name="odano" type="text">
        <p>
          <i class="fas fa-file" style="font-size:40px;color:lightgreen"></i><label class="baslik">&nbsp Yatış Nedeni </label></p>
		  <input class="w3-input w3-border" name="yatisneden" type="text">
        <p>
          <input type="submit" name="eklebuton" class="w3-btn w3-right w3-large w3-border" value="EKLE" style="background:lightgreen">
        </p>
      </form>

      <br>
      <br>
	  
    </div>
	
    <br>
    <br>
	<div class="sidebar" style="background-color:rgb(0,0,128,0.1);top:15px;padding:10px;">
	<span class="login100-form-title p-b-49">
		<h2>GİRİŞİ OLAN HASTALAR<h2>
	</span>
  </div>
  <div class="sidebar" style="top:80px;">
	  <button style="position:fixed;top:10px;right:10px;height:50px;width:50px;background:lightgreen;"><font size="5"><a  class="fa fa-fw fa-home" href="Doktormenu.php"></a></font></button>
    <?php
        error_reporting(0);
        require "Sessions.php";
        $dt=$giris_session;
        $baglanti=mysqli_connect("localhost", "root", "", "hastane");

        if(isset($_POST['yatanhasta'])&&isset($_POST['yatistarih'])&&isset($_POST['odano'])&&isset($_POST['yatisneden'])){
            $yatanhasta=$_POST['yatanhasta'];
            $yatistarih=$_POST['yatistarih'];
            $odano=$_POST['odano'];
            $yatisneden=$_POST['yatisneden'];
		}
            if(isset($_POST['eklebuton'])){
              $hastaekle=mysqli_query($baglanti, "INSERT INTO hastalar (hastaadi, yatistarihi, odano, yatisnedeni, doktor) VALUES ('".$yatanhasta."', '".$yatistarih."', '".$odano."', '".$yatisneden."', '".$dt."')");

            }
        $selecth=mysqli_query($baglanti, "SELECT * FROM hastalar WHERE doktor='$dt'");

        echo "<table class=\"w3-table-all w3-hoverable\">";
        echo "<tr>";
        echo "<th>HASTA ADI</th>";
        echo "<th>YATIŞ TARİHİ</th>";
        echo "<th>ODA NO</th>";
        echo "<th>YATIŞ NEDENİ</th>";
		echo "<th>DOKTOR</th>";
        echo "</tr>";
        while($row = mysqli_fetch_array($selecth))
          {   
            echo "<tr>";
            echo "<td>".$row["hastaadi"]."</td>";
            echo "<td>".$row["yatistarihi"]."</td>";
            echo "<td>".$row["odano"]."</td>";
            echo "<td>".$row["yatisnedeni"]."</td>";
			echo "<td>".$row["doktor"]."</td>";
            echo "</tr>";
          }
        echo "</table>";
    ?>
<button style="position:fixed;top:600px;left:900px;background:lightgreen;height:50px;width:200px;"><font size="3"><a  class="fa fa-wheelchair" href="Hastacikis.php"> Hasta Çıkışı yap</a></font></button>
<div class="container-login100-form-btn" style="position:fixed;top:540px;left:800px;width:410px;height:50px;color:white">
					<div class="wrap-login100-form-btn">
					<div class="login100-form-bgbtn"></div>
			<span class="login100-form-title p-b-49">
		  <h4 style="color:white;">&ensp;Toplam Yatan Hasta Kayıtlarınız: <span><?php echo mysqli_num_rows($selecth); ?></span></h4></span>
		  </div>
		  </div>
	  </div>
  </div>
</div>
</body>
</html>