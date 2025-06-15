document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.province-name').forEach(province => {
        province.addEventListener('click', function () {
            const target = document.getElementById(this.dataset.target);
            target.style.display = target.style.display === 'none' ? 'block' : 'none';
            target.classList.toggle('fade-in');
        });
    });
});
