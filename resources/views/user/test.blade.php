@extends('user.layout.main')
@section('title', 'Client Status')
@section('main-container')
<style type="text/css">
		

	.switcher {
		display: flex;
		align-items: center;
		height: 30px;
		margin-top: 8px;
		color: #2196F3;
	}
	
	.switcher-item {
		cursor: pointer;
		text-decoration: none;
		display: inline-block;
		padding: 6px 8px;
		font-size: 14px;
		color: #262b3e;
		background-color: transparent;
		margin-right: 8px;
		border: none;
		border-radius: 4px;
		outline: none;
	}
	
	.switcher-item:hover {
		background-color: #f2f3f5;
	}
	
	.switcher-active-item {
		text-decoration: none;
		cursor: default;
		color: #262b3e;
	}
	
	.switcher-active-item,
	.switcher-active-item:hover {
		background-color: #e1eff9;
	}
	
	</style>
<div style="border: 1px solid red; width:60%;margin:auto">
	<div id="chartContainer"></div>
</div>
<script src="https://unpkg.com/lightweight-charts/dist/lightweight-charts.standalone.production.js"></script>
<script type="text/javascript">
	

	function createSimpleSwitcher(items, activeItem, activeItemChangedCallback) {
		var switcherElement = document.createElement('div');
		switcherElement.classList.add('switcher');
	
		var intervalElements = items.map(function(item) {
			var itemEl = document.createElement('button');
			itemEl.innerText = item;
			itemEl.classList.add('switcher-item');
			itemEl.classList.toggle('switcher-active-item', item === activeItem);
			itemEl.addEventListener('click', function() {
				onItemClicked(item);
			});
			switcherElement.appendChild(itemEl);
			return itemEl;
		});
	
		function onItemClicked(item) {
			if (item === activeItem) {
				return;
			}
	
			intervalElements.forEach(function(element, index) {
				element.classList.toggle('switcher-active-item', items[index] === item);
			});
	
			activeItem = item;
	
			activeItemChangedCallback(item);
		}
	
		return switcherElement;
	}
	
	var switcherElement = createSimpleSwitcher(['Dark', 'Light'], 'Light', syncToTheme);
	
	var chartElement = document.createElement('div');
	
	var chart = LightweightCharts.createChart(chartElement, {
		width: 600,
	  height: 300,
		rightPriceScale: {
			borderVisible: true,
		},
		timeScale: {
			borderVisible: true,
		},
	});
	
	document.getElementById('chartContainer').appendChild(chartElement);
	document.getElementById('chartContainer').appendChild(switcherElement);
	
	var areaSeries = chart.addAreaSeries({
	  topColor: 'rgba(33, 150, 243, 0.56)',
	  bottomColor: 'rgba(33, 150, 243, 0.04)',
	  lineColor: 'rgba(33, 150, 243, 1)',
	  lineWidth: 2,
	});
	
	var darkTheme = {
		chart: {
			layout: {
				background: {
					type: 'solid',
					color: '#2B2B43',
				},
				lineColor: '#2B2B43',
				textColor: '#D9D9D9',
			},
			watermark: {
				color: 'rgba(0, 0, 0, 0)',
			},
			crosshair: {
				color: '#758696',
			},
			grid: {
				vertLines: {
					color: '#2B2B43',
				},
				horzLines: {
					color: '#363C4E',
				},
			},
		},
		series: {
				topColor: 'rgba(32, 226, 47, 0.56)',
				bottomColor: 'rgba(32, 226, 47, 0.04)',
				lineColor: 'rgba(32, 226, 47, 1)',
		},
	};
	
	const lightTheme = {
		chart: {
			layout: {
				background: {
					type: 'solid',
					color: '#FFFFFF',
				},
				lineColor: '#2B2B43',
				textColor: '#191919',
			},
			
			grid: {
				vertLines: {
					visible: false,
				},
				horzLines: {
					color: '#f0f3fa',
				},
			},
		},
		series: {
				topColor: 'rgba(33, 150, 243, 0.56)',
				bottomColor: 'rgba(33, 150, 243, 0.04)',
				lineColor: 'rgba(33, 150, 243, 1)',
		},
	};
	
	var themesData = {
		Dark: darkTheme,
		Light: lightTheme,
	};
	
	function syncToTheme(theme) {
		chart.applyOptions(themesData[theme].chart);
		areaSeries.applyOptions(themesData[theme].series);
	}
	

	function generateRandomData() {
    const baseValue = 100;
    const minValue = 80;
    const maxValue = 130;

    const newData = [];
    for (let i = 1; i <= 100; i++) {
        const randomValueChange = Math.random() * 10; // Random value change between 0 and 10
        const newValue = baseValue + randomValueChange;
        newData.push({ time: i, value: Math.max(minValue, Math.min(maxValue, newValue)) });
    }
    
	console.log(newData);
    return newData;
}



 // This will log an array with a single data point containing the current time in seconds and a random value.


setInterval(function() {
    const newData = generateRandomData();
    areaSeries.setData(newData);
}, 1000);

	syncToTheme('Lite');


	
	</script>
	
	
@endsection