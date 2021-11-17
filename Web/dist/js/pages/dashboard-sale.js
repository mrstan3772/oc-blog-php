'use strict';
$(document).ready(function () {
    const el = document.querySelector('.pro-scroll')
    if (el !== null) {
        setTimeout(function () {
            floatchart()
        }, 700);
        // [ campaign-scroll ] start
        var px = new PerfectScrollbar('.feed-scroll', {
            wheelSpeed: .5,
            swipeEasing: 0,
            wheelPropagation: 1,
            minScrollbarLength: 40,
        });
        var px = new PerfectScrollbar('.pro-scroll', {
            wheelSpeed: .5,
            swipeEasing: 0,
            wheelPropagation: 1,
            minScrollbarLength: 40,
        });
        // [ campaign-scroll ] end
    }
});

function floatchart() {
    // [ support-chart ] start
    $(function () {
        var options1 = {
            chart: {
                type: 'area',
                height: 85,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#7267EF"],
            stroke: {
                curve: 'smooth',
                width: 2,
            },
            series: [{
                data: [0, 20, 10, 45, 30, 55, 20, 30, 0]
            }],
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return 'Ticket '
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        // new ApexCharts(document.querySelector("#support-chart"), options1).render();
        var options2 = {
            chart: {
                type: 'bar',
                height: 85,
                sparkline: {
                    enabled: true
                }
            },
            colors: ["#7267EF"],
            plotOptions: {
                bar: {
                    columnWidth: '70%'
                }
            },
            series: [{
                data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54, 44, 12, 36, 9, 54, 25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 25, 44, 12, 36, 9, 54]
            }],
            xaxis: {
                crosshairs: {
                    width: 1
                },
            },
            tooltip: {
                fixed: {
                    enabled: false
                },
                x: {
                    show: false
                },
                y: {
                    title: {
                        formatter: function (seriesName) {
                            return ''
                        }
                    }
                },
                marker: {
                    show: false
                }
            }
        }
        // new ApexCharts(document.querySelector("#support-chart1"), options2).render();
    });
    // [ support-chart ] end
    // [ account-chart ] start
    $(function () {
        $(function () {
            var options = {
                chart: {
                    height: 350,
                    type: 'line',
                    stacked: false,
                },
                stroke: {
                    width: [0, 3],
                    curve: 'smooth'
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: ['#7267EF', '#c7d9ff'],
                series: [{
                    name: 'Revenu total',
                    type: 'column',
                    data: [2322, 1902, 2192, 2492, 2192, 2592, 2567, 1892, 1905, 1910, 2892]
                }, {
                    name: 'Moyenne',
                    type: 'line',
                    data: [2302, 1549, 1728, 1823, 1682, 2190, 2123, 1573, 1551, 1555, 2238]
                }],
                fill: {
                    opacity: [0.85, 1],
                },
                labels: ['01/01/2021', '02/01/2021', '03/01/2021', '04/01/2021', '05/01/2021', '06/01/2021', '07/01/2021', '08/01/2021', '09/01/2021', '10/01/2021', '11/01/2021'],
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'datetime'
                },
                yaxis: {
                    min: 0
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function (y) {
                            if (typeof y !== "undefined") {
                                return "$ " + y.toFixed(0);
                            }
                            return y;

                        }
                    }
                },
                legend: {
                    labels: {
                        useSeriesColors: true
                    },
                    markers: {
                        customHTML: [
                            function () {
                                return ''
                            },
                            function () {
                                return ''
                            }
                        ]
                    }
                }
            }
            var chart = new ApexCharts(
                document.querySelector("#account-chart"),
                options
            );
            chart.render();
        });
    });
    // [ account-chart ] end
    // [ satisfaction-chart ] start
    $(function () {
        var options = {
            chart: {
                height: 260,
                type: 'pie',
            },
            series: [66, 50, 40, 30],
            labels: ["Très satisfait", "Assez satisfait", "Peu satisfait", "Pas du tout satisfait"],
            legend: {
                show: true,
                offsetY: 50,
            },
            dataLabels: {
                enabled: true,
                dropShadow: {
                    enabled: false,
                }
            },
            theme: {
                monochrome: {
                    enabled: true,
                    color: '#7267EF',
                }
            },
            responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        height: 320,

                    },
                    legend: {
                        position: 'bottom',
                        offsetY: 0,
                    }
                }
            }]
        }
        var chart = new ApexCharts(document.querySelector("#satisfaction-chart"), options);
        chart.render();
    });
    // [ satisfaction-chart ] end
}
