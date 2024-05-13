<?php

namespace App\Http\Livewire\Admin;

use App\Models\Advertising;
use App\Models\AdvertisingSegment;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\Component;

class AdvertisingIndex extends Component
{
    use WithFileUploads, WithPagination;

    public $showAdvertisingModal = false;
    public $showAdvertisingDetailModal = false;
    
    public $title;
    public $start;
    public $end;
    public $url;
    
    public $file;
    public $advertisingId;
    public $segmentId;
    public $oldImage;
    public $advertisingStatus = 'inactive';
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
        'segmentId' => 'required',
        'title' => 'required',
        'start' => 'required',
        'end' => 'required',
        'url' => 'required',
        // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
    ];

    public function mount()
    {
        $this->start = today()->format('Y-m-d');
        $this->end = today()->format('Y-m-d');
    }

    public function showCreateModal()
    {
        $this->showAdvertisingModal = true;
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
        Advertising::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Advertising deleted successfully']);
    }

    public function createAdvertising()
    {
        $this->validate();
  
        $new = Str::slug($this->title) . '_' . time();

        $advertising = new Advertising();
        $advertising->segment_id = $this->segmentId;
        $advertising->title = $this->title;
        $advertising->start = $this->start;
        $advertising->end = $this->end;
        $advertising->url = $this->url;
        $advertising->status = $this->advertisingStatus;

        if (!empty($this->file)) {
            $filename = $new . '.' . $this->file->getClientOriginalName();
            $filePath = $this->file->storeAs(Advertising::UPLOAD_DIR, $filename, 'public');
            $resizedImage = $this->_resizeImage($this->file, $filename, Advertising::UPLOAD_DIR);

            $advertising->original = $filePath;
            $advertising->small =$resizedImage['small'];
        }

        $advertising->save();

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Advertising created successfully']);
    }

    public function showEditModal($advertisingId)
    {
        $this->reset(['name']);
        $this->advertisingId = $advertisingId;
        $advertising = Advertising::find($advertisingId);
        $this->segmentId = $advertising->segment_id;
        $this->title = $advertising->title;
        $this->start = $advertising->start;
        $this->end = $advertising->end;
        $this->url = $advertising->url;
        $this->oldImage = $advertising->small;
        $this->advertisingStatus = $advertising->status;
        $this->showAdvertisingModal = true;
    }
    
    public function updateAdvertising()
    {
        $this->validate();
        $advertising = Advertising::findOrFail($this->advertisingId);
  
        $new = Str::slug($this->title) . '_' . time();
        
        if ($this->advertisingId) {
            if ($advertising) {

                // $advertising = Advertising::where('id', $this->advertisingId)->first();
                $advertising->segment_id = $this->segmentId;
                $advertising->title = $this->title;
                $advertising->start = $this->start;
                $advertising->end = $this->end;
                $advertising->url = $this->url;
                $advertising->status = $this->advertisingStatus;

                if (!empty($this->file)) {
                    // delete image
			        $this->deleteImage($this->advertisingId);

                    $filename = $new . '.' . $this->file->getClientOriginalName();
                    $filePath = $this->file->storeAs(Advertising::UPLOAD_DIR, $filename, 'public');
                    $resizedImage = $this->_resizeImage($this->file, $filename, Advertising::UPLOAD_DIR);

                    $advertising->original = $filePath;
                    $advertising->small =$resizedImage['small'];
                }

                $advertising->save();
            }
        }

        $this->reset();
        $this->showAdvertisingModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Advertising updated successfully']);
    }

    public function deleteAdvertising($advertisingId)
    {
        $advertising = Advertising::findOrFail($advertisingId);
        $advertising->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Advertising deleted successfully']);
    }

    public function closeAdvertisingModal()
    {
        $this->showAdvertisingModal = false;
        $this->reset(
            [
                'advertisingId',
                'segmentId',
                'title',
                'start',
                'end',
                'url',
                'advertisingStatus',
            ]
        );
    }

    public function resetFilters()
    {
        $this->reset(['search', 'sort', 'perPage']);
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

        // SMALL
		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Advertising::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		// $mediumImageFilePath = $folder . '/medium/' . $fileName;
		// $size = explode('x', Advertising::MEDIUM);
		// list($width, $height) = $size;

		// $mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
		// 	$resizedImage['medium'] = $mediumImageFilePath;
		// }

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Advertising::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Advertising::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $advertisingImage = Advertising::where(['id' => $id])->first();
		$path = 'storage/';

        if (Storage::exists($path.$advertisingImage->original)) {
            Storage::delete($path.$advertisingImage->original);
		}
		
        if (Storage::exists($path.$advertisingImage->small)) {
            Storage::delete($path.$advertisingImage->small);
        }   

		// if (Storage::exists($path.$advertisingImage->medium)) {
        //     Storage::delete($path.$advertisingImage->medium);
        // } 

        // if (Storage::exists($path.$advertisingImage->large)) {
        //     Storage::delete($path.$advertisingImage->large);
        // } 

        return true;
    }

    public function render()
    {
        return view('livewire.admin.advertising-index', [
            'advertisings' => Advertising::liveSearch('title', $this->search)->orderBy('title', $this->sort)->paginate($this->perPage),
            'segments' => AdvertisingSegment::orderBy('title', $this->sort)->get(),
        ]);
    }
}
