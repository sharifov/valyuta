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

        <link rel="stylesheet" href="http://adventurethemes.com/demo/writer/html/v3/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://adventurethemes.com/demo/writer/html/v3/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://adventurethemes.com/demo/writer/html/v3/css/main.css">
        <style type="text/css">
        	.menu-trigger{
        		background: #fff;
        	}
			
			.hide{
				display:none;
			}


			.jPanelMenu-panel{
				background: #dc3545 !important;
			}
        	

        	#jPanelMenu-menu{
        		background: #fff;
        	}

	        .menu-trigger span{
	        	background: #dc3545;
	        }

	        .sidebar{
	        	overflow-y: auto;
	        }

	        	.sidebar .currencies{
	        		clear: both;
	        		float:left;
	        		margin-top:30px;
					width:100%;
	        	}

	        	.sidebar .currency{
	        		font-size:200%;
	        		border-radius: 5px;
	        		-moz-border-radius: 5px;
	        		-khtml-border-radius: 5px;
	        		-webkit-border-radius: 5px;
	        		-ms-border-radius: 5px;
	        		-o-border-radius: 5px;
	        		border-radius: 5px;
	        		overflow: hidden;
	        		float:left;
	        		width:29%;
	        		margin:8px;
	        		font-family: "Times New Roman";
	        		background: #fff;
	        		padding:8px;
	        		cursor: pointer;
	        		height: 100px;
	        		text-align: center;
	        		box-shadow: inset 0 0 33px 0 #4c4b4b;
	        		-moz-ox-shadow: inset 0 0 33px 0 #4c4b4b;
	        		-webkit-box-shadow: inset 0 0 33px 0 #4c4b4b;
	        		-khtml-box-shadow: inset 0 0 33px 0 #4c4b4b;
	        	}

	        		.sidebar .currency:hover, .sidebar .currency.active{
	        			background: #dc3545;
						color:#fff;
	        		}

	        		.sidebar .currency span{
	        			clear:left;
	        			float:left;
	        			width: 100%;
	        		}

	        		.sidebar .currency img + span{
	        			font-weight: bold;
	        		}
					
					#jPanelMenu-menu li i, #jPanelMenu-menu li a{
						color:#dc3545;
					}
					
			.cur-search{
				float:left;
				clear:both;
				width:100%;
				margin-top:80px;
			}
				.cur-search input{
					-moz-border-radius:12px;
					-khtml-border-radius:12px;
					-webkit-border-radius:12px;
					-ms-border-radius:12px;
					-o-border-radius:12px;
					border-radius:12px;
					width:100%;
					border:1px solid #dc3545;
					color:#dc3545;
					height:30px;
					text-indent:15px;
					outline:none;
					font-size:16px;
				}
        </style>

        <!--[if lt IE 9]>
            <script src="http://adventurethemes.com/demo/writer/html/v3/js/vendor/html5shiv.min.js"></script>
        <![endif]-->

        <script src="http://adventurethemes.com/demo/writer/html/v3/js/vendor/modernizr.custom.32229-2.8-respondjs-1-4-2.js"></script>
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

                <section class="sidebar col-lg-5 col-12">

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
		                    </div>
	                    <?endforeach?>
                    </div>
                </section><!-- end sidebar -->

                <section class="col-lg-7 col-12 ml-auto main-content">

                </section><!-- main content -->

            </div> <!--/row -->

        </main> <!-- /container -->

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <script src="http://adventurethemes.com/demo/writer/html/v3/js/vendor/jquery.jpanelmenu.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="http://adventurethemes.com/demo/writer/html/v3/js/vendor/bootstrap.min.js"></script>
        <script src="http://adventurethemes.com/demo/writer/html/v3/js/vendor/fastclick.min.js"></script>

        <script src="http://adventurethemes.com/demo/writer/html/v3/js/main.js"></script>
		<script>
		
			$('.cur-search input').keyup(function(){
				_v = $(this).val().trim();
				if(_v.length){
					$('.currency:not(.active)').hide();
					$('.currency:not(.active) .hide:contains("'+_v.toLowerCase()+'")').parent().show();
				}else{
					$('.currency:not(.active)').show();
				}
			});
		</script>
    </body>
</html>
