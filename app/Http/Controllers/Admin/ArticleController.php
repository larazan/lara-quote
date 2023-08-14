<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->data['statuses'] = Article::statuses();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        // $categories = Category::pluck('name', 'id');

        $this->data['categories'] = $categories;
        $this->data['article'] = null;
        $this->data['categoryIDs'] = null;

        return view('admin.articles.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $params = $request->except('_token');
        // var_dump($params); exit();
        $params['category_id'] =  $params['categoryId'];
        $params['slug'] =  Str::slug($params['title']);
        $params['body'] = $params['editor1'];
        $params['user_id'] = $request->user()->id;
        $params['rand_id'] = Str::random(10);
        $params['author'] = $params['author'];
        $params['url'] = $params['url'];
        $params['meta_title'] = $params['meta_title'];
        $params['meta_description'] = $params['meta_description'];
        $params['embed_url'] = $params['embedUrl'];
        $params['article_tags'] = $params['articleTags'];
        $params['status'] = $params['articleStatus'];
        
        if ($params['published_at'] == '') {
            $params['published_at'] = now();
        }

        $image = $request->file('featured_image');

        if ($image) {
       
            $name = Str::slug($params['title']) . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = Article::UPLOAD_DIR;
            $filePath = $image->storeAs($folder, $fileName, 'public');
            $resizedImage = $this->_resizeImage($image, $fileName, $folder);

            $params['original'] = $filePath;
            $params['medium'] = $resizedImage['medium'];
            $params['small'] = $resizedImage['small'];

            unset($params['image']);
        } else {
            $params['original'] = '';
            $params['medium'] = '';
            $params['small'] = '';
        }

        $article = Article::create($params);
        if ($article) {
			Session::flash('success', 'Article has been created');
		} else {
			Session::flash('error', 'Article could not be created');
		}

        return redirect('admin/articles');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::orderBy('name', 'asc')->get();

        $this->data['article'] = $article;
        $this->data['categories'] = $categories;
        $this->data['categoryIDs'] = $article->categoryArticles->pluck('id')->toArray();
        $this->data['articleImage'] = $article->images;

        return view('admin.articles.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        $params = $request->except('_token');
        $params['category_id'] =  $params['categoryId'];
        $params['slug'] =  Str::slug($params['title']);
        $params['body'] = $params['editor1'];
        $params['user_id'] = $request->user()->id;
        $params['rand_id'] = Str::random(10);
        $params['author'] = $params['author'];
        $params['url'] = $params['url'];
        $params['meta_title'] = $params['meta_title'];
        $params['meta_description'] = $params['meta_description'];
        $params['embed_url'] = $params['embedUrl'];
        $params['article_tags'] = $params['articleTags'];
        $params['status'] = $params['articleStatus'];
        
        if ($params['published_at'] == '') {
            $params['published_at'] = now();
        }

        $image = $request->file('featured_image');

        if ($image) {
       
            $name = Str::slug($params['title']) . '_' . time();
            $fileName = $name . '.' . $image->getClientOriginalExtension();

            $folder = Article::UPLOAD_DIR;
            $filePath = $image->storeAs($folder, $fileName, 'public');
            $resizedImage = $this->_resizeImage($image, $fileName, $folder);

            $params['original'] = $filePath;
            $params['medium'] = $resizedImage['medium'];
            $params['small'] = $resizedImage['small'];

            unset($params['image']);
        } else {
            $params['original'] = '';
            $params['medium'] = '';
            $params['small'] = '';
        }
 
        if ($article->update($params)) {
            Session::flash('success', 'Article has been updated.');
        }
       
        return redirect('admin/articles');
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

        // SMALL
		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Article::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		$mediumImageFilePath = $folder . '/medium/' . $fileName;
		$size = explode('x', Article::MEDIUM);
		list($width, $height) = $size;

		$mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
			$resizedImage['medium'] = $mediumImageFilePath;
		}

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Article::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Article::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $articleImage = Article::where(['id' => $id])->first();
		$path = 'storage/';

        if (Storage::exists($path.$articleImage->original)) {
            Storage::delete($path.$articleImage->original);
		}
		
        if (Storage::exists($path.$articleImage->small)) {
            Storage::delete($path.$articleImage->small);
        }   

		if (Storage::exists($path.$articleImage->medium)) {
            Storage::delete($path.$articleImage->medium);
        }

             
        return true;
    }
}
