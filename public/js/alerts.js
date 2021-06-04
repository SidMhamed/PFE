// let alert_close_icons = document.querySelectorAll('.alerts>.close');
// if (alert_close_icons) {
//     alert_close_icons.forEach((alert_close_icon) => {
//         alert_close_icon.addEventListener('click', function () {
//             this.closest('.alerts').classList.add('close');

//             this.closest('.alerts').addEventListener('transitionend', function (event) {
//                 if (event.propertyName == 'transform') {
//                     this.remove();
//                 }
//             });
//         });
//     });
// }

$('button').click(function(){
    $('.alerts').removeClass('hide');
    $('.alerts').addClass('show');
    $('.alerts').addClass('showAlert');
    setTimeout(function(){

    $('.alerts').addClass('hide');
    $('.alerts').removeClass('show');

    }, 5000);//hide alert  automatically  after 5sec

            });
    $('.close').click(function(){
    $('.alerts').addClass('hide');
    $('.alerts').removeClass('show');

            });
