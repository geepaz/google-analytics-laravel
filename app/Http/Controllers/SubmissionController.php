<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class SubmissionController extends Controller
{
	const active = 'submission';
	const title = 'Submission Form';

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

		if(auth()->user()->role=='admin'){
			$submissions = Submission::paginate(10);
		}
		else{
			$submissions = Submission::whereUsersId(auth()->user()->id)->paginate(10);
		}
		return view('pages.submission.index', compact('title', 'submissions'));
	}



	/**
	* Show the form for creating a new user.
	*
	* @return \Illuminate\Http\Response
	*/
	public function form(Request $request)
	{
		$title = array(
			'active' => self::active,
			'title' => self::title,
		);
		$form = 'form1';

		$submission='';
		if(@$request->id){
			$submission = Submission::whereId(base64_decode($request->id))->whereUsersId(auth()->user()->id)->first();
			if(!$submission){
				$request->session()->flash('success', "Submission not found!");
				return redirect()->route('submission.index');
			}
		}
		switch(@$request->page){
			case 'public':
				$form = 'form2';
			break;
			case 'premium':
				$form = 'form3';
			break;
			case 'premium-submission':
				$form = 'form4';
			break;
		}
		return view('pages.submission.form', compact('title', 'form', 'submission'));
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return void
	*/
	public function form1(Request $request)
	{		
		$data = array(
			'email' => $request->email,
			'type' => @$request->type
		);

		$form = new Submission;
		$form->users_id = auth()->user()->id;
		$form->form1 = json_encode($data);
		$form->save();

		$form_id = base64_encode($form->id);
		if($request->type=='premium'){
			return redirect('submission/form?id='.$form_id.'&page=premium');
		}
		return redirect('submission/form?id='.$form_id.'&page=public');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return void
	*/
	public function form1edit(Request $request, Submission $submission)
	{		
		$data = array(
			'email' => $request->email,
			'type' => @$request->type
		);

		$submission->form1 = json_encode($data);
		$submission->save();

		$form_id = base64_encode($submission->id);
		if($request->type=='premium'){
			return redirect('submission/form?id='.$form_id.'&page=premium');
		}
		return redirect('submission/form?id='.$form_id.'&page=public');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return void
	*/
	public function form2(Request $request, Submission $submission)
	{
		$data = array(
			'content' => @$request->content,
			'type' => @$request->type,
			'author' => @$request->author,
			'date' => @$request->date,
		);

		$submission->form2 = json_encode($data);
		$submission->save();

		$form_id = base64_encode($submission->id);
		return redirect('submission/form?id='.$form_id.'&page=premium');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return void
	*/
	public function form3(Request $request, Submission $submission)
	{
		$data = array(
			'type' => @$request->type,
			'type_txt' => @$request->type_txt
		);

		$submission->form3 = json_encode($data);
		$submission->save();

		$form_id = base64_encode($submission->id);
		return redirect('submission/form?id='.$form_id.'&page=premium-submission');
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param Request $request
	* @return void
	*/
	public function form4(Request $request, Submission $submission)
	{
		$sus = json_decode($submission->form4);
		$newImage = '';

        if ($request->file('image')) {
        	$path = 'upload/submission/image/';
        	$image = 'img-' . $submission->id . time() . '.png';
        	Image::make($request->file('image'))->save($path.$image);
        	$newImage = $image;
		}
		else {
			if(@$sus->image){
				$newImage = $sus->image;
			}
		}

		$newPdf = '';
		if($request->file('pdf')){
			$file = $request->file('pdf');
			$path3 = 'upload/submission/pdf/';
			$media = 'file-' . $submission->id . time() . $file->getClientOriginalName();
			$media = str_replace(" ", "", $media);
			$mime_type = $file->getMimeType();
			$file->move($path3, $media);
			$newPdf = $media;
		}
		else {
			if(@$sus->pdf){
				$newPdf = $sus->pdf;
			}
		}
		
		$data = array(
			'title' => @$request->title,
			'date' => @$request->date,
			'key_topic' => json_encode($request->key_topic),
			'states' => @$request->states,
			'image' => @$newImage,
			'summery' => @$request->summery,
			'description' => @$request->description,
			'pdf' => @$newPdf,
		);

		$submission->form4 = json_encode($data);
		$submission->save();
		
		$request->session()->flash('success', "Content Submission Form Submitted");
		return redirect()->route('submission.index');
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param Request $request
	* @param  \App\Models\Submission $submission
	* @return \Illuminate\Http\Response
	* @throws \Exception
	*/
	public function destroy(Request $request, Submission $submission)
	{
		$request->session()->flash('error', "Submission deleted!");
		$submission->delete();
		return redirect()->route('submission.index');
	}



}
