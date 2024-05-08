
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
            <div class="card-body p-0">
                <div class="overflow-x-auto active-projects task-table">
                    <div class="flex sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
                        <img src="{{ asset($plan_info->image) }}" alt="Image" width="120" height="120">
                        <div style="padding-left:4%">
                            
                            <h1>{{$plan_info->name}}</h1>
                            <h2>Total Invested: ${{ number_format($data->amount) }}</h2>
                            <h2>Current Value: <span id="current_value12"></span></h2>
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
                    <div id="chart-container">
                        <div style="float: right;">
                            <button onclick="toggleChartType()"><img src="{{ asset('user_assets/line-chart.png') }}" alt="" width="25px"></button>
                        </div>
                        <div id="tvchart"></div>
                        
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
    setInterval(updateChart, 1000); // 1000 milliseconds = 1 second

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

const fetchCSVData = async (filePath) => {
    const res = await fetch(filePath);
    const resp = await res.text();
    const data = resp.split('\n').map((row) => {
        const [date, time, open, high, low, close] = row.split(',');
        return {
            dateTime: new Date(`${date} ${time}`).getTime() / 1000,
            open: parseFloat(open),
            high: parseFloat(high),
            low: parseFloat(low),
            close: parseFloat(close),
        };
    });
    return data;
};

const calculateInvestedMoneyValue = (data, investmentAmount, stock_value) => {
    console.log(data);
    const currentPrice = data[data.length - 1].close;
    console.log(currentPrice);
    const currentValue = (investmentAmount / stock_value) * currentPrice;
    console.log(currentValue);
    return currentValue;
};

const filePath = '{{ $filePath }}'; // Replace '{{ $filePath }}' with the actual file path
const initialInvestmentAmount = '{{$data->amount}}'; 
const stock_value=  '{{$stock_value}}';


const logInvestedMoneyValue = async () => {
    const csvData = await fetchCSVData(filePath);
    const currentValue = calculateInvestedMoneyValue(csvData, initialInvestmentAmount, stock_value);
   
    const currentValueElement = document.getElementById('current_value12');
    const currentValueInput = document.getElementById('current_value2');

    currentValueElement.innerHTML = '$' + currentValue.toFixed(2);
    currentValueInput.value = currentValue.toFixed(2);
    console.log('green1');
    // Check if current value is greater than initial investment amount
    if (currentValue > initialInvestmentAmount) {
        console.log('green');
        currentValueElement.style.color = 'green'; // Change text color to red
    } else {
        currentValueElement.style.color = 'red'; // Change text color to green
    }
};

// Log the invested money value every second
setInterval(logInvestedMoneyValue, 5000); // 1000 milliseconds = 1 second


</script>
@endsection
