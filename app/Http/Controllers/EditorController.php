<?php

namespace App\Http\Controllers;

use App\Category;
use App\ContentState;
use App\DraftedPost;
use App\PublishedPost;
use App\SubmittedPost;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use PD\Validations\SubmitPostValidator;

class EditorController extends Controller {

	/**
	 * @var SubmitPostValidator
	 */
	private $submitPostValidator;

	public function __construct(SubmitPostValidator $submitPostValidator)
	{
		$this->middleware(['auth', 'role:editor']);
		$this->submitPostValidator = $submitPostValidator;
	}

	/**
	 *Returns thr home view for editor
	 */

	public function home()
	{
		//Place in view composer
		$user = User::findOrFail(Auth::id());

		$posts = SubmittedPost::where('stateId','!=','3')->orderBy('submittedDate', 'desc')->paginate(6);

		foreach ($posts as $post)
		{
			$stateName = $this->getStateName($post->stateId);
			array_add($post, "stateName", $stateName);
			$createdBy = $this->getUserName($post->creatorId);
			array_add($post, "createdBy", $createdBy);
			$reviewedBy = $this->getUserName($post->reviewerId);
			array_add($post, "reviewedBy", $reviewedBy);
		}

		return view('editor.home')->with('user', $user)->with('posts', $posts)->with('title','Submitted Post')
			->with('formState','enabled');
	}

	public function updatePost(Request $request)
	{
		try
		{
			if ($this->submitPostValidator->validatePost($request))
			{
				$submitPost = SubmittedPost::find($request->postId);

				$submitPost->title = $request->title;

				$submitPost->body = $request->body;

				$submitPost->sourceTitle = $request->sourceTitle;

				$submitPost->sourceUrl = $request->sourceUrl;

				$submitPost->postType = $request->postType;

				$submitPost->stateId = $request->state;

				$submitPost->creatorId = $request->creatorId;

				$submitPost->reviewerId = $request->reviewer;

				$submitPost->categoryId = $request->category;

				if ($request->hasFile('imageUrl'))
				{

					$file = $request->file("imageUrl");
					$name = time() . '-' . $file->getClientOriginalName();
					$file->move('uploads/postimages', $name);
					$submitPost->imageUrl = '/uploads/postimages/'.$name;
				}

				$submitPost->update();

				return redirect()->back()->with('flash_notification.message', 'Post Updated Successfully')
					->with('flash_notification.level', 'success');
			}
		} catch (ValidationException $e)
		{
			return redirect()->back()->with('flash_notification.message', 'Error Occured')
				->with('flash_notification.level', 'error');
		}
	}

	private function getStateName($stateId)
	{
		switch ($stateId)
		{
			case 1:
				return "Pending";
				break;
			case 2:
				return "InReview";
				break;
			case 3:
				return "ReviewPassed";
				break;
			case 4:
				return "ReviewFailed";
				break;
			case 5:
				return "Discarded";
				break;
			case 6:
				return "Reassigned";
				break;
			default:
				return "Pending";
		}
	}


	private function getUserName($userId)
	{
		if ($userId != 0)
		{
			$user = User::findOrFail($userId);

			return $user->userName;
		}

		return " ";

	}

	/**
	 * Assign the post to user
	 * @param Request $request
	 * @param $userId
	 */

	public function assignPost(Request $request)
	{

		$postId = $request->get('postId');

		$assignTo = $request->get('assignTo');


		$posts = SubmittedPost::findOrFail($postId)
			->update(['reviewerId' => $assignTo]);

		return view('editor.home')->with('message', 'Post assigned successfully');
	}

	/**
	 * Get To Be Publish Post
	 */

	public function getToBePublishedPost()
	{
		$user = User::findOrFail(Auth::id());

		$posts = SubmittedPost::where('stateId',3)->orderBy('submittedDate', 'desc')->paginate(6);

		foreach ($posts as $post)
		{
			$stateName = $this->getStateName($post->stateId);
			array_add($post, "stateName", $stateName);
			$createdBy = $this->getUserName($post->creatorId);
			array_add($post, "createdBy", $createdBy);
			$reviewedBy = $this->getUserName($post->reviewerId);
			array_add($post, "reviewedBy", $reviewedBy);
		}

		return view('editor.home')->with('user', $user)->with('posts', $posts)->with('title','To Be Published Post')
			->with('formState','disabled')->with("toBePublishPost", true);
	}


	public function getAllPublishedPosts()
	{
		$user = User::findOrFail(Auth::id());

		$posts = PublishedPost::orderBy('publishedDate', 'desc')->paginate(6);

		foreach ($posts as $post)
		{
			$createdBy = $this->getUserName($post->creatorId);
			array_add($post, "createdBy", $createdBy);
			$reviewedBy = $this->getUserName($post->reviewerId);
			array_add($post, "reviewedBy", $reviewedBy);
		}

		return view('editor.home')->with("publishPost", true)->with('user', $user)->with('posts', $posts);
	}

	/**
	 * Get all the discarded post
	 */

	public function getAllDraftedPosts()
	{
		$user = User::findOrFail(Auth::id());

		$posts = DraftedPost::orderBy('created_at', 'desc')->paginate(6);

		foreach ($posts as $post)
		{
			$createdBy = $this->getUserName($post->creatorId);
			array_add($post, "createdBy", $createdBy);
		}

		return view('editor.home')->with("draftPost", true)->with('user', $user)->with('posts', $posts)
			->with('formState','enabled')->with('title','Drafted Post');
	}

	/**
	 * Get Create Post Form
	 */
	public function getCreatePostForm()
	{
		//Place in View composer
		$user = User::findOrFail(Auth::id());

		$categories = Category::all();

		return view('editor.home')->with("createPost", true)->with('user', $user)->with('categories', $categories);

	}

	public function publishPost(Request $request){

		$publishedPost = new PublishedPost();

		$publishedPost->title = $request->title;

		$publishedPost->body = $request->body;

		$publishedPost->sourceTitle = $request->sourceTitle;

		$publishedPost->sourceUrl = $request->sourceUrl;

		$publishedPost->postType = $request->postType;

		$publishedPost->creatorId = $request->creatorId;

		$publishedPost->reviewerId = $request->reviewer;

		$publishedPost->categoryId = $request->category;

		$publishedPost->submittedDate = $request->submittedDate;

		$publishedPost->publishedDate = Carbon::now();

		$publishedPost->createdDate = Carbon::now();

		$publishedPost->imageUrl = asset($request->imageUrl);

		$publishedPost->needsPushNotification = $request->needsPushNotification;

		$publishedPost->save();

		SubmittedPost::destroy($request->postId);

		return redirect()->back()->with('flash_notification.message', 'Post Published Successfully')
			->with('flash_notification.level', 'success');

	}

	public function getAllReassignedPosts(){

		$user = User::findOrFail(Auth::id());

		$posts = SubmittedPost::where('stateId',6)->where('creatorId',$user->id)->orderBy('submittedDate', 'desc')->paginate(6);

		foreach ($posts as $post)
		{
			$stateName = $this->getStateName($post->stateId);
			array_add($post, "stateName", $stateName);
			$createdBy = $this->getUserName($post->creatorId);
			array_add($post, "createdBy", $createdBy);
			$reviewedBy = $this->getUserName($post->reviewerId);
			array_add($post, "reviewedBy", $reviewedBy);
		}

		return view('editor.home')->with('user', $user)->with('posts', $posts)->with('title','Reassigned Post')->with('formState','enabled');
	}
}
