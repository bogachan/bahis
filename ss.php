<?php
require 'vendor/autoload.php';
use Goutte\Client;
/*---------------------------*/



$client = new Client();

$crawler = $client->request('GET', 'https://www.bilyoner.com/iddaa/top50.jsp');

$takimlar = $crawler->filter('div.top50-fteams')->each(function ($node ,$i) {
    return $node->text();
});

$ligler = $crawler->filter('span.league')->each(function ($node ,$i) {
    return $node->text();
});


$tarihler = $crawler->filter('td[width="44"]')->each(function ($node ,$i) {
    return $node->text();
});

$oranbir = $crawler->filterXPath('//*[@id="futbol"]/form/*[@class="top50-satir"]/tr/td[7]/div/div[1]/strong')->each(function ($node ,$i) {
    return $node->text();
});

$oransifir = $crawler->filterXPath('//*[@id="futbol"]/form/*[@class="top50-satir"]/tr/td[8]/div/div[1]/strong')->each(function ($node ,$i) {
    return $node->text();
});

$oraniki = $crawler->filterXPath('//*[@id="futbol"]/form/*[@class="top50-satir"]/tr/td[9]/div/div[1]/strong')->each(function ($node ,$i) {
    return $node->text();
});

$oranalt = $crawler->filterXPath('//*[@id="futbol"]/form/*[@class="top50-satir"]/tr/td[10]/div/div[1]/strong')->each(function ($node ,$i) {
    return $node->text();
});

$oranust = $crawler->filterXPath('//*[@id="futbol"]/form/*[@class="top50-satir"]/tr/td[11]/div/div[1]/strong')->each(function ($node ,$i) {
    return $node->text();
});

$list = array();
$j = 0;
for ($i=0; $i < 2 ; $i++) {

    $list[$j] = '
    <tr>
                                        <td>
                                            <span class="time">'.$tarihler[$i].'</span>
                                            <span class="date">10 Nov</span>
                                        </td>
                                        <td>
                                            <span class="team">'.$takimlar[$i].'</span>
                                            <span class="team">'.$ligler[$i].'</span>
                                        </td>
                                        <td>
                                            <span class="contry"></span>
                                            <span class="lig"></span>
                                        </td>
                                        <td>
                                            <span class="rate">'.$oranbir[$i].'</span>
                                        </td>
                                        <td>
                                            <span class="rate">'.$oransifir[$i].'</span>
                                        </td>
                                        <td>
                                            <span class="rate">'.$oraniki[$i].'</span>
                                        </td>
                                        <td>
                                            <span class="up">2.5</span>
                                        </td>
                                        <td>
                                            <span class="rate">'.$oranust[$i].'</span>
                                        </td>
                                        <td>
                                            <span class="rate">'.$oranalt[$i].'</span>
                                        </td>
                                    </tr>
                                    ';
    $j++;

}

echo implode(" ",$list);


?>