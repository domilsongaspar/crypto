( function () {
    var icon = document.querySelectorAll(".icon_switch"),
    show, hide;
    icon.forEach( function (element) {
        element.addEventListener("click", function () {
            show = function (target) {
                let element = document.querySelector(target);
                element.type = "text";
            }

            hide = function (target) {
                let element = document.querySelector(target);
                element.type = "password";
            }

            let t = "#" + element.previousElementSibling.id;

            findValue(element.classList.value, "fa-eye-slash") ? alterIcon(element, "fa-eye-slash", "fa-eye", show(t)) : alterIcon(element, "fa-eye", "fa-eye-slash", hide(t));
        });
    });
    
})();

function alterIcon (element, replaceClass, replaceIcon, callback = null) {
    element.classList.replace(replaceClass, replaceIcon);
    if (callback !== null) callback();
}

function findValue (local, value) {
    if (local.match(value)) return true;
    
    return false;
}