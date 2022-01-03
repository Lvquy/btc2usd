
<?php

$url = "https://api.binance.com/api/v3/ticker/price";
$data = file_get_contents($url);
$json = json_decode($data,true);

$btc='';

function currency_format($number, $suffix = '$') {
        if (!empty($number)) {
            return number_format($number, 2, ',', '.') . "{$suffix}";
        }
    }


foreach($json as $k => $v){
  if($v['symbol'] == 'BTCUSDT'){
    $btc= $v['price'];
  }
  if($v['symbol'] == 'ETHUSDT'){
    $eth = $v['price'];
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
            Notify-Binance
          </a>
          <a class="link-info" href="https://www.binance.com/" target="_blank">Binance.com</a>
        </div>
      </nav>

      <table class="table table-bordered mt-3">
        <thead>
          <th>Name</th>
          <th>Price(USD)</th>
        </thead>
        <tbody class="fw-bold">
          <tr >
            <td><img src="Bitcoin.svg" width="20" alt="" > BTC</td>
            <td> <div id="btc-price"><?php echo currency_format($btc);?></div> </td>
          </tr>
          <tr>
            <td><img src="Ethereum.svg" width="20" alt="" > ETH</td>
            <td > <div id="eth-price"><?php echo currency_format($eth);?></div></td>
          </tr>
        </tbody>          
      </table>
      <div class="col-12" id="time">
        <?php echo "Result at: ".$now?>
        <?php echo "Time Zone: ".$time_zone?>
      </div>
      
      
      <div class="col-12 mt-2 col-lg-6">
        <button class="btn btn-primary" onclick="register()">Đăng kí nhận thông báo</button>
      </div>
      
      <!-- Modal -->
      <div class="modal fade" id="modal_reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Register Notify</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input class="form-control mt-2" id="email" type="email" placeholder="Email">
              <input class="form-control mt-2" id="top" type="text" placeholder="Top Price to send notify">
              <input class="form-control mt-2" id="pur" type="text" placeholder="Purchase Price">
              <input class="form-control mt-2" id="bot" type="text" placeholder="Bot Price to send notify">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="reg_data()">Register</button>
            </div>
          </div>
        </div>
      </div>






    </div> <!-- end row -->
    <footer class="fixed-bottom  bg-secondary">
      <div class="container">
        <div class="row pb-3 pt-3">
          <div class="col-12">
            <h4 class="text-center">Donate me</h4>
          </div>
          <div class="col-12 col-lg-4">Momo: 0868189506</div>
          <div class="col-12 col-lg-4">Agribank: 5590206650088  </div>
          <div class="col-12 col-lg-4">Paypal: otnon.ictu@gmail.com</div>
        </div>
      </div>
    </footer>
  </div>
  <script src="js.js"></script>
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>