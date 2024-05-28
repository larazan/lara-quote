<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class TagIndex extends Component
{
    use WithPagination;
    
    public $showTagModal = false;
    public $name;
    public $tagId;
    public $parentId;

    public $catStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected $rules = [
        'name' => 'required|max:255',
    ];

    public function showCreateModal()
    {
        $this->reset();
        $this->showTagModal = true;
    }

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
        Tag::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Tag deleted successfully']);
    }

    public function createTag()
    {
        $this->validate();
        
        Tag::create([
          'name' => $this->name,
          'slug' => Str::slug($this->name),
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Tag created successfully']);
    }

    public function showEditModal($tagId)
    {
        $this->reset(['name']);
        $this->tagId = $tagId;
        $tag = Tag::find($tagId);
        $this->name = $tag->name;
        $this->showTagModal = true;
    }
    
    public function updateTag()
    {
        $this->validate();

        $tag = Tag::findOrFail($this->tagId);
        $tag->update([
            'name' => $this->name,
            'slug'     => Str::slug($this->name),
        ]);
        $this->reset();
        $this->showTagModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Tag updated successfully']);
    }

    public function deleteTag($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $tag->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Tag deleted successfully']);
    }

    public function closeTagModal()
    {
        $this->showTagModal = false;
    }

    public function resetFilters()
    {
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.admin.tag-index', [
            'tags' => Tag::liveSearch('name', $this->search)->orderBy('name', $this->sort)->paginate($this->perPage)
        ]);
    }
}
