
@extends('user.layout.main')
@section('title','View Investment Plan')
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
                                <img src="{{ asset($data->image) }}" alt="Image" width="90" height="90">
                                <div style="padding: 2%">
                                    <h3 class="font-semibold ">{{$data->name}}</h3>
                                    <h4 class="font-semibold ">Market Value: ${{ number_format($s_value) }}</h4>
                                    <p>As of today at {{ now() }}</p>
                                </div>
                            </div>
                            
                            {{-- <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                                <h4 class="card-title text-base capitalize">Stock Details</h4>
                            </div> --}}
                            <div style="padding: 4%">
                               
                                <p class="mb-1.5 leading-6 mt-[1.125rem]">{{$data->description}}</p>
                                <br>
                          
                                <p><strong>Stock Value:</strong> ${{ number_format($s_value) }} </p>
                                <p><strong>Return On Investment:</strong> {{$data->roi}} %</p>
                                <p><strong>Status:</strong> {{$data->status}}</p>
                                <p><strong>Total Invested Amount:</strong> ${{number_format($data->total_invested)}}</p>
                                <p><strong>Active Users:</strong> {{$data->no_of_users}}</p>
                                <br>
                            </div>
                          
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
   
   <!-- review -->
   
</div>

<div class="row">
    <div class="w-full">
        <div class="filter cm-content-box box-primary relative rounded mb-4 bg-white dark:bg-[#182237]">
            <div class="content-title flex justify-between items-center py-4 sm:px-6 px-[1.2rem] card-toggle-btn">
                <div class="cpa text-dark dark:text-white text-base font-semibold">
                    <i class="fa-sharp fa-solid fa-filter mr-2"></i>Sales Point
                </div>
                <div class="tools">
                    <a href="javascript:void(0);" class="expand SlideToolHeader inline-block"><i class="fal fa-angle-down font-['Font_Awesome_6_Free'] font-semibold text-[#c2c2c2] text-xl arrow"></i></a>
                </div>
            </div>
            <div class="content form excerpt border-t border-b-color dark:border-[#ffffff1a]">
            <form action="/trade_in" method="POST">
                @csrf 
                <div class="sm:p-5 p-4">
                    <div class="row">
                        
                        <div class="xl:w-1/4 sm:w-1/2 w-full">
                            <label class="form-label">Available Balance</label>
                           
                            <input type="text"  class="form-control relative text-[13px]  h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full xl:mb-0 mb-4" value="${{ number_format($user->balance) }}" style="color:green;font-weight:bold" name="balance" >
                        </div>
                        <div class="xl:w-1/4 sm:w-1/2 w-full">
                            <label class="form-label">User Name</label>

                            <input type="text" hidden value="{{ $data->name }}  | {{ $data->roi }}% | {{ $data->duration }}Days | ${{ $data->minimum_amount }} minimum"  readonly>
                            <input type="text"  value="{{ $data->plan_id }}" name="plan_id" hidden >
                            <input type="text"  value="{{ $data->duration }}" name="duration" hidden >
                            <input type="text" name="user_id" value="{{ $user->user_id }}" hidden>

                            
                            <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full xl:mb-0 mb-4" value="{{ $user->name }}" name="user_name" readonly>
                        </div>
                       
                        <div class="xl:w-1/4 sm:w-1/2 w-full">
                            <label class="form-label"><span style="color:rebeccapurple">(Minimum Amount: ${{ number_format($data->minimum_amount) }})</span></label>
                           
                            <input type="text" id="amount" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full xl:mb-0 mb-4" placeholder="Enter the amount" name="amount" required>
                        </div>
                        <div class="xl:w-1/4 sm:w-1/2 w-full self-end">
                            <button class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-white bg-primary leading-5 inline-block border border-primary btn-primary light hover:bg-primary btn-primary"  type="submit">Invest Now</button>
                           
                        </div>
                        
                    </div>
                </div>
            </form>
            </div>
        </div>

       
    </div>
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


 <script>
    document.addEventListener('DOMContentLoaded', function () {
        const amountInput = document.getElementById('amount');

        amountInput.addEventListener('input', function () {
            const enteredAmount = parseFloat(amountInput.value);
            const minimumAmount = parseFloat('{{ $data->minimum_amount }}');

            if (enteredAmount < minimumAmount) {
                amountInput.setCustomValidity('Amount must be at least ${{ $data->minimum_amount }}');
            } else {
                amountInput.setCustomValidity('');
            }
        });
    });
</script>

@endsection
