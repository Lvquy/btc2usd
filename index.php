
<?php

$url = "https://api.binance.com/api/v3/ticker/price";
$data = file_get_contents($url);
$json = json_decode($data,true);

$btc='';

function currency_format($number, $suffix = 'USD') {
        if (!empty($number)) {
            return number_format($number, 2, ',', '.') . "{$suffix}";
        }
    }


foreach($json as $k => $v){
  if($v['symbol'] == 'BTCUSDT'){
    $btc= $v['price'];
  }

}
$time_zone = "Asia/Ho_Chi_Minh";
date_default_timezone_set($time_zone);
$now = date("h:i:sa - D/m/Y");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BTC</title>
</head>
<body>
  <div class="container">
    <div class="row">

      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="Bitcoin.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            BTC2USD
          </a>
          <a class="link-info" href="https://www.binance.com/" target="_blank">Binance.com</a>
        </div>
      </nav>

      <div class="col-12 mt-2">
        <h2>BTC TO USD</h2>
      </div>
      <div class="col-12">
        <div id="btc-price"><?php echo 'BTC price is: '.currency_format($btc)."<br>";?></div>
      </div>
      <div class="col-12">
        <div id="time"><?php echo "Time: ".$now."<br>";?></div>
      </div>
      <div class="col-12 ">
        <div id="time-zone"><?php echo "Time zone: ".$time_zone ;?></div>
      </div>

      
      <div class="col-12 mt-2 col-lg-6">
        <input type="email" class="form-control" id="email" placeholder="Email">
      </div>
      <div class="col-12 mt-2 col-lg-6">
        <button class="btn btn-primary" onclick="send_mail(null)">Đăng kí nhận thông báo</button>
      </div>
      
      
    </div> <!-- end row -->

    
  </div>
  <script src="js.js"></script>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>