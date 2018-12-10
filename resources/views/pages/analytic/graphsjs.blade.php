<link type="text/css" href="{{ asset('css/chartjs-visualizations.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<script>
(function(w,d,s,g,js,fs){
	g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
	js=d.createElement(s);fs=d.getElementsByTagName(s)[0];
	js.src='https://apis.google.com/js/platform.js';
	fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
}(window,document,'script'));
</script>

<script>

gapi.analytics.ready(function() {

	/**
	* Authorize the user with an access token obtained server side.
	*/
	gapi.analytics.auth.authorize({
		'serverAuth': {
			'access_token': '{{ $analytic->access_token }}'
		}
	});

	//accountid
	var accountid = '{{ $analytic->accountid }}';
	
	var init = function() {
		@if($page=='premium')
			//premium
			graph5(accountid);
		@else
			//session
			graph1(accountid);
			//countries by session
			graph2(accountid);
			//week
			graph3(accountid);
			//year
			graph4(accountid);
		@endif
	};

	//load library
	loadScript("{{ url('js/analytics.js') }}", init);


	function loadScript(url, callback)
	{
		// Adding the script tag to the head as suggested before
		var head = document.head;
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = url;

		// Then bind the event to the callback function.
		// There are several events for cross browser compatibility.
		script.onreadystatechange = callback;
		script.onload = callback;
		
		// Fire the loading
		head.appendChild(script);
	}

});
</script>