<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostsController extends Controller
{
	public function __construct(Posts $_posts)
	{
		$this->posts = $_posts;
	}

	public function index(Request $request)
	{
		return view("index");
	}

	public function getData(Request $request)
	{
		return $this->posts->getData($request);
	}

	public function editPosts($id)
	{
		$data = $this->posts->getEditData($id);
		return view("addPost", compact('id', 'data'));
	}

	public function savePosts(Request $request)
	{
		var_dump($request);
	}
}
?>