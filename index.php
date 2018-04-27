<?php

//$xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp?date_req=05/11/2017', null, LIBXML_NOCDATA );
$xml = simplexml_load_file('http://www.floatrates.com/daily/usd.xml', null, LIBXML_NOCDATA );

$valutes = [];
$firsts = [ ['code'=>'usd', 'name'=>'United States Dollar', 'value'=>1] ];
$seconds =[];

foreach ($xml->item as $val) {
	$code = strtolower((string)$val->targetCurrency);

	if($code == 'amd' || !file_exists(__DIR__.'/flags/'.$code.'.png')) continue;

	$data = [
		'code'  => $code,
		'name'  => str_replace('convertible ', '', (string)$val->targetName),
		'value' => (float)$val->exchangeRate
	];

	if(in_array($code, ['rub', 'eur']))
		$firsts[] = $data;
	elseif(in_array($code, ['ils', 'azn', 'try', 'uah', 'gel', 'byn']))
		$seconds[] = $data;
	else
		$valutes[] = $data;
}

$valutes = array_merge($firsts, $seconds, $valutes);


?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Currency Converter</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/main.css">

        <!--[if lt IE 9]>
            <script src="http://adventurethemes.com/demo/writer/html/v3/js/vendor/html5shiv.min.js"></script>
        <![endif]-->

        <script src="js/modernizer.js"></script>
    </head>
    <body>
        <main class="container left-container">
            <div class="row">

                <div id="menu-target">
                    <ul>
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-user"></i><a href="author.html">John Smith</a></li>
                        <li><i class="fa fa-anchor"></i><a href="page.html">About</a></li>
                        <li><i class="fa fa-star"></i><a href="favorites.html">Favorites</a></li>
                        <li><i class="fa fa-paper-plane"></i><a href="contact.html">Contact</a></li>
                    </ul>
                </div>

                <section class="sidebar col-md-12">

                    <span class="menu-trigger animated fadeInDown">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </span>


					<div class="cur-search">
						<input type="text" placeholder="Search"/>
					</div>

                    <div class="currencies">
	                    	<?foreach($valutes as $k=>$v):?>
			                    <div class="currency <?if(in_array($k, [0,1,2])):?>active<?endif?>">
				                    	<img src="/flags/<?=$v['code']?>.png">
				                   		<span><?=strtoupper($v['code'])?></span>
				                   		<span><?=$v['name']?></span>
															<div class="hide"><?=strtolower($v['code'].' '.$v['name'])?></div>
															<input type="text" name="" value="200">
			                    </div>
		                    <?endforeach?>
                    </div>
                </section><!-- end sidebar -->

                <!-- <section class="col-lg-7 col-12 ml-auto main-content">
										<div class="convert-block">
												<img src="/flags/azn.png" alt=""/>
												<span>Azerbaijan Manat</span>
										</div>
                </section> -->

            </div> <!--/row -->

        </main> <!-- /container -->

        <script src="/js/jquery.min.js"></script>
        <script src="/js/main.js"></script>
    </body>
</html>
