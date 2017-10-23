<?php
namespace App\Http\Controllers;
use App\Comment;
use Request;
class CommentController extends Controller {

	/**
	 * Send back all comments as JSON
	 *
	 * @return Response
	 */
	public function index()
	{
		return \Response::json(Comment::get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Comment::create(array(
			'author' => Request::get('author'),
			'body' =>  Request::get('body'), 
			'title' =>  Request::get('title'), 
			'date' =>  Request::get('date') 
		));

		return \Response::json(array('success' => true));
	}

	/**
	 * Return the specified resource using JSON
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return \Response::json(Comment::find($id));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Comment::destroy($id);

		return \Response::json(array('success' => true));
	}

}