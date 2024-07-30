<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    public function closeConfirmModal()
    {
        $this->showConfirmModal = false;
    }

    public function deleteId($id)
    {
        $this->showConfirmModal = true;
        $this->deleteId = $id;
    }

    public function delete()
    {
        Article::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Article deleted successfully']);
    }

    public function deleteArticle($articleId)
    {
        $article = Article::findOrFail($articleId);
        $article->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Article deleted successfully']);
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.blog.index', [
            'articles' => Article::liveSearch('title', $this->search)->orderBy('id', $this->sort)->paginate($this->perPage),
        ]);
    }

    public function gotoEdit($articleId)
    {
        return redirect('/admin/blog/'.$articleId.'/update');
    }
}
