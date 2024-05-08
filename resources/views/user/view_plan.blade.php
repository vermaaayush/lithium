
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
            <div class="card-body p-0">
                <div class="overflow-x-auto active-projects task-table">
                    <div class="flex sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
                        <img src="{{ asset($data->image) }}" alt="Image" width="120" height="120">
                        <div style="padding: 2%">
                            <h1>{{$data->name}}</h1>
                            <h3>Market Value: ${{ number_format($s_value) }}</h3>
                            <p>As of today at {{ now() }}</p>
                        </div>
                    </div>
                    <div id="chart-container">
                        <div style="float: right;padding:2%">
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
        </div>
    </div>
</div>

<div class="md:w-1/2">
												
    <div class="card">
        <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
            <h4 class="card-title text-base capitalize">Stock Details</h4>
        </div>
        <div style="padding: 5%">
            <h2>{{$data->name}}</h2>
            <br>
            <h4>{{$data->description}}</h4>
            <br>
      
            <h4>Stock Value: $ {{ number_format($s_value) }} </h4>
            <h4>Return On Investment: {{$data->roi}} %</h4>
            <h4>Status: {{$data->status}}</h4>
            <h4>Total Invested Amount: $ {{number_format($data->total_invested)}}</h4>
            <h4>Active Users: {{$data->no_of_users}}</h4>
            <br>
                   </div>

    </div>
</div>

<div class="md:w-1/2">
    
    <div class="card">
        <div>
            <div class="card">
                <div class="card-header flex flex-wrap justify-between items-center sm:p-5 sm:pt-6 p-4 pt-5 max-sm:pb-5 relative z-[2] border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                    <h4 class="card-title text-base capitalize">Sales Point</h4>
                </div>
                <div class="sm:p-5 p-4">
                    <div class="basic-form">
                        <form action="/trade_in" method="post" class="form-valide-with-icon needs-validation" enctype="multipart/form-data"> 
                            @csrf 
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Available Wallet Balance <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="${{ number_format($user->balance) }}" style="color:green;font-weight:bold" name="balance" readonly>
                                   
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">User Name <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $user->name }}" name="user_name" readonly>
                                   
                                </div>
                            </div>

                            <input type="text" name="user_id" value="{{ $user->user_id }}" hidden>

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Selected Plan <span class="required text-danger">*</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" value="{{ $data->name }}  | {{ $data->roi }}% | {{ $data->duration }}Days | ${{ $data->minimum_amount }} minimum"  readonly>
                                   
                                </div>
                            </div>

                             <input type="text"  value="{{ $data->plan_id }}" name="plan_id" hidden >
                             <input type="text"  value="{{ $data->duration }}" name="duration" hidden >

                            <div class="mb-4">
                                <label class="text-label form-label text-dark dark:text-white" for="validationCustomUsername">Amount <span class="required text-danger">*</span> <br><span style="color:rebeccapurple">(Minimum Amount: ${{ number_format($data->minimum_amount) }})</span></label>
                                <div class="flex items-stretch flex-wrap relative w-full">
                                  
                                    <input type="text" id="amount" class="form-control rounded-s-md relative flex-1 w-[1%] text-[13px] h-[2.813rem] border border-b-color block rounded-e-md py-1.5 px-3 duration-500  outline-none ml-[-1px]" placeholder="Enter the amount" name="amount" required>

                                   
                                </div>
                            </div>

                           

                           
                            
                            <button type="submit" class="btn mr-2 inline-block rounded font-medium text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Invest Now</button>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>



<script type="text/javascript">
  let isCandleChart = true;
  let chartType = 'candlestick';

  const getData = async () => {
      const timestamp = new Date().getTime(); 
      const res = await fetch('{{ $filePath }}?_=' + timestamp);
      const resp = await res.text();
      const cdata = resp.split('\n').map((row) => {
          const [time1, time2, open, high, low, close] = row.split(',');
          return {
              time: new Date(`${time1}, ${time2}`).getTime() / 1000,
              open: open * 1,
              high: high * 1,
              low: low * 1,
              close: close * 1,
          };
      });
      console.log('hi');
      console.log(cdata);
      return cdata;
  };

  const updateChart = async () => {
      const klinedata = await getData();
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
  setInterval(updateChart, 5000); // 1000 milliseconds = 1 second

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
