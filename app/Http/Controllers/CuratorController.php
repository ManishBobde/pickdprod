<?php

namespace App\Http\Controllers;

use App\DraftedPost;
use App\SubmittedPost;
use Illuminate\Http\Request;
use App\Http\Requests;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PD\Validations\DraftedPostValidator;
use PD\Validations\SubmitPostValidator;

class CuratorController extends Controller {

	/**
	 * @var SubmitPostValidator
	 */
	private $submitPostValidator;
	/**
	 * @var DraftedPostValidator
	 */
	private $draftedPostValidator;


	/**
	 * Create a new controller instance.
	 * @param SubmitPostValidator $submitPostValidator
	 * @param DraftedPostValidator $draftedPostValidator
	 * @internal param PostValidator $postValidator
	 */
	public function __construct(SubmitPostValidator $submitPostValidator, DraftedPostValidator $draftedPostValidator)
	{
		$this->middleware('auth');
		$this->submitPostValidator = $submitPostValidator;
		$this->draftedPostValidator = $draftedPostValidator;
	}

	/**
	 *Return the home view for curator
	 */
	public function home()
	{
		return view('curator.home');
	}

	/**
	 * Save the post
	 * @param Request $request
	 * @param $userId
	 * @return \Illuminate\Http\RedirectResponse
	 */

	public function savePost(Request $request)
	{

	}

	/**
	 * Submit the post
	 * @param Request $request
	 * @param $userId
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function submitPost(Request $request)
	{
		try
		{//$user = User::findOrFail(Auth::id());
			if ($request->input('submit') == "submit")
			{

				if ($this->submitPostValidator->validatePost($request))
				{
					$submitPost = new SubmittedPost();

					$submitPost->title = $request->title;

					$submitPost->body = $request->body;

					$submitPost->sourceTitle = $request->sourceTitle;

					$submitPost->sourceUrl = $request->sourceUrl;

					$submitPost->postType = $request->postType;

					$submitPost->stateId = "1";

					$submitPost->creatorId = Auth::id();

					$submitPost->createdDate = Carbon::now();

					$submitPost->submittedDate = Carbon::now();

					$submitPost->reviewerId = "0";

					$submitPost->categoryId = $request->category;

					$submitPost->imageUrl = $request->imageUrl;


					if ($request->hasFile('imageUrl'))
					{

						$file = $request->file("imageUrl");
						$name = time() . '-' . $file->getClientOriginalName();
						$file->move('uploads/postimages', $name);
						$submitPost->imageUrl = '/uploads/postimages/'.$name;
					}

					$submitPost->save();

					DraftedPost::destroy($request->postId);

					return redirect()->back()->with('flash_notification.message', 'Post Submitted Successfully')
						->with('flash_notification.level', 'success');
				}
			} elseif ($request->input('save') == "save")
			{
				if ($this->draftedPostValidator->validatePost($request))
				{
					$draftedPost = DraftedPost::find($request->postId);

					if (!$draftedPost)
						$draftedPost = new DraftedPost();

					$draftedPost->title = $request->title;

					$draftedPost->body = $request->body;

					$draftedPost->sourceTitle = $request->sourceTitle;

					$draftedPost->sourceUrl = $request->sourceUrl;

					$draftedPost->postType = $request->postType;

					$draftedPost->creatorId = Auth::id();

					$draftedPost->categoryId = $request->category;


					if ($request->hasFile('imageUrl'))
					{

						$file = $request->file("imageUrl");
						$name = time() . '-' . $file->getClientOriginalName();
						$file->move('uploads/postimages', $name);
						$draftedPost->imageUrl = '/uploads/postimages/'.$name;
						//dd( $model->avatarUrl);
					}
					$draftedPost->save();

					return redirect()->back()->with('flash_notification.message', 'Post Drafted Successfully')
						->with('flash_notification.level', 'success');
				}
			}elseif ($request->input('delete') == "delete"){

				DraftedPost::destroy($request->postId);
				return redirect()->back()->with('flash_notification.message', 'Post Deleted Successfully')
					->with('flash_notification.level', 'success');
			}
		} catch (ValidationException $e)
		{
			return redirect()->back()->with('flash_notification.message', 'Please correct below Validation Errors')
				->with('flash_notification.level', 'error')->withErrors($e->validator->getMessageBag());
		}
	}
}
