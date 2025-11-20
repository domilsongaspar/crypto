var settings = document.getElementById('settings'),
    newCrypto = document.getElementById('newCryptography'),
    lang = document.getElementById('lang'),
    mask = document.getElementById('mask'),
    closeBtn = document.querySelectorAll('.closeIcon'),
    userId = document.getElementById('userId'),
    newCryptoContainer = document.getElementById('newCryptoContainer'),    
    editCryptoContainer = document.getElementById('editCryptoContainer'),
    newCryptoBtn = document.getElementById('finish'),    
    edName = document.getElementById('edName'),
    edIcon = document.querySelectorAll('.editIcon'),    
    finish = document.querySelectorAll('#editCryptoContainer .finish'),
    del = document.querySelectorAll('#editCryptoContainer .delete'),
    cryptoName,
    cryptoCode,
    manageBtn,
    msg;

( function () {

    loadContainers();

    closeBtn.forEach( (btn) => {
        btn.onclick = function () {
            if (this.parentElement.classList.contains('slideInUp'))
                this.parentElement.classList.remove('slideInUp');

            this.parentElement.classList.add('fadeOut');
            this.parentElement.classList.add('none');
            mask.classList.add('none');
        }
    });

    settings.onclick = function () {
        mask.classList.remove('none');
        document.getElementById('idContainer').classList.remove('none');
        document.getElementById('idContainer').classList.add('slideInUp');
    }

    newCrypto.onclick = function () {
        newCryptoContainer.classList.remove('none');
        newCryptoContainer.classList.add('slideInUp');        
        mask.classList.remove('none');
    }    
    
    edIcon.forEach( (btn) => {
        btn.onclick = function () {
            this.previousElementSibling.removeAttribute('disabled');
        }
    });

    newCryptoBtn.onclick = function () {
        cryptoName = document.getElementById('name');
        newCryptoContainer.classList.add('none');
        mask.classList.add('none');
        createCrypto(cryptoName.value);        
    }    
})();

function changeName (name) {
    promissedRequest('POST', 'http://www.crypto.com/api/handle.php', `at=change&data=${name}`)
    .then( (res) => {
        if (res == 'ok') toast.show('#tt-target', 'Done!');
        else toast.show('#tt-target', 'Ups, operation failed!');
    });
}

function createCrypto (user) {
    promissedRequest('POST', 'http://www.crypto.com/api/handle.php', `at=new&data=${user}`)
    .then( (res) => {
        if (res == 'ok') toast.show('#tt-target', 'Done!');
        else if (res == 'exists') toast.show('#tt-target', 'It cryptography name already has been used!');
        else toast.show('#tt-target', res);

        loadContainers();
    });
}

function deleteCrypto (code) {
    promissedRequest('POST', 'http://www.crypto.com/api/handle.php', `at=del&data=${code}`)
    .then( (res) => {
        if (res == 'ok') toast.show('#tt-target', 'Done!');
        else toast.show('#tt-target', res);

        loadContainers();
    });
}

function loadContainers () {
    promissedRequest('POST', 'http://www.crypto.com/api/get.php', `at=get&lang=${lang.value}`)
    .then( (res) => {
        if (res == 'empty') {
            msg = (lang.value == 'en') ? 'No cryptography founded, make a cryptography to manage it.' : 'Nenhuma criptografia encontrada, crie uma criptografia para gerenciá-la.';
            document.getElementById('main').innerHTML = '<p class="empty">'+ msg +'</p>';
        } else {
            document.getElementById('main').innerHTML = res;
            manageBtn = document.querySelectorAll('.manageBtn');
            manageBtn.forEach( (btn) => {
                btn.onclick = function () {
                    editCryptoContainer.classList.remove('none');
                    editCryptoContainer.classList.add('slideInUp');        
                    mask.classList.remove('none');
        
                    cryptoCode = this.parentElement.getAttribute('data-id');
                    edName.value = this.parentElement.getAttribute('data-title');
                }
            });

            finish.forEach( (btn) => {
                btn.onclick = function () {
                    if (!this.parentElement.previousElementSibling.children[0].hasAttribute('disabled')) {
                        changeName(this.parentElement.previousElementSibling.children[0].value);
                    }            
                }
            });
        
            del.forEach ( (btn) => {
                btn.onclick = function () {
                    editCryptoContainer.classList.add('none');
                    mask.classList.add('none');
                    deleteCrypto(cryptoCode);
                }
            });
        }
    });
}