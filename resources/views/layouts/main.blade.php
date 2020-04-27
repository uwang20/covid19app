<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/main.css">
    </head>
    <body>
      <div class="w-full full-view bg-green-100">
        <nav class="bg-green-300">
          <div class="container flex items-center mx-auto justify-center py-4">
              <h1 class="text-2xl">COVID19 UPDATE</h1>
          </div>
        </nav>
        <section>
              <div class="bg-gray-300 container mt-6 mx-auto px-4 py-4">
                <p class="text-sm text-gray-500">Last updated: {{$lastUpdated}}</p>
                <div class="container flex items-center justify-evenly">
                  <div class="bg-gray-200 py-4 px-8 rounded my-6 text-center shadow-2xl">
                    <h2 class="text-5xl font-semibold mb-4 text-gray-800" >Total Cases</h2>
                    <p class="text-4xl font-bold mb-2 text-gray-700">{{$covidGlobalCase['TotalConfirmed']}}</p>
                  </div>
                  <div class="bg-gray-200 py-4 px-8 rounded my-6 text-center  shadow-2xl">
                    <h2 class="text-5xl font-semibold mb-4 text-gray-800" >Deaths</h2>
                    <p class="text-4xl font-bold mb-2 death-text-color">{{$covidGlobalCase['TotalDeaths']}}</p>
                  </div>
                  <div class="bg-gray-200 py-4 px-8 rounded my-6 text-center shadow-2xl">
                    <h2 class="text-5xl font-semibold mb-4 text-gray-800" >Recovered</h2>
                    <p class="text-4xl font-bold mb-2 recovered-text-color">{{$covidGlobalCase['TotalRecovered']}}</p>
                  </div>
                </div>
              </div>
        </section>
        <section>
            <div class="bg-gray-300 container mt-6 mx-auto px-4 py-4 rounded">
              <p>TOP COUNTRY</p>
              <div class="container my-2 bg-gray-100 shadow-2xl">
                <div class="container flex items-center bg-gray-500">
                  <div class="flex-1 text-center py-2 font-semibold">
                    Country
                  </div>
                  <div class="flex-1 text-center py-2 font-semibold">
                    Total Cases
                  </div>
                  <div class="flex-1 text-center py-2 font-semibold">
                    New Cases
                  </div>
                  <div class="flex-1 text-center py-2 font-semibold">
                    Total Deaths
                  </div>
                  <div class="flex-1 text-center py-2 font-semibold">
                    New Deaths
                  </div>
                  <div class="flex-1 text-center py-2 font-semibold">
                    Total Recovered
                  </div>
                  <div class="flex-1 text-center py-2 font-semibold">
                    New Recovered
                  </div>
                </div>
                <div class="px-2">
                  @foreach($topFiveCovidCase as $country)
                    <div class="container flex items-center color-field">
                      <div class="flex-1 text-center py-2">
                        {{$country['Country']}}
                      </div>
                      <div class="flex-1 text-center py-2">
                        {{$country['TotalConfirmed']}}
                      </div>
                      <div class="flex-1 text-center py-2">
                        {{$country['NewConfirmed']}}
                      </div>
                      <div class="flex-1 text-center py-2">
                        {{$country['TotalDeaths']}}
                      </div>
                      <div class="flex-1 text-center py-2">
                        {{$country['NewDeaths']}}
                      </div>
                      <div class="flex-1 text-center py-2">
                        {{$country['TotalRecovered']}}
                      </div>
                      <div class="flex-1 text-center py-2">
                        {{$country['NewRecovered']}}
                      </div>
                    </div>
                  @endforeach
                </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      <div class="full-view w-full bg-red-100">
        <div id="chartDiv" style="width: 100%; height: 400px;"></div>
      </div>
      <script src="https://code.jscharting.com/latest/jscharting.js"></script>
      <script type="text/javascript">
      var redStates = "WV,NC,SC,IN,KY,TN,AL,GA,MS,LA,AR,MO,TX,OK,KS,NE,SD,ND,WY,MT,ID,UT,AZ,AK";
    var points = redStates.split(",").map(function(val) {
      return { map: "US." + val };
    });

    JSC.chart("chartDiv", {
      type: "map",
      mapping_base_layers: "US",
      series: [
        {
          defaultPoint_color: "crimson",
          points: points
        }
      ]
    });
      </script>
    </body>
</html>
