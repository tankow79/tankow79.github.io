<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
  	<title>Конвертор</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

	
</head>
<body>
<!-- Підключаю шапку -->
<?php require "blocks/header.php"?> 

<!-- Сам сайт -->
<div class="comtainer">
      <div class="row">
        <!-- <div class="col-md-6 offset-md-3"> -->
        <div class="col-xs-6 col-md-4">
        <div class="col-xs-6 col-md-4">
        <div class="col-xs-6 col-md-4">
          <h1 class="display-3 text-center">Конвертор валюти  </h1>
          <form>
              <div class="form-group">
                <input type="number" id="kmInput" placeholder="Введіть сумму..." class="form-control form-control-lg">
              </div>
            </form>
          <!--<h5>Р.S В копійках нерахуєм :)</h5> -->
          <div id="output">
            <div class="card alert-primary mb-2">
              <div class="card-blok">
                <h4> Доларів = </h4>
                <div id="dolOutput"></div>
              </div>
            </div>
            <div class="card alert-warning mb-2">
              <div class="card-blok">
                <h4> Євро = </h4>
                <div id="eurOutput"></div>
              </div>
            </div>
          <div class="card alert-success mb-2">
            <div class="card-blok">
              <h4> Рублів = </h4>
              <div id="ruOutput"></div>
              </div>
            </div>
          </div>
          <div class="card alert-danger mb-2">
            <div class="card-blok">
              <h4>Гривень в долах = </h4>
              <div id="grnOutput"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Підключаю footer -->
<?php require "blocks/footer.php"?>
</main>

<script src="main/particles.js"></script>
<script src="main/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>

  <script>

  var dol
  var eur
  var ru

  $(document).ready(function(){
  getRate();
  });

  function getRate(){
    $.get(
      "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5",
      function(data){
        dol = (data[0]['sale']);
        eur = (data[1]['sale']);
        ru = (data[2]['sale']);
        
      }
    );
  }

  document.getElementById('kmInput').addEventListener('input', function(e) {
    let km = e.target.value;
  

  //var dol = 39
  var sumad = km / dol
  var sumadolara = ( Math.floor(sumad * 100) / 100 );
  document.getElementById('dolOutput').innerHTML = sumadolara;
  
  //var eur = 30.04
  var sumae = km / eur
  var sumaeuro = ( Math.floor(sumae * 100) / 100 );
  document.getElementById('eurOutput').innerHTML = sumaeuro;

  //var ru = 0.0000039
  var rubl = km / ru
  var rublocrugleno = ( Math.floor(rubl * 100) / 100 );
  document.getElementById('ruOutput').innerHTML = rublocrugleno;
    
  var grn = km * dol
  var grnocrugleno = ( Math.floor(grn * 100) / 100 );
  document.getElementById('grnOutput').innerHTML = grnocrugleno;
  	});
  </script>


    
  

</body>
</html>