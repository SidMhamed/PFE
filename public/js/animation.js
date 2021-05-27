$(document).ready(function() {
    $("a").animate({
        width: "50px",
        fontSize: "20px"

    });
});
// $("#backtotop").on("click", (function(e) {
//     e.preventDefault();
//     $("html,body").animate({
//         scrollTop: 0
//     }, 700)
// }));
/**
 *Exampe from https://kottenator.github.io/jquery-circle-progress/
 */
var progressBarOptions = {
    startAngle: -1.55,
    size: 200,
    value: 0.75,
    fill: {
        color: "#ffa500"
    }
};

$(".circle")
    .circleProgress(progressBarOptions)
    .on("circle-animation-progress", function(event, progress, stepValue) {
        $(this)
            .find("strong")
            .text(String(stepValue.toFixed(2)).substr(1));
    });

$("#circle-b").circleProgress({
    value: 0.25,
    fill: {
        color: "#FF0000"
    }
});

$("#circle-c").circleProgress({
            value: 0.1,
            fill: {
                color: "#008000"
            }
            // });
            // var ctx = document.getElementById('circularLoader').getContext('2d');
            // var al = 0;
            // var start = 4.72;
            // var cw = ctx.canvas.width;
            // var ch = ctx.canvas.height;
            // var diff;

            // function progressSim() {
            //     diff = ((al / 100) * Math.PI * 2 * 10).toFixed(2);
            //     ctx.clearRect(0, 0, cw, ch);
            //     ctx.lineWidth = 17;
            //     ctx.fillStyle = '#4285f4';
            //     ctx.strokeStyle = "#4285f4";
            //     ctx.textAlign = "center";
            //     ctx.font = "28px monospace";
            //     ctx.fillText(al + '%', cw * .52, ch * .5 + 5, cw + 12);
            //     ctx.beginPath();
            //     ctx.arc(100, 100, 75, start, diff / 10 + start, false);
            //     ctx.stroke();
            //     if (al >= 100) {
            //         clearTimeout(sim);
            //         // Add scripting here that will run when progress completes
            //     }
            //     al++;
            // }
            // var sim = setInterval(progressSim, 50);