
@extends('user.layout.main')
@section('title','View Investment Details')
@section('main-container')

<style type="text/css">
    #chart-container {
        width: 80%;
        margin: auto;
        padding: 5%;
    }
    #tvchart {
        width: 100%;
        height: auto;
    }
</style>


<div class="row">
    <div class="w-full">
        <div class="card">
            <div class="sm:p-5 p-4">
                <div class="row">
                    <div class="xl:w-1/5 md:w-1/2 w-full dz-tab-area">
                        <div>
                            <div >
                                <button onclick="toggleChartType()"><img src="{{ asset('user_assets/line-chart.png') }}" alt="" width="25px"></button>
                            </div>
                            <div id="tvchart"></div>
                            <br>
                            {{-- <br>
                            <a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm" href="/trade_now/{{ $data->id }}">Invest Now</a> --}}
                        </div>
    
                      
                        <div  id="chart-container"  class="flex sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
                           
                       
                        </div>
                    
                    </div>
                    <!--Tab slider End-->
                    <div class="xl:w-8/12 md:w-1/2 w-full">
                        <div class="product-detail-content">
                            <div class="flex sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
                                <img src="{{ asset($plan_info->image) }}" alt="Image" width="90" height="90">
                                <div style="padding: 2%">
                                    <h3 class="font-semibold ">{{$plan_info->name}}</h3>
                                    
                                </div>
                            </div>

                            <div style="padding-left:4%">
                            
                               
                                <p><strong>Total Invested:</strong> ${{ number_format($data->amount) }}</p>
                                <p><strong>Current Value:</strong> <span id="current_value12"></span></p>
                                <p>As of today at {{ now() }}</p>
                                <br>
                                <br>
                                @if ($plan_info->principal_release=='Enabled')
                                <form action="/close_mytrade" method="post" onsubmit="return confirm('Are you sure you want to exit your investment plan? This action cannot be undone. Confirm to proceed or click cancel to stay on the current plan.');">
                                    @csrf
                                    <input type="text" hidden name="investment_id" value="{{$data->investment_id}}">
                                    <input type="text" hidden name="current_value" id="current_value2" value="">
                                    <button type="submit" class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm">Sell Now</button>
                                </form>
                                @endif
    
                            </div>
                            
                            
                          
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
   
   <!-- review -->
   
</div>


<script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>



<script type="text/javascript">
  let isCandleChart = true;
  let chartType = 'candlestick';
  const api_link = '{{ env("APP_URL") }}/api_graphpoints/{{ $data->plan_id }}';
  const getData = async () => {
  return fetch(api_link)
    .then(response => response.json())
    .then(data => {
      const formattedData = data.map(row => {
        const [date, time, open, high, low, close] = row.split(',');
        return {
          time: new Date(`${date} ${time}`).getTime() / 1000,
          open: parseFloat(open.trim()),
          high: parseFloat(high.trim()),
          low: parseFloat(low.trim()),
          close: parseFloat(close.trim()),
        };
      });
      console.log(formattedData);
      return formattedData;
    })
    .catch(error => console.error('Error fetching data:', error));
};



const updateChart = async () => {
  const klinedata = await getData();
//   console.log(klinedata);
//   console.log('hiih');
  candleseries.setData(klinedata);
  if (!isCandleChart) {
      // If line chart is active, set line series data using 'open' values
      const lineData = klinedata.map(item => ({ time: item.time, value: item.open }));
      lineSeries.setData(lineData);
  }
};

  const chartProperties = {
      height: 380,
      layout: {
          backgroundColor: '#f7f9fc',
          textColor: '#333',
      },
      grid: {
          vertLines: {
              color: '#e1e9f3',
          },
          horzLines: {
              color: '#e1e9f3',
          },
      },
      crosshair: {
          mode: LightweightCharts.CrosshairMode.Normal,
      },
      priceScale: {
          position: 'right',
          scaleMargins: {
              top: 0.1,
              bottom: 0.1,
          },
          borderVisible: false,
      },
      timeScale: {
          timeVisible: true,
          secondsVisible: true,
          borderVisible: false,
      },
  };

  const domElement = document.getElementById('tvchart');
  const chart = LightweightCharts.createChart(domElement, chartProperties);
  const candleseries = chart.addCandlestickSeries();
  const lineSeries = chart.addLineSeries();

  const displayChart = async () => {
      await updateChart();
  };

  // Call displayChart initially
  displayChart();

  // Call updateChart every second
  setInterval(updateChart, 4000); // 1000 milliseconds = 1 second

  function toggleChartType() {
      isCandleChart = !isCandleChart;
      if (isCandleChart) {
          candleseries.applyOptions({ visible: true });
          lineSeries.applyOptions({ visible: false });
      } else {
          candleseries.applyOptions({ visible: false });
          lineSeries.applyOptions({ visible: true });
      }
  }
</script>
@endsection
