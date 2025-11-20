( function () {
    var btn = document.getElementById('go'),
    target = document.getElementById('result'),
    container = document.getElementById('resultContainer'),
    clock = document.getElementById('time'),
    lock = document.getElementById('lock'),
    unlock = document.getElementById('unlock'),
    data,
    handle,
    action,
    update;

    btn.onclick = function () {
        data = document.getElementById('text');
        action = this.getAttribute('data-at');
        update = this.getAttribute('data-up');

        if (data.value.length > 0) {
            if (data.value.length <= 255) {
                handle = data.value;
                if (data.value.match(/\+/)) handle = data.value.replace(/\+/g, '_plus');
                data.classList.remove('border-red');
                promissedRequest('POST', 'http://www.crypto.com/api/test.php', `data=${handle}&at=${action}&up=${update}`)
                .then( (res) => {
                    target.innerText = res;
                    container.classList.remove('d-none');
                });
            } else {
                data.classList.add('border-red');
                toast.show('#toastLanding', 'Quantidade de caracteres excedida!');
            }
        } else {
            data.classList.add('border-red');
            toast.show('#toastLanding', 'Insira algum texto!');
        }
    }

    clock.onclick = function () {
        this.classList.contains('actived') ? this.classList.remove('actived') : this.classList.add('actived');
        btn.getAttribute('data-up') == 'static' ? btn.setAttribute('data-up', 'dynamic') : btn.setAttribute('data-up', 'static');
    }

    lock.onclick = function () {
        if (!(this.classList.contains('actived'))) {
            this.classList.add('actived');
        }

        if (unlock.classList.contains('actived')) {
            unlock.classList.remove('actived');
        }

        if (btn.getAttribute('data-at') != 'lock') {
            btn.setAttribute('data-at', 'lock');
        }
    }

    unlock.onclick = function () {
        if (!(this.classList.contains('actived'))) {
            this.classList.add('actived');
        }

        if (lock.classList.contains('actived')) {
            lock.classList.remove('actived');
        }

        if (btn.getAttribute('data-at') != 'unlock') {
            btn.setAttribute('data-at', 'unlock');
        }
    }
})();