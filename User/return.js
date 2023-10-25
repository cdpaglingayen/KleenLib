var elems = document.getElementsByClassName('confirmation');
var confirmIt = function (e) {
    if (!confirm('Please, Proceed to the admin for payment')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}