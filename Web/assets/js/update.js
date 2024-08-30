$(document).ready(function () {
    const pathName =
        location.pathname.split("/").slice(-1)[0].split(".")[0] == ""
            ? "index"
            : location.pathname.split("/").slice(-1)[0].split(".")[0];
    $("#" + pathName).addClass("active");

    new DataTable("#tabeldata", {
        order: [[0, "desc"]],
    });

    update();
    selesai();
});

function selesai() {
    setTimeout(function () {
        update();
        selesai();
    }, 3000);
}

function update() {
    $.getJSON("assets/database/update.php", function (data) {
        // Handle Cahaya data
        var cahayaData = data.cahaya;
        $("#dataCahaya").html(parseFloat(cahayaData.cahaya).toFixed(2) + "Lux");

        // Handle Suhu data
        var suhuData = data.suhu;
        $("#dataSuhu").html(parseFloat(suhuData.suhu).toFixed(2) + "°C");

        // Handle Jarak data
        var jarakData = data.jarak;
        $("#dataJarak").html(parseFloat(jarakData.jarak).toFixed(2) + "cm");
    });
    $.getJSON(
        "https://api.thingspeak.com/channels/2292107/feeds.json?api_key=ELXTZIRFL28UQ4B7&results=1",
        function (data) {
            // Handle Cahaya data
            $("#dataTSCahaya").html(
                parseFloat(data.feeds[0].field3).toFixed(2) + "Lux"
            );

            // Handle Suhu data
            $("#dataTSSuhu").html(
                parseFloat(data.feeds[0].field1).toFixed(2) + "°C"
            );

            // Handle Jarak data
            $("#dataTSJarak").html(
                parseFloat(data.feeds[0].field2).toFixed(2) + "cm"
            );
        }
    );
}

// function updateTable() {
//     $.get("koneksi.php", function(data) {
//         $("table").empty();
//         var no = 1;
//         $.each(data.result, function() {
//             $("table").append("<tr><td>"+(no++)+"</td><td>"+this['nama']+"</td><td>"+this['status']+"</td></tr>");
//         });
//     });
// }
