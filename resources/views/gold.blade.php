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
            <small>(This app runs a cron everyday and scrap data from bajus.org)</small>
            <div id="gold-chart"></div>
        </div>
        <div>
            <p class="text-center">
                * Prices are collected from Bangladesh Jewellers Association website <br>
                * There is a 5% VAT on all gold purchases in Bangladesh <br>
                * If purchased in jewelry form, there is additional making charges
            </p>

            <p>
                <h3>API Endpoints(GOLD)</h3>
                <ul>
                    <li>
                        <a href="{{ route('gold.today') }}">/api/v1/gold/today</a>
                    </li>
                    <li>
                        <a href="{{route('gold.yesterday')}}">/api/v1/gold/yesterday<a>
                    </li>
                    <li>
                        <a href="{{ route('gold.lastweek') }}">/api/v1/gold/lastweek</a>
                    </li>

                    <li>
                        <a href="">api/v1/all(Since 2007)</a> <br>
                        <small>Need all the data from api, feel free to email me</small><a href="mailto:erfan.siam98@gmail.com">(erfan.siam98@gamil.com)</a>
                    </li>
                </ul>

                <h3>API Endpoints(Silver)</h3>
                <ul>
                    <li>
                        <a href="{{ route('gold.today') }}">/api/v1/gold/today</a>
                    </li>
                    <li>
                        <a href="{{route('gold.yesterday')}}">/api/v1/gold/yesterday<a>
                    </li>
                    <li>
                        <a href="{{ route('gold.lastweek') }}">/api/v1/gold/lastweek</a>
                    </li>

                    <li>
                        <a href="">api/v1/all(Since 2007)</a> <br>
                        <small>Need all the data from api, feel free to email me</small><a href="mailto:erfan.siam98@gmail.com">(erfan.siam98@gamil.com)</a>
                    </li>
                </ul>

            </p>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
                var chart = window.ApexCharts && (new ApexCharts(document.getElementById('gold-chart'), {
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
                        markers: {
                            size: 0,
                            strokeColors: '#fff',
                            strokeWidth: 2,
                            strokeOpacity: 0.9,
                            strokeDashArray: 0,
                            fillOpacity: 1,
                            discrete: [],
                            shape: "circle",
                            radius: 2,
                            offsetX: 0,
                            offsetY: 0,
                            onClick: undefined,
                            onDblClick: undefined,
                            hover: {
                                size: undefined,
                                sizeOffset: 3
                            }
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
                      colors: ['#feda6e', '#e7bd51', '#b3933f', '#665424'],
                      legend: {
                          show: false,
                      },

            })).render();
            });
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

