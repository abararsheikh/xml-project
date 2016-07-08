<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Airport</title>
    <style>
        table,th,td
        {
            border : 1px solid black;
            border-collapse: collapse;
        }
        th,td
        {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<h3 style="color: red">Only one hit per 50 seconds is allowed against this page.</h3>
<h2>Click on a Flight Number to display Flight Information.</h2>
<h1>Flight Details</h1>
<span style="font-size: 18px;">
<p id='showFlight'></p>
</span>
<table id="flightInfo"></table>

<script>
    // AJAX Request
    var x,xmlhttp,xmlDoc,i;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "Home/air.php", false);  //load the file from the curl request
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML;    //get the response

//    console.log(xmlDoc);
    var FlightData = xmlDoc.getElementsByTagName("Header");    //get the header element

    table="<tr><th>FlightNumber</th><th>Arrival || Departure</th></tr>";

    for (i = 0; i < FlightData.length; i++)
    {
        table += "<tr onclick='displayFlight(" + i + ")'><td>";
        table +=FlightData[i].getElementsByTagName("FlightNumber")[0].childNodes[0].nodeValue;
        table += "</td><td>";
        table +=FlightData[i].getElementsByTagName("ArrivalOrDeparture")[0].childNodes[0].nodeValue;
        //  table += "</td><td>";

    }

    document.getElementById("flightInfo").innerHTML = table;

    //Table row Onclick function
    function displayFlight(i)
    {
        //Convert FlightDate which is in number ,convert it to Date Format

        var GetDate = FlightData[i].getElementsByTagName("FlightDate")[0].childNodes[0].nodeValue;
        var FlightDate= GetDate.replace(/(\d{4})(\d\d)(\d\d)/g, '$2/$3/$1');

        //Convert EstimatedTime which is in number ,convert it to DateTime Format

        var str =  FlightData[i].getElementsByTagName("EstimatedTime")[0].childNodes[0].nodeValue;
        var year = str.slice(0, 4);
        var month = parseInt(str.slice(4, 6))-1;
        var day = str.slice(6, 8);
        var hour = str.slice(8, 10);
        var minute = str.slice(10, 12);
        var EstimatedTime = new Date(year, month, day, hour, minute);
         // getFullYear,getMonth .;

        //Check weather Flight is Arriving or Departing then Display According to it

        var DeptOrA=  FlightData[i].getElementsByTagName("ArrivalOrDeparture")[0].childNodes[0].nodeValue;
        if(DeptOrA =='D')
        {
            var DepartureOrArrival="<br><span style='font-weight: bold'>Departing To :</span> " +FlightData[i].getElementsByTagName("ViaAirportCity")[0].childNodes[0].nodeValue;

        }
        else
        {
            var DepartureOrArrival = "<br><span style='font-weight: bold'>Arriving From :</span> " + FlightData[i].getElementsByTagName("ViaAirportCity")[0].childNodes[0].nodeValue;
        }

        //Schedule time..convert to system Time

        var getscheduleTime = FlightData[i].getElementsByTagName("ScheduleTime")[0].childNodes[0].nodeValue;
        var getHH  = getscheduleTime.slice(0,2);
        var getMM =  getscheduleTime.slice(2,4);
        var scheduleTime = getHH +":"+getMM;
       // var Month = result.getDay();
        document.getElementById("showFlight").innerHTML =
            "<span style='font-weight: bold'>FlightNumber : </span>" + FlightData[i].getElementsByTagName("FlightNumber")[0].childNodes[0].nodeValue +
            "<br><span style='font-weight: bold'>Host Airport City : </span>" + FlightData[i].getElementsByTagName("HostAirportCity")[0].childNodes[0].nodeValue +

            "<br><span style='font-weight: bold'>Flight Date :</span> " + FlightDate +
            "<br><span style='font-weight: bold'>Arrival Or Departure :</span> " + FlightData[i].getElementsByTagName("ArrivalOrDeparture")[0].childNodes[0].nodeValue +

            DepartureOrArrival +
            "<br><span style='font-weight: bold'>Status (OnTime or delayed) :</span> " + FlightData[i].getElementsByTagName("Status")[0].childNodes[0].nodeValue +
            "<br><span style='font-weight: bold'>Via Airport Code :</span> " + FlightData[i].getElementsByTagName("ViaAirportCode")[0].childNodes[0].nodeValue +
            "<br><span style='font-weight: bold'>Scheduled Time :</span> " + scheduleTime +
            "<br><span style='font-weight: bold'>Estimated Time :</span> " + EstimatedTime +
            "<br><span style='font-weight: bold'>Airline Code :</span> " + FlightData[i].getElementsByTagName("AirlineCode")[0].childNodes[0].nodeValue +
            "<br><span style='font-weight: bold'>Server UTC Time :</span> " + FlightData[i].getElementsByTagName("ServerUTCTime")[0].childNodes[0].nodeValue ;

    }
</script>
</body>
</html>
