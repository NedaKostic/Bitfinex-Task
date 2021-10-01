var websocket1 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let websocket2 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let websocket3 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let websocket4 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");
let websocket5 = new WebSocket("wss://api-pub.bitfinex.com/ws/2");


function getSocket(ws, symbol, symbolID) {

    ws.onopen = function () {
        ws.send(JSON.stringify({
            "event": "subscribe",
            "channel": "ticker",
            "symbol": symbol
        }))
    }

    ws.onmessage = function (msg) {
        let response = JSON.parse(msg.data);
        console.log(response);
        let hb = response;
        if (hb instanceof Array && hb[1] !== "hb") {
            document.getElementById("lastPrice" + symbolID).innerHTML = hb[1][6];
            document.getElementById("dailyChange" + symbolID).innerHTML = hb[1][4];
            document.getElementById("dailyChangePercent" + symbolID).innerHTML = Math.round(hb[1][5] * 100) / 100 + " %";
            document.getElementById("dailyHigh" + symbolID).innerHTML = hb[1][8];
            document.getElementById("dailyLow" + symbolID).innerHTML = hb[1][9];
        }
    }

}


getSocket(websocket1, "tBTCUSD", "BTCUSD");
getSocket(websocket2, "tLTCUSD", "LTCUSD");
getSocket(websocket3, "tLTCBTC", "LTCBTC");
getSocket(websocket4, "tETHUSD", "ETHUSD");
getSocket(websocket5, "tETHBTC", "ETHBTC");
