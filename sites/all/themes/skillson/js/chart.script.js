(function($) {

	window.onload = function(){
		
		var courses = $(".course-data");
		var lineChartData = {
				labels : [],
				datasets : [
					{
						label: "Course Result",
						fillColor : "rgba(220,220,220,0.2)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "rgba(220,220,220,1)",
						data : []
					}
				]

			};
		
		var ctx = [];
		var lineChartData = [];
		$.each(courses, function(index, value){
			//reset data
			var id = $(this).attr("id");
			var canvas_id = id + "-canvas";
			
			
			lineChartData[canvas_id] = {
					labels : [],
					datasets : [
						{
							label: "",
							fillColor : "rgba(220,220,220,0.2)",
							strokeColor : "#262626",
							pointColor : "#0027ff",
							pointStrokeColor : "#fff",
							pointHighlightFill : "#fff",
							pointHighlightStroke : "rgba(220,220,220,1)",
							data : []
						}
					]
			};
			
			//lineChartData[canvas_id].labels[];
			//lineChartData[canvas_id].datasets[0].data[];
			lineChartData[canvas_id].datasets[0].label = canvas_id;
			
			$.each($(this).find("li"), function(index2, value2){
				lineChartData[canvas_id].labels.push($(this).html());
				lineChartData[canvas_id].datasets[0].data.push($(this).data("score"))
			});
			
			
			ctx[canvas_id] = document.getElementById(canvas_id).getContext("2d");
			window.myLine = new Chart(ctx[canvas_id]).Line(lineChartData[canvas_id], {
				responsive: true
			});
			
		});
		
	};	
	
})( jQuery );


