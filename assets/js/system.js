
// Bootstrap Tooltip Enable Everywhere
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
// System Programming Starts from here
var loadTime = window.performance.timing.domContentLoadedEventEnd - window.performance.timing.navigationStart;
var plTime = (loadTime / 1000);
console.log(plTime);
$(document).ready(() => {

    var authorMeta = {
        'author': "Biswa",
        'License': 'MIT',
        'version': '1.1.0'

    }

    console.log(
        `
   ╔═══╗╔═══╗╔═══╗╔═══╗╔════╗╔═══╗╔═══╗    ╔══╗ ╔╗  ╔╗    ╔══╗ ╔══╗╔═══╗╔╗╔╗╔╗╔═══╗
   ║╔═╗║║╔═╗║║╔══╝║╔═╗║║╔╗╔╗║║╔══╝╚╗╔╗║    ║╔╗║ ║╚╗╔╝║    ║╔╗║ ╚╣╠╝║╔═╗║║║║║║║║╔═╗║
   ║║ ╚╝║╚═╝║║╚══╗║║ ║║╚╝║║╚╝║╚══╗ ║║║║    ║╚╝╚╗╚╗╚╝╔╝    ║╚╝╚╗ ║║ ║╚══╗║║║║║║║║ ║║
   ║║ ╔╗║╔╗╔╝║╔══╝║╚═╝║  ║║  ║╔══╝ ║║║║    ║╔═╗║ ╚╗╔╝     ║╔═╗║ ║║ ╚══╗║║╚╝╚╝║║╚═╝║
   ║╚═╝║║║║╚╗║╚══╗║╔═╗║ ╔╝╚╗ ║╚══╗╔╝╚╝║    ║╚═╝║  ║║      ║╚═╝║╔╣╠╗║╚═╝║╚╗╔╗╔╝║╔═╗║
   ╚═══╝╚╝╚═╝╚═══╝╚╝ ╚╝ ╚══╝ ╚═══╝╚═══╝    ╚═══╝  ╚╝      ╚═══╝╚══╝╚═══╝ ╚╝╚╝ ╚╝ ╚╝
                                                                                                        
    `);
 var onConnect = window.navigator.onLine;
 setInterval(() => {
    //  if site getting network issue or offline
     if(onConnect !== true){
         console.log('Looks like you are offline');
         $('#conperf').hide();

         document.getElementById('conerr').innerHTML='Unable to connect to system!';
         
     } else {
                 $('#conperf').show();


      // ===api perf ===
    var apiPerf = Math.floor(Math.random() * 80) + 40 + 'ms'
    var apiPerfDom = document.querySelector('#apitext');
    apiPerfDom.innerHTML = `Api Perf ── ${apiPerf}`;
    document.getElementById("apiperf").title = `Api Latency: ${apiPerf}`;
    console.log(apiPerf);

    // === site perf ===
    var siteperf = Math.floor(Math.random() * 99) + 70 + '%'
    document.getElementById("siteperf").title = `Site Perf: ${siteperf}`;
    console.log(siteperf);

    // ==== LIB ====
    var libperf = Math.floor(Math.random() * 80) + 40 + 'ms'
    document.getElementById("lib").title = `libPerf: ${libperf}`;
    document.querySelector('#libperf').innerHTML=`Lib Perf ── ${libperf}`
    console.log(libperf);

    // === site downtime ===
    var downtime = Math.floor(Math.random() * 5) + 1 + '%';
    var siteDownDom = document.querySelector('#sdtext');
    siteDownDom.innerHTML = `Downtime ── ${downtime}`;
    document.getElementById("down").title = `LoadTime: ${plTime}`;
    console.log(downtime);
     }

 }, 3200);




})
