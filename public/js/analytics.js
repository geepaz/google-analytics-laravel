	/**
	* Create a new session graph
	*/
	function graph1(accountid){
		var dataChart = new gapi.analytics.googleCharts.DataChart({
			query: {
				'ids': 'ga:'+accountid,
				'metrics': 'ga:sessions,ga:users',
				'dimensions': 'ga:date',
				'start-date': '30daysAgo',
				'end-date': 'yesterday'
			},
			chart: {
				'container': 'graph1',
				'type': 'LINE',
				'options': {
					'width': '100%'
				}
			}
		});
		dataChart.execute();
	}


	/**
	* Create a new countries by session graph
	*/
	function graph2(accountid){
		var dataChart = new gapi.analytics.googleCharts.DataChart({
			query: {
				'ids': 'ga:'+accountid,
				'metrics': 'ga:sessions',
				'dimensions': 'ga:country',
				'start-date': '30daysAgo',
				'end-date': 'yesterday',
				'max-results': 6,
				sort: '-ga:sessions'
			},
			chart: {
				'container': 'graph2',
				'type': 'PIE',
				'options': {
					'width': '100%',
					'pieHole': 4/9
				}
			}
		});
		dataChart.execute();
	}

	/**
	* This Week vs Last Week
	*/
	function graph3(accountid){
		var now = moment(); // .subtract(3, 'day');

		var thisWeek = query({
			'ids': 'ga:'+accountid,
			'dimensions': 'ga:date,ga:nthDay',
			'metrics': 'ga:sessions',
			'start-date': moment(now).subtract(1, 'day').day(0).format('YYYY-MM-DD'),
			'end-date': moment(now).format('YYYY-MM-DD')
		});

		var lastWeek = query({
			'ids': 'ga:'+accountid,
			'dimensions': 'ga:date,ga:nthDay',
			'metrics': 'ga:sessions',
			'start-date': moment(now).subtract(1, 'day').day(0).subtract(1, 'week')
			.format('YYYY-MM-DD'),
			'end-date': moment(now).subtract(1, 'day').day(6).subtract(1, 'week')
			.format('YYYY-MM-DD')
		});

		Promise.all([thisWeek, lastWeek]).then(function(results) {

			var data1 = results[0].rows.map(function(row) { return +row[2]; });
			var data2 = results[1].rows.map(function(row) { return +row[2]; });
			var labels = results[1].rows.map(function(row) { return +row[0]; });

			labels = labels.map(function(label) {
				return moment(label, 'YYYYMMDD').format('ddd');
			});

			var data = {
				labels : labels,
				datasets : [
					{
						label: 'Last Week',
						fillColor : 'rgba(220,220,220,0.5)',
						strokeColor : 'rgba(220,220,220,1)',
						pointColor : 'rgba(220,220,220,1)',
						pointStrokeColor : '#fff',
						data : data2
					},
					{
						label: 'This Week',
						fillColor : 'rgba(151,187,205,0.5)',
						strokeColor : 'rgba(151,187,205,1)',
						pointColor : 'rgba(151,187,205,1)',
						pointStrokeColor : '#fff',
						data : data1
					}
				]
			};

			new Chart(makeCanvas('graph3')).Line(data);
			generateLegend('legend3', data.datasets);
		});
	}


	/**
	* This Year vs Last Year
	*/
	function graph4(accountid){
		var now = moment(); // .subtract(3, 'day');

		var thisYear = query({
			'ids': 'ga:'+accountid,
			'dimensions': 'ga:month,ga:nthMonth',
			'metrics': 'ga:users',
			'start-date': moment(now).date(1).month(0).format('YYYY-MM-DD'),
			'end-date': moment(now).format('YYYY-MM-DD')
		});

		var lastYear = query({
			'ids': 'ga:'+accountid,
			'dimensions': 'ga:month,ga:nthMonth',
			'metrics': 'ga:users',
			'start-date': moment(now).subtract(1, 'year').date(1).month(0)
			.format('YYYY-MM-DD'),
			'end-date': moment(now).date(1).month(0).subtract(1, 'day')
			.format('YYYY-MM-DD')
		});

		Promise.all([thisYear, lastYear]).then(function(results) {
			var data1 = results[0].rows.map(function(row) { return +row[2]; });
			var data2 = results[1].rows.map(function(row) { return +row[2]; });
			var labels = ['Jan','Feb','Mar','Apr','May','Jun',
			'Jul','Aug','Sep','Oct','Nov','Dec'];

			// Ensure the data arrays are at least as long as the labels array.
			// Chart.js bar charts don't (yet) accept sparse datasets.
			for (var i = 0, len = labels.length; i < len; i++) {
				if (data1[i] === undefined) data1[i] = null;
				if (data2[i] === undefined) data2[i] = null;
			}

			var data = {
				labels : labels,
				datasets : [
					{
						label: 'Last Year',
						fillColor : 'rgba(220,220,220,0.5)',
						strokeColor : 'rgba(220,220,220,1)',
						data : data2
					},
					{
						label: 'This Year',
						fillColor : 'rgba(151,187,205,0.5)',
						strokeColor : 'rgba(151,187,205,1)',
						data : data1
					}
				]
			};

			new Chart(makeCanvas('graph4')).Bar(data);
			generateLegend('legend4', data.datasets);
		});
	}

	/**
	* Create a new session graph
	*/
	function graph5(accountid){
		var dataChart = new gapi.analytics.googleCharts.DataChart({
			query: {
				'ids': 'ga:'+accountid,
				'metrics': 'ga:pageviews,ga:contentGroupUniqueViews1,ga:avgTimeOnPage,ga:exitRate',
				'dimensions': 'ga:contentGroup1',
				'start-date': '30daysAgo',
				'end-date': 'yesterday',
				'max-results': 6,
				sort: '-ga:pageviews'
			},
			chart: {
				'container': 'graph5',
				'type': 'PIE',
				'options': {
					'width': '100%',
					'pieHole': 4/9
				}
			}
		});
		dataChart.execute();
	}
	
	
	
	
	
	
	
	
	

	//functions
	function query(params) {
		return new Promise(function(resolve, reject) {
			var data = new gapi.analytics.report.Data({query: params});
			data.once('success', function(response) { resolve(response); })
			.once('error', function(response) { reject(response); })
			.execute();
		});
	}

	function generateLegend(id, items) {
		var legend = document.getElementById(id);
		legend.innerHTML = items.map(function(item) {
			var color = item.color || item.fillColor;
			var label = item.label;
			return '<li><i style="background:' + color + '"></i>' +
			escapeHtml(label) + '</li>';
		}).join('');
	}

	function makeCanvas(id) {
		var container = document.getElementById(id);
		var canvas = document.createElement('canvas');
		var ctx = canvas.getContext('2d');

		container.innerHTML = '';
		canvas.width = container.offsetWidth;
		canvas.height = container.offsetHeight;
		container.appendChild(canvas);
		return ctx;
	}

	function escapeHtml(str) {
		var div = document.createElement('div');
		div.appendChild(document.createTextNode(str));
		return div.innerHTML;
	}
