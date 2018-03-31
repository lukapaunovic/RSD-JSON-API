# RSD-JSON-API

## Setup

You need to set daily cronjob for cron.php. Every time cron runs new rates will be stored in nbs.html file.
Before doing that, edit cron.php and define full path to nbs.html file.
This way we will prevent sending requests to the NBS each time someone send a request to the API.

## Sample API output - duo_json.php
```
[
    {
        "currency_code": "978",
        "country_name": "EMU",
        "currency_name": "EUR",
        "sell_rate": "118.7405",
        "buy_rate": "118.0301"
    },
    {
        "currency_code": "36",
        "country_name": "Australija",
        "currency_name": "AUD",
        "sell_rate": "74.0554",
        "buy_rate": "73.6124"
    },
    {
        "currency_code": "124",
        "country_name": "Kanada",
        "currency_name": "CAD",
        "sell_rate": "74.7971",
        "buy_rate": "74.3497"
    },
    {
        "currency_code": "156",
        "country_name": "Kina",
        "currency_name": "CNY",
        "sell_rate": "15.3674",
        "buy_rate": "15.2754"
    },
    {
        "currency_code": "191",
        "country_name": "Hrvatska",
        "currency_name": "HRK",
        "sell_rate": "15.9618",
        "buy_rate": "15.8664"
    },
    {
        "currency_code": "203",
        "country_name": "Češka Republika",
        "currency_name": "CZK",
        "sell_rate": "4.6761",
        "buy_rate": "4.6481"
    },
    {
        "currency_code": "208",
        "country_name": "Danska",
        "currency_name": "DKK",
        "sell_rate": "15.9229",
        "buy_rate": "15.8277"
    },
    {
        "currency_code": "348",
        "country_name": "Mađarska",
        "currency_name": "HUF",
        "sell_rate": "37.9860",
        "buy_rate": "37.7588"
    },
    {
        "currency_code": "392",
        "country_name": "Japan",
        "currency_name": "JPY",
        "sell_rate": "90.7594",
        "buy_rate": "90.2164"
    },
    {
        "currency_code": "414",
        "country_name": "Kuvajt",
        "currency_name": "KWD",
        "sell_rate": "321.7899",
        "buy_rate": "319.8649"
    },
    {
        "currency_code": "578",
        "country_name": "Norveška",
        "currency_name": "NOK",
        "sell_rate": "12.2962",
        "buy_rate": "12.2226"
    },
    {
        "currency_code": "643",
        "country_name": "Ruska Federacija",
        "currency_name": "RUB",
        "sell_rate": "1.6837",
        "buy_rate": "1.6737"
    },
    {
        "currency_code": "752",
        "country_name": "Švedska",
        "currency_name": "SEK",
        "sell_rate": "11.5375",
        "buy_rate": "11.4685"
    },
    {
        "currency_code": "756",
        "country_name": "Švajcarska",
        "currency_name": "CHF",
        "sell_rate": "100.9527",
        "buy_rate": "100.3487"
    },
    {
        "currency_code": "826",
        "country_name": "Velika Britanija",
        "currency_name": "GBP",
        "sell_rate": "135.2705",
        "buy_rate": "134.4613"
    },
    {
        "currency_code": "840",
        "country_name": "SAD",
        "currency_name": "USD",
        "sell_rate": "96.3725",
        "buy_rate": "95.7959"
    },
    {
        "currency_code": "946",
        "country_name": "Rumunija",
        "currency_name": "RON",
        "sell_rate": "25.4601",
        "buy_rate": "25.3077"
    },
    {
        "currency_code": "949",
        "country_name": "Turska",
        "currency_name": "TRY",
        "sell_rate": "24.4206",
        "buy_rate": "24.2746"
    },
    {
        "currency_code": "975",
        "country_name": "Bugarska",
        "currency_name": "BGN",
        "sell_rate": "60.7110",
        "buy_rate": "60.3478"
    },
    {
        "currency_code": "977",
        "country_name": "Bosna i Hercegovina",
        "currency_name": "BAM",
        "sell_rate": "60.7110",
        "buy_rate": "60.3478"
    },
    {
        "currency_code": "985",
        "country_name": "Poljska",
        "currency_name": "PLN",
        "sell_rate": "28.1589",
        "buy_rate": "27.9905"
    }
]
```

## Usage

As you can see you are getting how much is one unit of foreign currency in Serbian dinars (RSD).
If you want to see how much is one unit of Serbian dinar (1 RSD) add `?to_original=yes` to api url.
This is how you use the API:
```
<?php
$str = file_get_contents('http://example.com/duo_json.php');
$json = json_decode($str, true); // decode the JSON into an associative array

function getValuebyCode($arr, $code, $object){
    foreach($arr as $item){
        if ($item['currency_name'] === $code)
            return $item[$object];
    }
}

echo getValuebyCode($json, "USD", "currency_code"); // Currency code for USD
echo getValuebyCode($json, "USD", "country_name"); // Country_name for USD
echo getValuebyCode($json, "USD", "sell_rate"); // Sell rate for USD
echo getValuebyCode($json, "USD", "buy_rate"); // Buy rate for USD
```

