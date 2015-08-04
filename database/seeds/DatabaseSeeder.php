<?php

use FreeTier\CategoryLabel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use FreeTier\User;
use FreeTier\Service;
use FreeTier\ServiceMeta;
use FreeTier\Category;

class DatabaseSeeder extends Seeder {

	protected $logoSeedPath;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->logoSeedPath = realpath(__DIR__.DIRECTORY_SEPARATOR.'logos');

		// cleanup previously uploaded logos
		exec('rm -rf '.realpath(__DIR__.'/../../public/logos'));

		Model::unguard();

		User::create([
			'email' 	=> 'benkuhl@gmail.com',
			'password' 	=> \Hash::make('changeme')
		]);

		$this->seedChat();
		$this->seedCloudStorage();
		$this->seedLogging();
	}

	private function seedLogging()
	{
		$logging = Category::create([
			'name' => 'Logging',
			'slug' => 'logging'
		]);
		$retention = CategoryLabel::create([
			'category_id'	=> $logging->id,
			'name' 			=> 'Log Retention'
		]);

		$logentries = Service::create([
			'category_id'	=> $logging->id,
			'name' 			=> 'LogEntries',
			'logo'			=> $this->getLogoPath('logentries'),
			'landing_url'	=> 'http://www.logentries-landing.com'
		]);
		ServiceMeta::create([
			'service_id'	=> $logentries->id,
			'label_id'		=> $retention->id,
			'value'			=> '7 days'
		]);
		$logging->update([
			'service_count' => $logging->service_count + 1
		]);
	}

	private function seedChat()
	{
		$chat = Category::create([
			'name' => 'Chat',
			'slug' => 'chat'
		]);
		$maxUsers = CategoryLabel::create([
			'category_id'	=> $chat->id,
			'name' 			=> 'Max # Of Users'
		]);

		$slack = Service::create([
			'category_id'	=> $chat->id,
			'name' 			=> 'Slack',
			'logo'			=> $this->getLogoPath('slack'),
			'landing_url'	=> 'http://www.slack-landing.com'
		]);
		ServiceMeta::create([
			'service_id'	=> $slack->id,
			'label_id'		=> $maxUsers->id,
			'value'			=> 30
		]);
		$chat->update([
			'service_count' => $chat->service_count + 1
		]);

		$hipChat = Service::create([
			'category_id'	=> $chat->id,
			'name' 			=> 'HipChat',
			'logo'			=> $this->getLogoPath('hipchat'),
			'landing_url'	=> 'http://www.hipchat-landing.com'
		]);
		ServiceMeta::create([
			'service_id'	=> $hipChat->id,
			'label_id'		=> $maxUsers->id,
			'value'			=> 30
		]);
		$chat->update([
			'service_count' => $chat->service_count + 1
		]);
	}

	private function seedCloudStorage()
	{
		$cloudStorage = Category::create([
			'name' => 'Cloud Storage',
			'slug' => 'cloud-storage'
		]);
		$diskStorage = CategoryLabel::create([
			'category_id'	=> $cloudStorage->id,
			'name' 			=> 'Disk Space'
		]);

		$dropbox = Service::create([
			'category_id'	=> $cloudStorage->id,
			'name' 			=> 'Dropbox',
			'logo'			=> $this->getLogoPath('dropbox'),
			'landing_url'	=> 'http://www.dropbox-landing.com'
		]);
		ServiceMeta::create([
			'service_id'	=> $dropbox->id,
			'label_id'		=> $diskStorage->id,
			'value'			=> '45GB'
		]);
		$cloudStorage->update([
			'service_count' => $cloudStorage->service_count + 1
		]);

		$gDrive = Service::create([
			'category_id'	=> $cloudStorage->id,
			'name' 			=> 'Google Drive',
			'logo'			=> $this->getLogoPath('drive'),
			'landing_url'	=> 'http://drive.google-landing.com'
		]);
		ServiceMeta::create([
			'service_id'	=> $gDrive->id,
			'label_id'		=> $diskStorage->id,
			'value'			=> '100GB'
		]);
		$cloudStorage->update([
			'service_count' => $cloudStorage->service_count + 1
		]);
	}

	private function getLogoPath($logo)
	{
		$original = $this->logoSeedPath.DIRECTORY_SEPARATOR.$logo.'.png';
		$tmp = $this->logoSeedPath.DIRECTORY_SEPARATOR.$logo.'_'.time().'.png';
		copy($original, $tmp);
		return $tmp;
	}

}
