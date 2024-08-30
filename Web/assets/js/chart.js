$(document).ready(function () {
    const darkGrid = "#393D41";
    const darkText = "#DEE2E6";
    const lightGrid = "#E6E6E6";
    const lightText = "#495057";
    if ($("#light-theme").hasClass("active")) {
        chartData.options.scales.x.grid.color = lightGrid;
        chartData.options.scales.y.grid.color = lightGrid;
        chartData.options.scales.x.ticks.color = lightText;
        chartData.options.scales.y.ticks.color = lightText;
        chartData.options.plugins.legend.labels.color = lightText;
        chartData.update();
    } else if (
        $("#dark-theme").hasClass("active") |
        $("#auto-theme").hasClass("active")
    ) {
        chartData.options.scales.x.grid.color = darkGrid;
        chartData.options.scales.y.grid.color = darkGrid;
        chartData.options.scales.x.ticks.color = darkText;
        chartData.options.scales.y.ticks.color = darkText;
        chartData.options.plugins.legend.labels.color = darkText;
        chartData.update();
    }
});

// function update() {
//     setTimeout(function () {
//         // $("#tabeldata").load(" #tabeldata");
//         // $("#tabeldata").DataTable().ajax.reload();
//         chartData.update();
//         $("#myChart").load(" #myChart");
//         update();
//     }, 3000);
// }
