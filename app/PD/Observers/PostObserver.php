<?php namespace PD\Observers;


use App\PublishedPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PD\PushNotifications\PushNotification;

class PostObserver {

	/**
	 * @var PushNotification
	 */
	private $pushNotification;

	public function __construct(PushNotification $pushNotification){


		$this->pushNotification = $pushNotification;
	}
	/**
	 * Listen to the User created event.
	 *
	 * @param PublishedPost $publishedPost
	 * @internal param User $user
	 */
	public function saved(PublishedPost $publishedPost)
	{
		$publishedPosts = DB::connection('pickdmysql')->table('posts')->insert([
				'postTitle'     => $publishedPost->title, 'shortDescription' => $publishedPost->body,
				'sourceName'    => $publishedPost->sourceTitle, 'sourceUrl' => $publishedPost->sourceUrl,
				'imageUrl'      => $publishedPost->imageUrl, 'categoryId' => $publishedPost->categoryId,
				'curatorId'     => $publishedPost->creatorId, 'createdDate' => $publishedPost->createdDate,
				'publishedDate' => $publishedPost->publishedDate, 'isVideoPost' =>"0",
				'needsPushNotification' => $publishedPost->needsPushNotification,'created_at' =>Carbon::now(),
				'updated_at' =>Carbon::now()

			]
		);
		Log::info("Post was successfully inserted in pickd DB");
		if($publishedPost->needsPushNotification)
		{
			$registrationIds = DB::connection('pickdmysql')->table('androiddevices')->
			select(DB::raw('pushRegId'))->where('notificationEnabled', '<>', 0)
				->get();
			foreach ($registrationIds as $registrationId)
			{
				$this->pushNotification->send_notification($registrationId, $publishedPost);
				Log::info("PostNotification was successfully sent for " . $registrationId->pushRegId);
			}
		}

	}


}