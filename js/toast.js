var toast = {
    show : function (element, message, replace = false) {
        let target = document.querySelector(element);
        let span = document.createElement("span");
        span.textContent = message;
        span.classList = "toast";
        this.active ? false : replace ? target.innerHTML = `<span class='toast'>${message}</span>` : target.appendChild(span);

        this.active ? span.style.display = "none" : toast.fadeIn(span, 50);
    } ,
    fadeIn : function (element, time) {
        animation (element, time, 0, 400);
        this.active = true;
    } ,
    fadeOut : function (element, time) {
        animation (element, time, 50, 0);
        this.active = false;
    },
    active : false
}

function animation (element, time, start, end) {
    opacity = start;
    element.style.opacity = opacity;

    interval = setInterval ( () => {
        if (opacity == end) {
            clearInterval (interval);
            toast.fadeOut(element, time);
            
        } else if (opacity > end) {
            opacity -= 10;
            element.style.opacity = opacity / 100;
            element.style.filter = `alpha(opacity="${opacity}")`;

            if (opacity == end) {
                element.style.display = "none";
                clearInterval (interval);
            }

        } else {
            opacity += 10;
            element.style.opacity = opacity / 100;
            element.style.filter = `alpha(opacity="${opacity}")`;
        }

    }, time);
}