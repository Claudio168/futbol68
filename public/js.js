document.addEventListener('DOMContentLoaded', function() {
    var superMenu = document.getElementById('super-menu');
    var subMenu = superMenu.querySelector('ul');

    superMenu.addEventListener('click', function() {
        subMenu.classList.toggle('hidden');
    });
});
