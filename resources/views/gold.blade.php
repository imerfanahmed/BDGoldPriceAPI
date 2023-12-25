<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body class="container h-full bg-dark text-white">

        <div class="text-center mt-5">
            <h1>Gold Price History in Bangladesh</h1>
            <div id="gold-chart"></div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
                window.ApexCharts && (new ApexCharts(document.getElementById('gold-chart'), {
                    chart: {
                        type: "area",
                        fontFamily: 'inherit',
                        height: 800,
                        // locales: ['bd'],
                        zoom: {
                                autoScaleYaxis: true
                            },
                        parentHeightOffset: 0,
                        toolbar: {
                            show: true,
                        },
                        animations: {
                            enabled: false,
                            easing: 'easeinout',
                            speed: 800,
                            animateGradually: {
                                enabled: true,
                                delay: 150
                            },
                            dynamicAnimation: {
                                enabled: true,
                                speed: 350
                            }
                        },
                        stacked: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shadeIntensity: -1,
                            opacityFrom: 0.7,
                            opacityTo: 1.0,
                            stops: [0, 100]
                        }
                    },
                    stroke: {
                        width: 2,
                        lineCap: "round",
                        curve: "smooth",
                    },
                    series: [{
                        name: "18K",
                        data: {!! json_encode($k18) !!}
                    },{
                        name: "21K",
                        data: {!! json_encode($k21) !!}
                    },
                    {
                        name: "22K",
                        data: {!! json_encode($k22) !!}
                    },
                    {
                        name: "Traditional",
                        data: {!! json_encode($traditional) !!}
                    }],
                    tooltip: {
                        theme: 'dark'
                    },
                    grid: {
                        // padding: {
                        //     top: -20,
                        //     right: 0,
                        //     left: -4,
                        //     bottom: -4
                        // },
                        strokeDashArray: 10,
                    },
                    xaxis: {
                        labels: {
                            padding: 0,
                            style: {
                                colors: '#fff',
                            },
                        },
                        tooltip: {
                            enabled: true
                        },
                        axisBorder: {
                            show: true,
                        },
                        type: 'datetime',
                    },
                    yaxis:{
                        labels: {
                            formatter: function (value) {
                            return '৳ '+value + ' BDT/Gram';
                        },
                            padding: 4,
                            style: {
                                colors: '#fff',
                            },
                        },
                    },
                    labels: {!! json_encode($dates) !!},
                      colors: ['#a78b27', '#e7bd51', '#b3933f', '#665424'],
                      legend: {
                          show: false,
                      },

            })).render();
            });
            // @formatter:on
          </script>



        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
