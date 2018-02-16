// make sure ScrollReveal is loaded before
function Reveals() {
    "use strict";
    window.sr = new ScrollReveal();
}

function debounce(func, wait, immediate) {
    "use strict";
    var timeout;
    return function() {
        var context = this, args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        }, wait);
        if (immediate && !timeout) func.apply(context, args);
    };
}

function sameHeight($class) {
    "use strict";
    var resizeDebounced = debounce(function() {
            var elements = document.querySelectorAll($class);
            var nrOfElements = elements.length;
            var elementsArray = [];

            for (var j = 0; j < nrOfElements; j++) {
                elementsArray.push(elements[j].offsetHeight);
            }

            /*console.log(elementsArray); */

            Array.prototype.max = function() {
                return Math.max.apply(null, elementsArray);
            };

            Array.prototype.min = function() {
                return Math.min.apply(null, elementsArray);
            };

            for (var i = 0; i < nrOfElements; i++) {

                var el = elements[i].parentNode.style;
                el.minHeight = elementsArray.max() + 'px';
            }
            /*console.log("Max value is: "+ elementsArray.max()+"\nMin value is: "+ elementsArray.min());*/
    }, 250);

    resizeDebounced();

    window.addEventListener('resize', resizeDebounced);
}

Reveals();


