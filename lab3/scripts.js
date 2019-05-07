$(document).ready(function() {
    //размер canvas
    canvaWidth = 500; 
    canvaHeight = 500;
    var canvas = document.createElement('canvas');
    canvas.id = "lab3";
    canvas.width = canvaWidth;
    canvas.height = canvaHeight;
    var body = document.getElementsByTagName("body")[0];
    body.appendChild(canvas);
    var ctx = canvas.getContext('2d');
    //точка, от которой будут отрисовываться картинки
    pointX = Math.round(Math.random()*canvaWidth/3 + canvaWidth/3); 
    pointY = Math.round(Math.random()*canvaHeight/3 + canvaHeight/3);
    //размер шрифта и отступов
    var fontSize = 25, padding = 10;
    var loadedCounter = 0;
    //получаю картинки
    var pictures = new Array(4);
    for (var i = 0; i < 4; i++) {
        pictures[i] = new Image();
        pictures[i].setAttribute('crossOrigin', 'anonymous');
        pictures[i].src = 'https://source.unsplash.com/collection/112716'+ (3 + i) +'/'+ canvaWidth +'x'+ canvaHeight;
    }
    
    //получаю цитаты
    function getQuoteStrings(quote, ctx) {
        var quoteStrings = [];
        var arrQuote = quote.split(" "); //разделила по пробелам
        var globI = 0, strCounter = 0;
        ctx.font = "bolder "+ fontSize +"px Arial"; //стиль шрифта
        ctx.fillStyle = "white"; //цвет
        ctx.textBaseline = "center";
        for (var i = 0; i < arrQuote.length; i++) { //прохожусь по массиву из слов
            if (ctx.measureText(arrQuote.slice(globI, i+1).join(" ")).width >= canvaWidth-2*padding) { //если соединенные слова умещаются на строке в canvas
                quoteStrings.push(arrQuote.slice(globI, i).join(" ")); //тогда вставляю и перехожу на новую строку
                globI = i;
                strCounter++;
            }
        }
        quoteStrings.push(arrQuote.slice(globI, arrQuote.length).join(" "));
        return quoteStrings
    }

    //как накладываю текст
    function printQuote(quote, ctx) {
        var quoteStrings = getQuoteStrings(quote, ctx);
        for (var i = 0; i < quoteStrings.length; i++) {
            ctx.textAlign="center"; //второй аргумент функции fillText - позиция центра текста
            ctx.fillText(quoteStrings[i], canvaWidth/2, canvaHeight/2 - (fontSize*quoteStrings.length)/2 + fontSize*(i+1));


        }
    }

    pictures[0].onload = pictures[1].onload = pictures[2].onload = pictures[3].onload = function() {
        loadedCounter++;
        if (loadedCounter == 4) { //если картинки загружены, делаю коллаж
            ctx.drawImage(pictures[0], pointX - canvaWidth, pointY - canvaHeight);
            ctx.drawImage(pictures[1], pointX, pointY - canvaHeight);
            ctx.drawImage(pictures[2], pointX - canvaWidth, pointY);
            ctx.drawImage(pictures[3], pointX, pointY);
            ctx.fillStyle = 'rgba(0, 0, 0, .7)'; //затемняю
            ctx.fillRect(0, 0, canvaWidth, canvaHeight); 
            var url = 'https://cors-anywhere.herokuapp.com/https://api.forismatic.com/api/1.0/?method=getQuote&format=json&lang=ru';
            $.post(url, function(data) {
                printQuote(data.quoteText, ctx) //накладываю текст
                var dataURL = canvas.toDataURL("image/jpeg");
                var link = document.createElement("a"); // создаю элемент с тегом <a>
                link.style.position = "absolute"; //расположение 
                link.style.top = "550px";
                link.style.left = "250px";
                link.style.borderRadius = "4px";//закруглила
                link.style.border = "1px solid #555555"; //рамка
                link.style.boxShadow = "0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19)"; //тень для кнопки
                link.href = dataURL; //нажатие на элемент = получение url коллажа
                link.download = "коллаж.jpg";
                link.innerHTML = "Скачать";
                document.body.appendChild(link);
            });
        }
    }
});