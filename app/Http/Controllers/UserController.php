<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use carbon\carbon;
use DB;
use App\Http\Repository\UserRepository;

class UserController extends Controller
{
	public $userRepo;

	public function __construct(UserRepository $userRepo)
	{
		$this->userRepo = $userRepo;
	}
	
	public function importData(Request $request)
	{
		$path = storage_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'challenge.json';
		$json = json_decode(file_get_contents($path), true);

		foreach ($json['users'] as $key => $value) {
			
			$userQuery = $this->userRepo->createOrUpdateUser(['user_code'=>$value['id']], [
				'user_code' => $value['id'],
				'name'	    => $value['name'],
				'age' 		=> $value['age']
			]);

			$user_id = $userQuery->id;

			if (!empty($value['companies'])) 
			{
				foreach ($value['companies'] as $k => $v) {
					$compQuery = $this->userRepo->createOrUpdateCompany(['comp_code' => $v['id']], [
						'comp_code' => $v['id'], 
						'name' => $v['name'], 
						'started_at' => Carbon::parse($v['started_at'] )->format('Y-m-d')
					]);

					$comp_id = $compQuery->id;

					$result = $this->userRepo->createCompUsers(['user_id'=>$user_id, 'comp_id'=>$comp_id], ['user_id'=>$user_id, 'comp_id'=>$comp_id]);
				}
			}
		}
	}

	public function getData(Request $request, $minAge='', $maxAge='')
	{
		$response = $this->userRepo->getData($minAge, $maxAge);
		$resultArr = array();
		$compCodeArr = array_unique(array_column($response, 'comp_code'));
		$compCode = '';
		
		foreach ($compCodeArr as $key => $value) {
			$resultArr[$key]['id'] = $value;
			$resultArr[$key]['users'] = array_filter($response,function($arr) use($value){
				if ($value == $arr['comp_code']) {
					return $arr['user_code'];
				}
			});
		}

		$finalArr = array();

		foreach ($resultArr as $key => $value) {
			$finalArr[$key]['id'] = $value['id'];	
			$temp = array_values($value['users']);
			$finalArr[$key]['name'] = $temp[0]['comp_name'];	
			$finalArr[$key]['started_at'] = $temp[0]['started_at'];
			$finalArr[$key]['age'] = Carbon::parse($temp[0]['started_at'])->diff(Carbon::now())->format('%y years');
			$finalArr[$key]['users'] = array_map(function($arr){
				return ['id'=>$arr['user_code'], 'name'=>$arr['user_name'], 'age'=>$arr['age']];
			}, $value['users']);
		}
		
		echo "<pre>";
		echo (json_encode(array('companies'=>$finalArr)));
		echo "</pre>";
	}

	public function createUser()
	{
		
	}

	public function createCompany()
	{
		var_dump($request);
	}
}
?>