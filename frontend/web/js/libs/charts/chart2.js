 // am4core.useTheme(am4themes_dataviz);


 /* Define a custom theme */
 function am4themes_overwritr_theme(target) {
     // if (target instanceof am4charts.Axis) {
     //     target.setFor("fill", am4core.color("#6DC0D5"));
     // }
     if (target instanceof am4core.ColorSet) {
         target.list = [
             am4core.color("#b1e264")
         ];

     }

     // if (target instanceof am4core.Axis) {
     //     target.background.fill = am4core.color("#DCCCA3");
     // }
   //  range.contents.fillOpacity = 0.05;
   //   if (target instanceof am4core.) {
   //       target.contents.fillOpacity =0.05;
   //   }
     // if (target instanceof am4charts.Axis) {
     //     target.background.fill = am4core.color("#DCCCA3");
     // }

 }
 am4core.useTheme(am4themes_dataviz);
 am4core.useTheme(am4themes_overwritr_theme);

// am4core.useTheme(am4themes_material);
 /* Apply it */




// am4core.useTheme(am4themes_animated);

console.log(am4themes_dataviz);
// Themes end
var am4lang_ru_RU={_decimalSeparator:",",_thousandSeparator:" ",_date_millisecond:"mm:ss SSS",_date_second:"HH:mm:ss",_date_minute:"HH:mm",_date_hour:"HH:mm",_date_day:"dd MMM",_date_week:"ww",_date_month:"MMM",_date_year:"yyyy",_duration_millisecond:"SSS",_duration_second:"ss",_duration_minute:"mm",_duration_hour:"hh",_duration_day:"dd",_duration_week:"ww",_duration_month:"MM",_duration_year:"yyyy",_era_ad:"н.э.",_era_bc:"до н.э.",A:"У",P:"В",AM:"утра",PM:"вечера","A.M.":"до полудня","P.M.":"после полудня",January:"января",February:"февраля",March:"марта",April:"апреля",May:"мая",June:"июня",July:"июля",August:"августа",September:"сентября",October:"октября",November:"ноября",December:"декабря",Jan:"янв.",Feb:"февр.",Mar:"март",Apr:"апр.","May(short)":"май",Jun:"июнь",Jul:"июль",Aug:"авг.",Sep:"сент.",Oct:"окт.",Nov:"нояб.",Dec:"дек.",Sunday:"воскресенье",Monday:"понедельник",Tuesday:"вторник",Wednesday:"среда",Thursday:"четверг",Friday:"пятница",Saturday:"суббота",Sun:"вс.",Mon:"пн.",Tue:"вт.",Wed:"ср.",Thu:"чт.",Fri:"пт.",Sat:"сб.",_dateOrd:function(e){return"-ое"},"Zoom Out":"Уменьшить",Play:"Старт",Stop:"Стоп",Legend:"Легенда","Click, tap or press ENTER to toggle":"Щелкните, коснитесь или нажмите ВВОД, чтобы переключить",Loading:"Идет загрузка",Home:"Начало",Chart:"График","Serial chart":"Серийная диаграмма","X/Y chart":"Диаграмма X/Y","Pie chart":"Круговая диаграмма","Gauge chart":"Датчик-диаграмма","Radar chart":"Лепестковая диаграмма","Sankey diagram":"Диаграмма Сэнки","Chord diagram":"Диаграмма Chord","Flow diagram":"Диаграмма флоу","TreeMap chart":"Иерархическая диаграмма",Series:"Серия","Candlestick Series":"Серия-подсвечник","Column Series":"Столбчатая серия","Line Series":"Линейная серия","Pie Slice Series":"Круговая серия","X/Y Series":"X/Y серия",Map:"Карта","Press ENTER to zoom in":"Нажмите ВВОД чтобу увеличить","Press ENTER to zoom out":"Нажмите ВВОД чтобы уменьшить","Use arrow keys to zoom in and out":"Используйте клавиши-стрелки чтобы увеличить и уменьшить","Use plus and minus keys on your keyboard to zoom in and out":"Используйте клавиши плюс и минус на клавиатуре чтобы увеличить и уменьшить",Export:"Экспортировать",Image:"Изображение",Data:"Данные",Print:"Печатать","Click, tap or press ENTER to open":"Щелкните, коснитесь или нажмите ВВОД чтобы открыть","Click, tap or press ENTER to print.":"Щелкните, коснитесь или нажмите ВВОД чтобы распечатать","Click, tap or press ENTER to export as %1.":"Щелкните, коснитесь или нажмите ВВОД чтобы экспортировать как %1",'To save the image, right-click this link and choose "Save picture as..."':'Чтобы сохранить изображение, щелкните правой кнопкой на ссылке и выберите "Сохранить изображение как..."','To save the image, right-click thumbnail on the left and choose "Save picture as..."':'Чтобы сохранить изображение, щелкните правой кнопкой на картинке слева и выберите "Сохранить изображение как..."',"(Press ESC to close this message)":"(Нажмите ESC чтобы закрыть это сообщение)","Image Export Complete":"Экспорт изображения завершен","Export operation took longer than expected. Something might have gone wrong.":"Экспортирование заняло дольше, чем планировалось. Возможно что-то пошло не так.","Saved from":"Сохранено из",PNG:"PNG",JPG:"JPG",GIF:"GIF",SVG:"SVG",PDF:"PDF",JSON:"JSON",CSV:"CSV",XLSX:"XLSX","Use TAB to select grip buttons or left and right arrows to change selection":"Используйте клавишу TAB, чтобы выбрать рукоятки или клавиши стрелок влево и вправо, чтобы изменить выделение","Use left and right arrows to move selection":"Используйте стрелки влево-вправо, чтобы передвинуть выделение","Use left and right arrows to move left selection":"Используйте стрелки влево-вправо, чтобы передвинуть левое выделение","Use left and right arrows to move right selection":"Используйте стрелки влево-вправо, чтобы передвинуть правое выделение","Use TAB select grip buttons or up and down arrows to change selection":"Используйте TAB, чтобы выбрать рукоятки или клавиши вверх-вниз, чтобы изменить выделение","Use up and down arrows to move selection":"Используйте стрелки вверх-вниз, чтобы передвинуть выделение","Use up and down arrows to move lower selection":"Используйте стрелки вверх-вниз, чтобы передвинуть нижнее выделение","Use up and down arrows to move upper selection":"Используйте стрелки вверх-вниз, чтобы передвинуть верхнее выделение","From %1 to %2":"От %1 до %2","From %1":"От %1","To %1":"До %1","No parser available for file: %1":"Нет анализатора для файла: %1","Error parsing file: %1":"Ошибка при разборе файла: %1","Unable to load file: %1":"Не удалось загрузить файл: %1","Invalid date":"Некорректная дата"};

$(function () {
    $.getJSON(userChartUrl, function (data) {
// Create chart instance
        var chart = am4core.create("containerChart", am4charts.XYChart);

        chart.language.locale = am4lang_ru_RU;
// Add data
        chart.data = generatechartData(data);
// Create axes
        var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
        dateAxis.startLocation = 0.5;
        dateAxis.endLocation = 0.5;
        dateAxis.baseInterval = {
            "timeUnit": "minute",
            "count": 1
        };
        dateAxis.tooltipDateFormat = "HH:mm, d MMMM";
        dateAxis.renderer.labels.template.fill = am4core.color("white");
        dateAxis.renderer.labels.template.fontSize = 20;




// Create value axis
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        // Configure labels
        valueAxis.renderer.labels.template.fill = am4core.color("white");
        valueAxis.renderer.labels.template.fontSize = 20;
        // valueAxis.renderer.labelColor=am4core.color("#8DB055");

        // Create axes
        // var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        // categoryAxis.renderer.labels.template.fill =am4core.color("#8DB055");


        // var categoryAxis = chart.xAxes.push(new am4charts.Valu);
        // categoryAxis.renderer.labels.template.fill = am4core.color("#8DB055");
        // categoryAxis.renderer.labels.template.fontSize = 20;

        // chart.xAxis.labelColor=am4core.color("#8DB055");

        // var valueAxisx = chart.xAxes.push(new am4charts.ValueAxis());
        // valueAxisx.renderer.labels.template.fill = am4core.color("#8DB055");
        // valueAxisx.renderer.labels.template.fontSize = 20;
// Create series
        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = "visits";
        // series.dataFields.dateX = "date";
        series.dataFields.dateX = "date";
        series.strokeWidth = 3;
        series.tooltipText = "Прибыль: {valueY.value}";
        series.fillOpacity = 0.08; // top
        // series.fillOpacity = 0.1;
      //  series.propertyFields.stroke = "lineColor";
        series.propertyFields.stroke = "lineColor";
        series.propertyFields.fill = "lineColorFill";

// Create a range to change stroke for values below 0
        var range = valueAxis.createSeriesRange(series);
        range.value = 0;
        range.endValue = -1000;

        // range.contents.stroke = 'red';
        range.contents.fill = range.contents.stroke;
        range.contents.strokeOpacity = 1.0;
        range.contents.fillOpacity = 0.1;
        range.contents.fillOpacity = 1.0;  //bottom


        range.contents.stroke = chart.colors.getIndex(4);
        range.contents.stroke = '#EF0177';
        range.contents.fill = range.contents.stroke;
        range.contents.strokeOpacity = 1.0;
        range.contents.fillOpacity = 0.05;





// Add cursor
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.xAxis = dateAxis;
        chart.scrollbarX = new am4core.Scrollbar();
        // chart.dateFormatter.dateFormat
         chart.dateFormatter.dateFormat = "yyyy-MM-dd";

    });







});


function generatechartData(json) {
    var chartData = [];
    $.each(json,function (i,el) {
        // console.log( new Date(el[0]))
        colore='#8DB055';
        // if(el[1]<0) colore='#373b30';
         coloreFill='#b9cd98';
         coloreFill='#8DB055';

        chartData.push( {
            date: new Date(el[0]) ,
           // date: el[0] ,
            visits: el[1]
           // lineColor:colore,
           // lineColorFill:coloreFill
        } );
    }) ;
    return chartData;
}

