# RSD-JSON-API
What you need to use this api?

You should setup a cron to run the cron.php file once a day so it updates nbs.html file with all its currencies. This way we will prevent requests to NBS every time you need info about the exchange rates.

Sample output when accessing duo_json.php
```
[
    {
        "code": "EUR",
        "name": "EMU",
        "rate": "119.8383"
    },
    {
        "code": "AUD",
        "name": "Australija",
        "rate": "77.6658"
    },
    {
        "code": "CAD",
        "name": "Kanada",
        "rate": "79.0647"
    },
    {
        "code": "CNY",
        "name": "Kina",
        "rate": "15.3319"
    },
    {
        "code": "DKK",
        "name": "Danska",
        "rate": "16.0989"
    },
    {
        "code": "JPY",
        "name": "Japan",
        "rate": "89.9958"
    },
    {
        "code": "NOK",
        "name": "Norveška",
        "rate": "12.1732"
    },
    {
        "code": "RUB",
        "name": "Ruska Federacija",
        "rate": "1.7285"
    },
    {
        "code": "SEK",
        "name": "Švedska",
        "rate": "12.0435"
    },
    {
        "code": "CHF",
        "name": "Švajcarska",
        "rate": "102.9097"
    },
    {
        "code": "GBP",
        "name": "Velika Britanija",
        "rate": "136.1026"
    },
    {
        "code": "USD",
        "name": "SAD",
        "rate": "101.3261"
    },
    {
        "code": "TRY",
        "name": "Turska",
        "rate": "26.5147"
    }
]
```
As you can see you are getting how much is 1 EUR, 1 AUD, 1 CAD etc in serbian dinars (RSD).

This is how you use the API:
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

