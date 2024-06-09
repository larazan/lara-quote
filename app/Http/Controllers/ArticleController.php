<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
	{
		// parent::__construct();

		// $limit = 5;
        // $this->data['articles'] = Article::active()->orderBy('id', 'DESC')->limit($limit)->get();
	}

    public function index()
	{
		$articles = Article::where('status','active')->orderBy('created_at', 'DESC');

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = '';
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($articles);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		$this->data['articles'] = $articles->paginate(8);
		return $this->loadTheme('blogs.index', $this->data);
    }
    
    public function show($slug)
	{
		$article = Article::active()->where('slug', $slug)->first();

		if (!$article) {
			return redirect('articles');
		}

		$this->data['article'] = $article;

		$limit = 5;
        $this->data['articles'] = Article::active()->where('slug', '!=', $slug)->orderBy('id', 'DESC')->limit($limit)->get();

		// build breadcrumb data array
		$breadcrumbs_data['current_page_title'] = $article->title;
		$breadcrumbs_data['breadcrumbs_array'] = $this->_generate_breadcrumbs_array($article->id);
		$this->data['breadcrumbs_data'] = $breadcrumbs_data;

		return $this->loadTheme('blogs.detail', $this->data);
    }
    
    public function _generate_breadcrumbs_array($id) {
		// $homepage_url = url('/');
		// $breadcrumbs_array[$homepage_url] = 'Home';
		
		// get sub cat title
		$sub_cat_title = 'Articles';
		// get sub cat url
		$sub_cat_url = url('articles');
	
		$breadcrumbs_array[$sub_cat_url] = $sub_cat_title;
		return $breadcrumbs_array;
	}
}
