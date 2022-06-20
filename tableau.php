
<?php

$plus = ['TF1',
'TMC',
'TFX',
'LCI',
'TF1 Séries Films',
'M6',
'W9',
'6ter',
'Gulli',
'Luxe TV',
'Luxe TV 4K',
'Cheddar',
'Fashion TV',
'The Explorers',
'Winamax TV',
'Action',
'B Smart',
'Gong',
'Gong Max',
'KTO',
'Lucky Jack',
'Mezzo',
'Nautical Channel',
'NRJ Hits',
'RTL9',
'Trek',
'Trace Urban',
'Trace Carribean',
'Trace Sports Stars',
'Trace Latina',
'Equidia',
'i24',
'TV5',
'Euronews',
'France24',
'Top Santé TV',
'Gourmand TV',
'Culturebox',
'Playboy TV'];


$extended = ['TF1'
,'TMC'
,'TFX'
,'LCI'
,'TF1 Séries Films'
,'M6'
,'W9'
,'6ter'
,'Gulli'
,'AB1'
,'ACTION'
,'Adult Swim'
,'Animaux'
,'Automoto'
,'BET *'
,'Boing '
,'Boomerang '
,'Canal J'
,'Chasse & Pêche'
,'CNN'
,'Comedy Central*'
,'Crime District'
,'Game One *'
,'Golf Channel'
,'GONG'
,'GONG MAX'
,'J One*'
,'Lucky Jack TV'
,'M6 Music'
,'MANGAS'
,'Mezzo'
,'Mezzo Live HD'
,'MTV*'
,'MTV Hits*'
,'Nautical'
,'nickelodeon*'
,'nickelodeon +1*'
,'nickelodeon junior*'
,'nickelodeon teen*'
,'NRJ Hits'
,'Paramount Channel *'
,'Paramount Channel Décalé*'
,'Paris Première'
,'RTL 9'
,'Science et Vie'
,'TCM Cinéma '
,'Téva'
,'Tiji'
,'Toonami '
,'Toute l\'Histoire'
,'Trace Sport Stars'
,'Trace Tropical'
,'Trace Urban'
,'Trace Latina'
,'TREK'
,'KTO'
,'B SMART'
,'TV5 Monde'
,'France 24'
,'Euronews'
,'Cheddar'
,'Fashion TV'
,'Luxe TV'
,'Luxe TV 4K'
,'The Explorers'
,'Winamax TV'
,'i24 en français'
,'i24 en anglais'
,'i24 en arabe'
,'Top Santé TV'
,'Gourmand TV'
,'Culturebox'];

$basic = [
'France 2'
,'France 3'
,'France 5'
,'Arte'
,' C8 *'
,'NRJ 12'
,'LCP / Public Sénat'
,'France 4'
,'BFMTV'
,'C News *'
,'C Star *'
,'L\'équipe *'
,'RMC Story'
,'RMC Découverte'
,'Chérie 25'
,'FranceInfo '
,'Ina'
,'BFM Business'
,'BFM Paris'
,'BFM Lyon Métropole'
,'Figaro Live'
,'LCP 100%'
,'Public Sénat'
,'Sport en France'
,'Okoo'
,'Mango'
,'Brut'
,'Kabillion'
,'Wild Side TV'
,'CGTN'
,'CGTN FR'
];

$diffBasicPlus = array_udiff($plus, $basic, 'strcasecmp');

print_r('difference entre plus et basic'.PHP_EOL);
print_r($diffBasicPlus);

print_r('-------------------------------'.PHP_EOL);

$diffExtendPlus = array_udiff($extended, $plus, 'strcasecmp');

print_r('difference entre plus et extended'.PHP_EOL);
print_r($diffExtendPlus);

print_r('-------------------------------'.PHP_EOL);
