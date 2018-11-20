

$(function () {
    // var myChart = Highcharts.chart('containerChart', {
    //     chart: {
    //         type: 'bar'
    //     },
    //     title: {
    //         text: 'Доходность'
    //     },
    //     xAxis: {
    //         categories: ['Apples', 'Bananas', 'Oranges']
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Fruit eaten'
    //         }
    //     },
    //     series: [{
    //         name: 'Jane',
    //         data: [1, 0, 4]
    //     }, {
    //         name: 'John',
    //         data: [5, 7, 3]
    //     }]
    // });



    // $.getJSON('/account/chart', function (data) {
    $.getJSON(userChartUrl, function (data) {

        // Create the chart
       // Highcharts.stockChart('containerChart', {
       //    //  Highcharts.chart('containerChart', {
       //
       //
       //      rangeSelector: {
       //          selected: 1
       //      },
       //
       //      title: {
       //          text: 'AAPL Stock Price'
       //      },
       //
       //      series: [{
       //          name: 'AAPL Stock Price',
       //          data: data,
       //          marker: {
       //              enabled: true,
       //              radius: 3
       //          },
       //          shadow: true,
       //          tooltip: {
       //              valueDecimals: 2
       //          }
       //      }]
       //  });





        // Create the chart
        var dataObject = {

            // rangeSelector: {
            //     selected: 1,
            //     inputEnabled: $('#containerChart').width() > 480
            // },
            series: [{
                name: 'Прибыль',
                data: data,
                tooltip: {
                    valueDecimals: 2
                },
                dataLabels: {
                    enabled: true,
                    format: '{y} %'
                }
            }]

            ,



            colors: ['#2b908f', '#90ee7e', '#f45b5b', '#7798BF', '#aaeeee', '#ff0066',
                '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
            chart: {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 1, y2: 1 },
                    stops: [
                        [0, '#2a2a2b'],
                        [1, '#3e3e40']
                    ]
                },
                style: {
                    fontFamily: '\'Unica One\', sans-serif'
                },
                plotBorderColor: '#606063',
                renderTo: 'containerChart'
            },
            title: {
                text: '',
                style: {
                    color: '#E0E0E3',
                    textTransform: 'uppercase',
                    fontSize: '20px'
                }
            },
            subtitle: {
                style: {
                    color: '#E0E0E3',
                    textTransform: 'uppercase'
                }
            },
            xAxis: {
                gridLineColor: '#707073',
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#707073',
                minorGridLineColor: '#505053',
                tickColor: '#707073',
                title: {
                    style: {
                        color: '#A0A0A3'

                    }
                }
            },
            yAxis: {
                gridLineColor: '#707073',
                labels: {
                    style: {
                        color: '#E0E0E3'
                    }
                },
                lineColor: '#707073',
                minorGridLineColor: '#505053',
                tickColor: '#707073',
                tickWidth: 1,
                title: {
                    style: {
                        color: '#A0A0A3'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.85)',
                style: {
                    color: '#F0F0F0'
                }
            },
            plotOptions: {
                series: {
                    dataLabels: {
                        color: '#B0B0B3'
                    },
                    marker: {
                        lineColor: '#333'
                    }
                },
                boxplot: {
                    fillColor: '#505053'
                },
                candlestick: {
                    lineColor: 'white'
                },
                errorbar: {
                    color: 'white'
                }
            },
            legend: {
                itemStyle: {
                    color: '#E0E0E3'
                },
                itemHoverStyle: {
                    color: '#FFF'
                },
                itemHiddenStyle: {
                    color: '#606063'
                }
            },
            credits: {
                style: {
                    color: '#666'
                }
            },
            labels: {
                style: {
                    color: '#707073'
                }
            },

            drilldown: {
                activeAxisLabelStyle: {
                    color: '#F0F0F3'
                },
                activeDataLabelStyle: {
                    color: '#F0F0F3'
                }
            },

            navigation: {
                buttonOptions: {
                    symbolStroke: '#DDDDDD',
                    theme: {
                        fill: '#505053'
                    }
                    // height: 60,
                    // width: 80,
                    // symbolSize: 24,
                    // symbolX: 23,
                    // symbolY: 21,
                    // symbolStrokeWidth: 2
                }
            },

            // scroll charts
            rangeSelector: {
        //         inputPosition: {
        //             align: 'left',
        //             x: 0,
        //             y: 0
        //                     },
        // buttonPosition: {
        //     align: 'right',
        //             x: 0,
        //                 y: 0
        //                 },

                selected: 1,
                inputEnabled: $('#containerChart').width() > 480,
                buttonTheme: {
                    fill: '#505053',
                    stroke: '#000000',
                    style: {
                        color: '#CCC'
                    },
                    width: 60,
                    states: {
                        hover: {
                            fill: '#707073',
                            stroke: '#000000',
                            style: {
                                color: 'white'
                            }
                        },
                        select: {
                            fill: '#000003',
                            stroke: '#000000',
                            style: {
                                color: 'white'
                            }
                        }
                    }
                },
                inputBoxBorderColor: '#505053',
                inputStyle: {
                    backgroundColor: '#333',
                    color: 'silver'
                },
                labelStyle: {
                    color: 'silver'
                },

                buttons: [
                    // {
                    //     type: 'ytd',
                    //     count: 1,
                    //     text: 'День',
                    //     offsetMin: -24 * 3600 * 1000
                    // },
                    // {
                    //     type: 'ytd',
                    //     count: 1,
                    //     text: 'Неделя',
                    //     offsetMin: -24 *7 * 3600 * 1000
                    // },
                    // {
                    //     type: 'day',
                    //     count: 1,
                    //     text: 'День'
                    // },
                    {
                        type: 'week',
                        count: 1,
                        text: 'Неделя'
                    },
                    {
                        type: 'month',
                        count: 1,
                        text: 'Месяц'
                    },
                    {
                        type: 'month',
                        count: 3,
                        text: '3 месяца'
                    },
                        {
                        type: 'year',
                        count: 1,
                        text: 'Год'
                    },
                    // {
                    //     type: 'ytd',
                    //     count: 1,
                    //     text: 'Все время',
                    //     offsetMin: -24 * 100000 * 3600 * 1000
                    // },

                    // {
                    //     type: 'day',
                    //     count: 1,
                    //     text: 'День'
                    // },
                    // {
                    //     type: 'week',
                    //     count: 1,
                    //     text: 'неделя'
                    // },

                //     {
                //     type: 'month',
                //     count: 1,
                //     text: 'месяц',
                //     events: {
                //         click: function() {
                //            // alert(‘Clicked button’);
                //         }
                //     }
                // },

                //     {
                //     type: 'month',
                //     count: 3,
                //     text: '3m'
                // },
                    // {
                //     type: 'month',
                //     count: 6,
                //     text: '6m'
                // },
                //     {
                //     type: 'ytd',
                //     text: 'YTD'
                // },
                //     {
                //     type: 'year',
                //     count: 1,
                //     text: '1y'
                // },
                    {
                    type: 'all',
                    text: 'Все время'
                }
                ]


            },




            navigator: {
                handles: {
                    backgroundColor: '#666',
                    borderColor: '#AAA'
                },
                outlineColor: '#CCC',
                maskFill: 'rgba(255,255,255,0.1)',
                series: {
                    color: '#7798BF',
                    lineColor: '#A6C7ED'
                },
                xAxis: {
                    gridLineColor: '#505053'
                }
            },

            scrollbar: {
                barBackgroundColor: '#808083',
                barBorderColor: '#808083',
                buttonArrowColor: '#CCC',
                buttonBackgroundColor: '#606063',
                buttonBorderColor: '#606063',
                rifleColor: '#FFF',
                trackBackgroundColor: '#404043',
                trackBorderColor: '#404043'
            },

            // special colors for some of the
            legendBackgroundColor: 'rgba(0, 0, 0, 0.5)',
            background2: '#505053',
            dataLabelsColor: '#B0B0B3',
            textColor: '#C0C0C0',
            contrastTextColor: '#F0F0F3',
            maskColor: 'rgba(255,255,255,0.3)'




        };

        Highcharts.setOptions({
                lang: {
                    loading: 'Загрузка...',
                    months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                    weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
                    shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Нояб', 'Дек'],
                    exportButtonTitle: "Экспорт",
                    printButtonTitle: "Печать",
                    rangeSelectorFrom: "С",
                    rangeSelectorTo: "По",
                    rangeSelectorZoom: "Период",
                    downloadPNG: 'Скачать PNG',
                    downloadJPEG: 'Скачать JPEG',
                    downloadPDF: 'Скачать PDF',
                    downloadSVG: 'Скачать SVG',
                    printChart: 'Напечатать график'
                }
            });


        var chart = new Highcharts.stockChart(dataObject);
        // chart.setOptions({
        //     lang: {
        //         loading: 'Загрузка...',
        //         months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        //         weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
        //         shortMonths: ['Янв', 'Фев', 'Март', 'Апр', 'Май', 'Июнь', 'Июль', 'Авг', 'Сент', 'Окт', 'Нояб', 'Дек'],
        //         exportButtonTitle: "Экспорт",
        //         printButtonTitle: "Печать",
        //         rangeSelectorFrom: "С",
        //         rangeSelectorTo: "По",
        //         rangeSelectorZoom: "Период",
        //         downloadPNG: 'Скачать PNG',
        //         downloadJPEG: 'Скачать JPEG',
        //         downloadPDF: 'Скачать PDF',
        //         downloadSVG: 'Скачать SVG',
        //         printChart: 'Напечатать график'
        //     }
        // });




    });
});