( function () {
    var navBtn = document.getElementById('navbarBtn'),
    navBtnClose = document.getElementById('navbarClose'),
    maskAll = document.querySelector('.maskAll'),
    pt = document.getElementById('pt'),
    en = document.getElementById('en'),
    pt_1 = document.getElementById('pt_1'),
    en_1 = document.getElementById('en_1');

    navBtn.onclick = function () {
        var navLinks = document.querySelector('.menuHidden');        

        if (navLinks.classList.contains('slideOutLeft')) {
            navLinks.classList.remove('slideOutLeft')
        }

        navLinks.style.display = 'block';
        maskAll.style.display = 'block';
        navLinks.classList.add('slideInLeft');
    }

    navBtnClose.onclick = function () {
        var navLinks = document.querySelector('.menuHidden');        

        if (navLinks.classList.contains('slideInLeft')) {
            navLinks.classList.remove('slideInLeft')
        }

        navLinks.classList.add('slideOutLeft');
        maskAll.style.display = 'none';
    }

    pt.onclick = function () {
        location.href = 'http://www.crypto.com/pt';
    }

    en.onclick = function () {
        location.href = 'http://www.crypto.com/en';
    }

    pt_1.onclick = function () {
        location.href = 'http://www.crypto.com/pt';
    }

    en_1.onclick = function () {
        location.href = 'http://www.crypto.com/en';
    }
})();