window.onload = function () {
    var nxtBtn = document.getElementById('next');
    var finish = document.getElementById('finish');
    var lang = document.getElementById('lang').value;
    var name,
    lastName,
    email,
    password,
    confirm;

    nxtBtn.onclick = function () {
        var visible = document.querySelectorAll('.visible'),
        hidden = document.querySelectorAll('.hidden'),
        allInputs = document.querySelectorAll('.input'),
        control = '';

        allInputs.forEach( (input) => {
            if (input.value == '') {
                input.classList.add('border-red');
                control = input.id;
            } else {
                if (input.classList.contains('border-red'))
                    input.classList.remove('border-red');
            }
        });

        if (control == '') {
            visible.forEach( (elem) => {
                elem.classList.add('fadeOut');
                elem.classList.add('hidden');
                elem.classList.remove('visible');
    
                if (elem.classList.contains('fadeIn'))
                    elem.classList.remove('fadeIn');
            });
    
            hidden.forEach( (elem) => {
                elem.classList.remove('hidden');
                elem.classList.add('fadeIn');
                elem.classList.add('visible');
    
                if (elem.classList.contains('fadeOut'))
                    elem.classList.remove('fadeOut');
            });

            //Go to next step
            let current = document.querySelector('.currentStep');
            current.nextElementSibling.classList.add('currentStep');
            current.classList.remove('currentStep');   
        }           
    }

    finish.onclick = function () {
        let allInputs = document.querySelectorAll('.input > input'),
        control = '';
        name = document.getElementById('name').value;
        lastName = document.getElementById('lastName').value;
        email = document.getElementById('email').value;        
        password = document.getElementById('password').value;
        confirm = document.getElementById('confirm').value;
        
        allInputs.forEach( (input) => {
            if (input.value == '') {
                input.parentElement.classList.add('border-red');
                control = input.id;
            } else {
                if (input.classList.contains('border-red'))
                    input.classList.remove('border-red');
            }
        });

        let datas = {
            'name' : name + ' ' + lastName,
            'email' : email,
            'password' : password
        }

        datas = JSON.stringify(datas);

        if (control == '' & confirm === password) {
            promissedRequest('POST', 'http://www.crypto.com/'+ lang +'/register/insert.php', `datas=${datas}&sended=1`)
            .then( (res) => {
                setInterval( function () {
                    location.href = 'http://www.crypto.com/'+ lang +'/accounts/home.php';
                }, 2000);                
            });
        } else if (control == '' && confirm !== password) {
            alert('Confirm password value is different of password');
        }            
    }

    //Back to first step
    let beforeStep = document.querySelector('.steps .one');
    beforeStep.onclick = function () {
        if (!(beforeStep.classList.contains('currentStep'))) {
            document.querySelector('.currentStep').classList.remove('currentStep');
            beforeStep.classList.add('currentStep');

            var visible = document.querySelectorAll('.visible');
            var hidden = document.querySelectorAll('.hidden');
            
            visible.forEach( (elem) => {
                elem.classList.add('fadeOut');
                elem.classList.add('hidden');
                elem.classList.remove('visible');
                elem.classList.remove('fadeIn');
            });

            hidden.forEach( (elem) => {
                elem.classList.remove('hidden');
                elem.classList.remove('fadeOut');
                elem.classList.add('fadeIn');
                elem.classList.add('visible');
            });
        }
    }
}