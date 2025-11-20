function promissedRequest(type, url, params = '') {
    return new Promise( function (resolve, reject) {
        const xhr = new XMLHttpRequest();
        xhr.open(type, url, true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(params);
        xhr.onreadystatechange = () => {
            if (xhr.readyState !== 4) {
                return;
            }
            if (xhr.status === 200) {
                resolve(xhr.responseText);
            } else {
                const error = xhr.statusText || 'Error!';
                reject(error);
            }
        };
    });
}