<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Article;
use App\Models\User;
use App\Models\CategoryArticle;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\WithFileUploads;
use Livewire\Component;

class Create extends Component
{
    use WithFileUploads;

    public $showMessage = false;
    public $title;
    public $body;
    public $status;
    public $articleId;
    public $articleTags;
    public $tags = [];
    public $categoryId;
    public $file;
    public $author;
    public $url;
    public $embedUrl;
    public $publishedAt;
    public $oldImage;
    public $categoryItem;
    public $metaTitle;
    public $metaKeyword;
    public $metaDesc;
    public $articleStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $sort = 'asc';

    protected $rules = [
        'title' => 'required|min:3',
        // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
    ];

    public function mount()
    {
        $this->publishedAt = today()->format('Y-m-d');
        $this->tags = isset($this->articleTags) ? explode(',', $this->articleTags) : [];
    }

    public function createArticle()
    {
        // dd($this->tags);
        // dd($this->body);
        $this->validate();
  
        $new = Str::slug($this->title) . '_' . time();

        $article = new Article();
        $article->category_id = $this->categoryId;
        $article->author_id = isset($this->author) ? $this->author : Auth::user()->id;
        $article->title = $this->title;
        $article->slug = Str::slug($this->title);
        $article->rand_id = Str::random(10);
        $article->body = $this->body;
        $article->article_tags = implode(',', $this->tags);
        $article->author_id = $this->author;
        $article->original_url = $this->url;
        // $article->embed_url = $this->embedUrl;
        $article->published_at = $this->publishedAt;
        $article->status = $this->articleStatus;
        $article->meta_title = $this->metaTitle;
        $article->meta_keyword = $this->metaKeyword;
        $article->meta_description = $this->metaDesc;

        if (!empty($this->file)) {
            $filename = $new . '.' . $this->file->getClientOriginalName();
            $filePath = $this->file->storeAs(Article::UPLOAD_DIR, $filename, 'public');
            $resizedImage = $this->_resizeImage($this->file, $filename, Article::UPLOAD_DIR);

            $article->original = $filePath;
            $article->small = $resizedImage['small'];
            $article->medium = $resizedImage['medium'];
        }

        $article->save();

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Article created successfully']);
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.blog.create', [
            'categories' => CategoryArticle::OrderBy('name', $this->sort)->get(),
            'authors' => User::OrderBy('id', $this->sort)->get()
        ]);
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

    public function categoryAdd()
    {   
        CategoryArticle::create([
          'name' => $this->categoryItem,
          'slug' => Str::slug($this->categoryItem),
        ]);

        $this->reset('categoryItem');
        // $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Category created successfully']);
    }
}
