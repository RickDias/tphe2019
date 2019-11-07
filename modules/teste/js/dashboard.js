function createGraph(opt, chartId) {
    var chartApex = new ApexCharts(
        document.querySelector('#' + chartId), opt);
    chartApex.render();
}

$(document).ready(function(e) {
    if (typeof chartIdJS !== 'undefined'){
        $.each(chartIdJS, function(index, value) {
            var opt = eval("options" + kpiIdJS[index]);
            createGraph(opt, value);
        });
    }
});
