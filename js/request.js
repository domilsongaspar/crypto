class CryptoRequest {
    send (callback, param) {
        if (param.match(/\+/)) {
            param = param.replace(/\+/g, "_plus");
        }

        promissedRequest('POST', 'http://www.crypto.com/api/request.php', param)
        .then( function (res) {
            callback(res);
        });
    }
}