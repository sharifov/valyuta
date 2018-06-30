<?php

function getValue($v, $a){
	if(!$a) return $a;
	return round($a*$v,2);
}

$_option=[
	[
		'disabled'=>'disabled="disabled"',
		'amount'=>0,
		'class'=>''
	],
	[
		'disabled'=>'',
		'amount'=>100,
		'class'=>'active'
	]
];


$names = [
    'AED'=>'United Arab Emirates dirham',
    'AFN'=>'Afghan afghani',
    'ALL'=>'Albanian lek',
    'ANG'=>'Netherlands Antillean guilder',
    'AOA'=>'Angolan kwanza',
    'ARS'=>'Argentine peso',
    'AUD'=>'Australian dollar',
    'AWG'=>'Aruban florin',
    'AZN'=>'Azerbaijani manat',
    'BAM'=>'Bosnia and Herzegovina convertible mark',
    'BBD'=>'Barbadian dollar',
    'BDT'=>'Bangladeshi taka',
    'BGN'=>'Bulgarian lev',
    'BHD'=>'Bahraini dinar',
    'BIF'=>'Burundian franc',
    'BMD'=>'Bermudian dollar',
    'BND'=>'Brunei dollar',
    'BOB'=>'Bolivian boliviano',
    'BRL'=>'Brazilian real',
    'BSD'=>'Bahamian dollar',
    'BTC'=>'Bitcoin',
    'BTN'=>'Bhutanese ngultrum',
    'BWP'=>'Botswana pula',
    'BYN'=>'Belarusian ruble',
    'BZD'=>'Belize dollar',
    'CAD'=>'Canadian dollar',
    'CDF'=>'Congolese franc',
    'CHF'=>'Swiss franc',
    'CLF'=>'Cleveland сliffs',
    'CLP'=>'Chilean peso',
    'CNY'=>'Chinese yuan',
    'COP'=>'Colombian peso',
    'CRC'=>'Costa Rican colón',
    'CUC'=>'Cuban convertible peso',
    'CUP'=>'Cuban peso',
    'CVE'=>'Cape Verdean escudo',
    'CZK'=>'Czech koruna',
    'DJF'=>'Djiboutian franc',
    'DKK'=>'Danish krone',
    'DOP'=>'Dominican peso',
    'DZD'=>'Algerian dinar',
    'EGP'=>'Egyptian pound',
    'ERN'=>'Eritrean nakfa',
    'ETB'=>'Ethiopian birr',
    'FJD'=>'Fijian dollar',
    'FKP'=>'Falkland Islands pound',
    'GBP'=>'British pound',
    'GEL'=>'Georgian lari',
    'GGP'=>'Guernsey pound',
    'GHS'=>'Ghanaian cedi',
    'GIP'=>'Gibraltar pound',
    'GMD'=>'Gambian dalasi',
    'GNF'=>'Guinean franc',
    'GTQ'=>'Guatemalan quetzal',
    'GYD'=>'Guyanese dollar',
    'HKD'=>'Hong Kong dollar',
    'HNL'=>'Honduran lempira',
    'HRK'=>'Croatian kuna',
    'HTG'=>'Haitian gourde',
    'HUF'=>'Hungarian forint',
    'IDR'=>'Indonesian rupiah',
    'ILS'=>'Israeli new shekel',
    'IMP'=>'Manx pound',
    'INR'=>'Indian rupee',
    'IQD'=>'Iraqi dinar',
    'IRR'=>'Iranian rial',
    'ISK'=>'Icelandic króna',
    'JEP'=>'Jersey pound',
    'JMD'=>'Jamaican dollar',
    'JOD'=>'Jordanian dinar',
    'JPY'=>'Japanese yen',
    'KES'=>'Kenyan shilling',
    'KGS'=>'Kyrgyzstani som',
    'KHR'=>'Cambodian riel',
    'KMF'=>'Comorian franc',
    'KPW'=>'North Korean won',
    'KRW'=>'South Korean won',
    'KWD'=>'Kuwaiti dinar',
    'KYD'=>'Cayman Islands dollar',
    'KZT'=>'Kazakhstani tenge',
    'LAK'=>'Lao kip',
    'LBP'=>'Lebanese pound',
    'LKR'=>'Sri Lankan rupee',
    'LRD'=>'Liberian dollar',
    'LSL'=>'Lesotho loti',
    'LTL'=>'Lithuanian litas',
    'LVL'=>'Latvian lats',
    'LYD'=>'Libyan dinar',
    'MAD'=>'Moroccan dirham',
    'MDL'=>'Moldovan leu',
    'MGA'=>'Malagasy ariary',
    'MKD'=>'Macedonian denar',
    'MMK'=>'Burmese kyat',
    'MNT'=>'Mongolian tögrög',
    'MOP'=>'Macanese pataca',
    'MRO'=>'Mauritanian ouguiya',
    'MUR'=>'Mauritian rupee',
    'MVR'=>'Maldivian rufiyaa',
    'MWK'=>'Malawian kwacha',
    'MXN'=>'Mexican peso',
    'MYR'=>'Malaysian ringgit',
    'MZN'=>'Mozambican metical',
    'NAD'=>'Namibian dollar',
    'NGN'=>'Nigerian naira',
    'NIO'=>'Nicaraguan córdoba',
    'NOK'=>'Norwegian krone',
    'NPR'=>'Nepalese rupee',
    'NZD'=>'New Zealand dollar',
    'OMR'=>'Omani rial',
    'PAB'=>'Panamanian balboa',
    'PEN'=>'Peruvian sol',
    'PGK'=>'Papua New Guinean kina',
    'PHP'=>'Philippine piso',
    'PKR'=>'Pakistani rupee',
    'PLN'=>'Polish złoty',
    'PYG'=>'Paraguayan guaraní',
    'QAR'=>' Qatari riyal',
    'RON'=>'Romanian leu',
    'RSD'=>'Serbian dinar',
    'RUB'=>'Russian ruble',
    'RWF'=>'Rwandan franc',
    'SAR'=>'Saudi riyal',
    'SBD'=>'Solomon Islands dollar',
    'SCR'=>'Seychellois rupee',
    'SDG'=>'Sudanese pound',
    'SEK'=>'Swedish krona',
    'SGD'=>'Singapore dollar',
    'SHP'=>'Saint Helena pound',
    'SLL'=>'Sierra Leonean leone',
    'SOS'=>'Somali shilling',
    'SRD'=>'Surinamese dollar',
    'STD'=>'São Tomé and Príncipe dobra',
    'SVC'=>'Salvadoran colón',
    'SYP'=>'Syrian pound',
    'SZL'=>'Swazi lilangeni',
    'THB'=>'Thai baht',
    'TJS'=>'Tajikistani somoni',
    'TMT'=>'Turkmenistan manat',
    'TND'=>'Tunisian dinar',
    'TOP'=>'Tongan paʻanga',
    'TRY'=>'Turkish lira',
    'TTD'=>'Trinidad & Tobago dollar',
    'TWD'=>'New Taiwan dollar',
    'TZS'=>'Tanzanian shilling',
    'UAH'=>'Ukrainian hryvnia',
    'UGX'=>'Ugandan shilling',
    'USD'=>'United States dollar',
    'UYU'=>'Uruguayan peso',
    'UZS'=>'Uzbekistani som',
    'VEF'=>'Venezuelan bolívar',
    'VND'=>'Vietnamese dong',
    'VUV'=>'Vanuatu vatu',
    'WST'=>'Samoan tālā',
    'XAF'=>'Central African CFA franc',
    'XAG'=>'Silver Ounce',
    'XAU'=>'Philadelphia Gold and Silver',
    'XCD'=>'East Caribbean dollar',
    'XDR'=>'Special Drawing Rights',
    'XOF'=>'West African CFA franc',
    'XPF'=>'CFP franc',
    'YER'=>'Yemeni rial',
    'ZAR'=>'South African rand',
    'ZMW'=>'Zambian kwacha',
    'ZWL'=>'Zimbabwean dollar',
]; 


//print_R($_COOKIE);

//$xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp?date_req=05/11/2017', null, LIBXML_NOCDATA );
$xml = json_decode(file_get_contents('json.json'));

$valutes = [];
$firsts = [ ['code'=>'eur', 'name'=>'Euro', 'value'=>1, 'is_active'=> true] ];
$seconds =[];

foreach ($xml->rates as $code=>$val) {
	//$code = strtolower((string)$val->targetCurrency);

	$name = $names[$code];
	$code = strtolower($code);
	
	if(in_array($code,['amd','eur']) || !file_exists(__DIR__.'/flags/'.$code.'.png')) continue;

	$data = [
		'code'  => $code,
		//'name'  => str_replace('convertible ', '', (string)$val->targetName),
		'name'  => $name,
		//'value' => (float)$val->exchangeRate,
		'value' => $val,
		'is_active'=> false
	];

	if(in_array($code, explode(',', $_COOKIE['sess']))){
		$data['is_active'] = true;
		$firsts[] = $data;
	}elseif(in_array($code, ['rub', 'usd']))
		$firsts[] = $data;
	elseif(in_array($code, ['ils', 'azn', 'try', 'uah', 'gel', 'byn']))
		$seconds[] = $data;
	else
		$valutes[] = $data;
}

$valutes = array_merge($firsts, $seconds, $valutes);


?><!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="6W1AXr5zNZXf6FSCWqQBPAPoNoNbklRHKaVTOC6F">
        <title>Currency Converter</title>
		<meta property="og:title" content="Currency Converter">
		<meta property="og:description" content="Currency Converter">
		<meta property="og:image" content="http://convertvaluta.com/img/logo.png">
		<meta property="og:image:width" content="100">
		<meta property="og:image:height" content="100">
		<meta property="og:type" content="website"/>
		<meta property="fb:app_id" content="2156449567975101"/>
		<meta property="og:url" content="http://convertvaluta.com">
		<meta property="og:site_name" content="Currency Converter">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="theme-color" content="#9a762c" />
		<meta name="twitter:image:alt" content="Currency Converter">
		<meta name="msapplication-TileImage" content="/img/ms-icon-144x144.png">
		<meta name="msapplication-TileColor" content="#9a762c">
		<link rel="apple-touch-icon" sizes="57x57" href="/img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
        <link rel="stylesheet" href="/css/main.min.css">

        <!--[if lt IE 9]>
            <script src="/js/html5shiv.min.js"></script>
        <![endif]-->
		<script src="/js/modernizer.js"></script>
		<script src="/js/jquery.min.js"></script>
    </head>
    <body>
        <main class="container">
			
				<a href="/" class="logo" title="Convert Valuta"><img src="/img/logo.png" alt="Convert Valuta"/></a>
				
				<!--
                <div id="menu-target">
                     <ul>
                        <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                        <li><i class="fa fa-user"></i><a href="author.html">John Smith</a></li>
                        <li><i class="fa fa-anchor"></i><a href="page.html">About</a></li>
                        <li><i class="fa fa-star"></i><a href="favorites.html">Favorites</a></li>
                        <li><i class="fa fa-paper-plane"></i><a href="contact.html">Contact</a></li>
                    </ul> 
                </div>-->
			
				
                <section class="sidebar col-md-12">
				
					<!--
						<span class="menu-trigger animated fadeInDown">
							<span class="bar"></span>
							<span class="bar"></span>
							<span class="bar"></span>
						</span> 
					-->
					
                    <div class="currencies">
						<?foreach($valutes as $k=>$v):?>
							<div class="currency <?if($k==0):?>convert<?endif?> <?=$_option[$v['is_active']]['class']?>" data-currency="<?=$v['value']?>">
								<img src="/flags/<?=$v['code']?>.png">
								<span><?=strtoupper($v['code'])?></span>
								<span><?=$v['name']?></span>
								<div class="hide"><?=strtolower($v['code'].' '.$v['name'])?></div>
								<input type="text" name="amount" <?=$_option[$v['is_active']]['disabled']?> value="<?=getValue($v['value'], $_option[$v['is_active']]['amount'])?>">
								<img class="to" src="/flags/eur.png">
								<i class="times" aria-hidden="true">&#10006;</i>
							</div>
						<?endforeach?>
                    </div>
					
					<div class="cur-search">
						<input type="text" placeholder="Search currency"/>
					</div>
					
					<!--LiveInternet counter-->
					<script type="text/javascript">
						document.write("<a href='//www.liveinternet.ru/click' "+
						"target=_blank><img src='//counter.yadro.ru/hit?t28.6;r"+
						escape(document.referrer)+((typeof(screen)=="undefined")?"":
						";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
						screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
						";h"+escape(document.title.substring(0,150))+";"+Math.random()+
						"' alt='' title='LiveInternet' "+
						"border='0' width='88' height='120'><\/a>")
					</script>
					<!--/LiveInternet-->
                </section>
        </main> <!-- /container -->
		
        <script src="/js/main.js"></script>
    </body>
</html>
