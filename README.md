# RSD-JSON-API
What you need to use this api?

You should setup cron to run cron.php once a day so it updates nbs.html file with all its currencies. This way we will prevent requests to NBS every time you need info about exchange rates.

Sample output when accessing duo_json.php
```
[
    {
        "code": "EUR",
        "name": "EMU",
        "rate": "120.4837"
    },
    {
        "code": "AUD",
        "name": "Australija",
        "rate": "81.7670"
    },
    {
        "code": "CAD",
        "name": "Kanada",
        "rate": "82.9606"
    },
    {
        "code": "CNY",
        "name": "Kina",
        "rate": "15.5728"
    },
    {
        "code": "DKK",
        "name": "Danska",
        "rate": "16.2002"
    },
    {
        "code": "JPY",
        "name": "Japan",
        "rate": "93.1095"
    },
    {
        "code": "NOK",
        "name": "NorveÅ¡ka",
        "rate": "12.7966"
    },
    {
        "code": "RUB",
        "name": "Ruska Federacija",
        "rate": "1.7631"
    },
    {
        "code": "SEK",
        "name": "Å vedska",
        "rate": "12.6374"
    },
    {
        "code": "CHF",
        "name": "Å vajcarska",
        "rate": "109.2426"
    },
    {
        "code": "GBP",
        "name": "Velika Britanija",
        "rate": "136.8666"
    },
    {
        "code": "USD",
        "name": "SAD",
        "rate": "105.6318"
    }
]
```
As you can see you are getting how much is 1 EUR, 1 AUD, 1 CAD etc in serbian dinars.

This is how you use API:
```
<?php
$str = file_get_contents('http://example.com/duo_json.php');
$json = json_decode($str, true); // decode the JSON into an associative array

echo $json[0]['rate']; //Outputs rate: 120.4837
echo $json[0]['name']; //Outputs currency name: EMU
echo $json[0]['code']; //Outputs currency code: EUR

echo $json[1]['rate']; //Outputs rate: 81.7670
echo $json[1]['name']; //Outputs currency name: Australija
echo $json[1]['code']; //Outputs currency code: AUD
```
And so on...

