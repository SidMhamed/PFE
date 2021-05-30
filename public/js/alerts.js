let alert_close_icons = document.querySelectorAll('.alerts>.close');
if (alert_close_icons) {
    alert_close_icons.forEach((alert_close_icon) => {
        alert_close_icon.addEventListener('click', function () {
            this.closest('.alerts').classList.add('close');

            this.closest('.alerts').addEventListener('transitionend', function (event) {
                if (event.propertyName == 'transform') {
                    this.remove();
                }
            });
        });
    });
}
