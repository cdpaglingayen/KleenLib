var elems = document.getElementsByClassName('confirmation1');
var confirmIt = function (e) {
    if (!confirm('Are you sure you want to approve this borrow?')) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}