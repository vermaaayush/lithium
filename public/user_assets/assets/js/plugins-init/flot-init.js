(function($) {
   "use strict"


 var dlabChartlist = function(){
	
	var screenWidth = $(window).width();

	
	
	var flotRealtime1 = function(){
		/*********** REAL TIME UPDATES **************/

		var data = [], totalPoints = 50;

		function getRandomData() {
			if (data.length > 0)
				data = data.slice(1);
			while (data.length < totalPoints) {
				var prev = data.length > 0 ? data[data.length - 1] : 50,
					y = prev + Math.random() * 10 - 5;
				if (y < 0) {
					y = 0;
				} else if (y > 100) {
					y = 100;
				}
				data.push(y);
			}
			var res = [];
			for (var i = 0; i < data.length; ++i) {
				res.push([i, data[i]])
			}
			return res;
		}


		// Set up the control widget
		var updateInterval = 1000;

		var plot4 = $.plot('#flotRealtime1', [getRandomData()], {
			colors: ['#452b90'],
			series: {
				lines: {
					show: true,
					lineWidth: 1
				},
				shadowSize: 0	// Drawing is faster without shadows
			},
			grid: {
				borderColor: 'transparent',
				borderWidth: 1,
				tickColor: 'transparent',
				labelMargin: 5
			},
			xaxis: {
				color: 'transparent',
				font: {
					size: 10,
					fill:"#828690"
				}
			},
			yaxis: {
				min: 0,
				max: 100,
				color: 'transparent',
				font: {
					size: 10,
					fill:"#828690"
				}
			}
		});
		update_plot4();
		function update_plot4() {
			plot4.setData([getRandomData()]);
			plot4.draw();
			setTimeout(update_plot4, updateInterval);
		}
	}
	

	$(function() {

		var d1 = [];
		for (var i = 0; i <= 10; i += 1) {
			d1.push([i, parseInt(Math.random() * 30)]);
		}

		var d2 = [];
		for (var i = 0; i <= 10; i += 1) {
			d2.push([i, parseInt(Math.random() * 30)]);
		}

		var d3 = [];
		for (var i = 0; i <= 10; i += 1) {
			d3.push([i, parseInt(Math.random() * 30)]);
		}

		var stack = 0,
			bars = true,
			lines = false,
			steps = false;

		function plotWithOptions() {
			$.plot("#flotRealtime3", [ d1, d2, d3 ], {
				series: {
					stack: stack,
					
					size: 11,
					lineHeight: 13,
					style: "italic",
					weight: "bold",
					family: "sans-serif",
					variant: "small-caps",
					color: "var(--primary)",

					lines: {
						show: false,
						fill: false,
						steps: steps
					},
					bars: {
						show: bars,
						lineWidth: 0,
						barWidth: 0.5
						
					},
					
				},grid: {
				borderWidth: 1,
				tickColor: 'transparent',
				borderColor: 'transparent'
			},
			yaxis: {
				tickLength:0,
				font: {
					fill: '#828690',
					size: 10
				}
			},
				xaxis:{
					tickLength:0,
						font: {
							fill: '#828690',
							size: 10
						}
					
					
				}
			});
		}

		plotWithOptions();

		$(".stackControls button").click(function (e) {
			e.preventDefault();
			stack = $(this).text() == "With stacking" ? true : null;
			plotWithOptions();
		});

		$(".graphControls button").click(function (e) {
			e.preventDefault();
			bars = $(this).text().indexOf("Bars") != -1;
			lines = $(this).text().indexOf("Lines") != -1;
			steps = $(this).text().indexOf("steps") != -1;
			plotWithOptions();
		});

		// Add the Flot version string to the footer

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});
	

	
	/* Function ============ */
	return {
		init:function(){
		},
		
		
		load:function(){
			// flotBar1();	
			// flotBar2();
			// flotLine1();	
			// flotLine2();	
			// flotLine3();		
			// flotArea1();
			// flotArea2();
			// flotLine4();
			// flotRealtime1();
			// flotRealtime2();
			
			
		},
		
		resize:function(){
		}
	}

}();

jQuery(document).ready(function(){
});
	
jQuery(window).on('load',function(){
	dlabChartlist.load();
});

jQuery(window).on('resize',function(){
	dlabChartlist.resize();
});     

})(jQuery);