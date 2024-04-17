
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
                            <h3>$ {{ number_format($s_value) }}</h3>
                            <p>As of today at {{ now() }}</p>
                        </div>
                    </div>
                    <div id="chart-container">
                        <div style="float: right;padding:2%">
                            <button onclick="toggleChartType()"><img src="{{ asset('user_assets/line-chart.png') }}" alt="" width="25px"></button>
                        </div>
                        <div id="tvchart"></div>
                        <br>
                        <br>
                        <a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm" href="/trade_now/{{ $data->id }}">Invest Now</a>
                    </div>

                  
                    <div  id="chart-container"  class="flex sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
                       
                        <div>
                            <h1>{{$data->name}}</h1>
                            <br>
                            <h4>{{$data->description}}</h4>
                            <br>
                           
                            <h4>Stock Value: $ {{ number_format($s_value) }} </h4>
                            <h4>Return On Investment: {{$data->roi}} %</h4>
                            <h4>Status: {{$data->status}}</h4>
                            <h4>Total Invested Amount: $ {{number_format($data->total_invested)}}</h4>
                            <h4>Active Users: {{$data->no_of_users}}</h4>
                            <br>
                            <a class="mr-1 mb-2 inline-block rounded font-medium py-[5px] px-[15px] text-[13px] border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300 btn-sm" href="/trade_now/{{ $data->id }}">Invest Now</a>
                        </div>
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
        const res = await fetch('{{ $filePath }}');
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

@endsection
