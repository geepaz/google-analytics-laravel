<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticController extends GoogleController
{
	const active = 'analytic';
	const title = 'Analytics';


	/**
	* Show the application index.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
		);
		$page = "analytic";
		//refresh access token
		$analytic = self::refreshToken();
		
		return view('pages.analytic.index', compact('title', 'page', 'analytic'));
	}
	
	
	
	
	/**
	* Show the application keywords.
	*
	* @return \Illuminate\Http\Response
	*/
	public function keywords(Request $request)
	{
		$date = date('m/d/Y');
		$monthago = date("m/d/Y", strtotime($date."-1Month"));
		
		$parms = array(
			'filter' => @($request->filter) ? '' : '',
			'per_page' => @($request->per_page) ? $request->per_page : '10',
			'from_date' => @($request->from_date) ? $request->from_date : $monthago,
			'to_date' => @($request->to_date) ? $request->to_date : $date,
			'page' => @($request->page) ? $request->page : 1,
			'metrics' => 'sessions,users,goalCompletionsAll,goalConversionRateAll,avgPageLoadTime,percentNewSessions',
			'dimensions' => @($request->filter) ? '' : 'pageTitle,keyword',
		);

		$title = array(
			'active' => self::active,
			'title' => 'List Keywords',
		);
		$page = "keywords";
		//refresh access token
		$analytic = self::refreshToken();
		//refresh access token
		$premium = self::getPremium($parms, $analytic);
		
		return view('pages.analytic.tables', compact('title', 'page', 'analytic', 'premium', 'parms'));		
	}

	/**
	* Show the application visitors.
	*
	* @return \Illuminate\Http\Response
	*/
	public function visitors(Request $request)
	{
		$date = date('m/d/Y');
		$monthago = date("m/d/Y", strtotime($date."-1Month"));
		
		$parms = array(
			'filter' => @($request->filter) ? '' : '',
			'per_page' => @($request->per_page) ? $request->per_page : '10',
			'from_date' => @($request->from_date) ? $request->from_date : $monthago,
			'to_date' => @($request->to_date) ? $request->to_date : $date,
			'page' => @($request->page) ? $request->page : 1,
			'metrics' => 'sessions,percentNewSessions,newUsers,bounceRate,pageviewsPerSession,avgSessionDuration,goal1ConversionRate,goal1Completions,goal1Value',
			'dimensions' => @($request->filter) ? '' : 'userType',
		);

		$title = array(
			'active' => self::active,
			'title' => 'List Visitors',
		);
		$page = "visitors";
		//refresh access token
		$analytic = self::refreshToken();
		//refresh access token
		$premium = self::getPremium($parms, $analytic);
		//print_r($premium);die;
		return view('pages.analytic.tables', compact('title', 'page', 'analytic', 'premium', 'parms'));		
	}

	/**
	* Show the application premium.
	*
	* @return \Illuminate\Http\Response
	*/
	public function premium(Request $request)
	{
		$date = date('m/d/Y');
		$monthago = date("m/d/Y", strtotime($date."-1Month"));
		
		$parms = array(
			'filter' => @($request->filter) ? 'ga:contentGroup1=='.$request->filter : '',
			'per_page' => @($request->per_page) ? $request->per_page : '10',
			'from_date' => @($request->from_date) ? $request->from_date : $monthago,
			'to_date' => @($request->to_date) ? $request->to_date : $date,
			'page' => @($request->page) ? $request->page : 1,
			'metrics' => 'bounceRate,pageviews,contentGroupUniqueViews1,avgTimeOnPage,exitRate',
			'dimensions' => @($request->filter) ? 'pagePath,contentGroup1' : 'contentGroup1',
		);

		$title = array(
			'active' => self::active,
			'title' => 'Premium Content',
		);
		$page = "premium";
		//refresh access token
		$analytic = self::refreshToken();
		//refresh access token
		$premium = self::getPremium($parms, $analytic);
		
		//print_r($premium);die;
		return view('pages.analytic.tables', compact('title', 'page', 'analytic', 'premium', 'parms'));		
	}


	/**
	* Show the application landing.
	*
	* @return \Illuminate\Http\Response
	*/
	public function landing(Request $request)
	{
		$date = date('m/d/Y');
		$monthago = date("m/d/Y", strtotime($date."-1Month"));
		
		$parms = array(
			'filter' => @($request->filter) ? '' : '',
			'per_page' => @($request->per_page) ? $request->per_page : '10',
			'from_date' => @($request->from_date) ? $request->from_date : $monthago,
			'to_date' => @($request->to_date) ? $request->to_date : $date,
			'page' => @($request->page) ? $request->page : 1,
			'metrics' => 'sessions,percentNewSessions,newUsers,bounceRate,pageviewsPerSession,avgSessionDuration,goal1ConversionRate,goal1Completions,goal1Value',
			'dimensions' => @($request->filter) ? '' : 'landingPagePath',
		);

		$title = array(
			'active' => self::active,
			'title' => 'Landing Page',
		);
		$page = "landing";
		//refresh access token
		$analytic = self::refreshToken();
		//refresh access token
		$premium = self::getPremium($parms, $analytic);
		
		//print_r($premium);die;
		return view('pages.analytic.tables', compact('title', 'page', 'analytic', 'premium', 'parms'));		
	}




}
