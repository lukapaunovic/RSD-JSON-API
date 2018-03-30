# RSD-JSON-API

You should setup a cron job to run cron.php once a day so it updates nbs.html file with newest exchange rates. This way we will prevent sending requests to NBS every time you send request to API.

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
As you can see you are getting how much is one unit of foreign currency in Serbian dinars (RSD).

This is how you use the API:
```
<?php
$str = file_get_contents('http://example.com/duo_json.php');
$json = json_decode($str, true); // decode the JSON into an associative array


function getRatebyCode($arr, $code){
    foreach($arr as $item){
        if ($item->code == $code)
            return $item->rate;
    }
}
            
$usd_rate = getRatebyCode($json, "USD"); // Rate for USD
```

