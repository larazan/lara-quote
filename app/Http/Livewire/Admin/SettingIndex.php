<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\WithFileUploads;
use Livewire\Component;

class SettingIndex extends Component
{
    use WithFileUploads;

    public $showSettingModal = false;

    public $title;
    public $body;
    public $metaDescription; 
    public $metaKeyword;
    public $shortDes;
    public $description;
    public $file;
    public $oldImage;
    public $address;
    public $phone;
    public $email; 
    public $twitter; 
    public $facebook; 
    public $instagram; 
    public $icon;
    public $settingId = 1;
    public $sizeTol = Setting::MEDIUM;

    protected $rules = [
        'title' => 'required|min:3',
        // 'file' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
    ];

    public function mount()
    {
        $setting = Setting::find($this->settingId);

        if ($setting) {
            $this->title = $setting->title;
            $this->metaDescription = $setting->meta_description;
            $this->metaKeyword = $setting->meta_keyword;
            $this->shortDes = $setting->short_des;
            $this->description = $setting->description;
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->address = $setting->address;
            $this->twitter = $setting->twitter;
            $this->facebook = $setting->facebook;
            $this->instagram = $setting->instagram;
            $this->icon = $setting->icon;
        }
        
    }

    public function showEditModal()
    {
        $this->reset(['title']);
        $setting = Setting::find($this->settingId);
      
        if ($setting) {
            $this->oldImage = $setting->small;
        }
       
        
        $this->showSettingModal = true;
    }

    public function closeSettingModal()
    {
        $this->showSettingModal = false;
    }

    public function updatePhoto()
    {
        $setting = Setting::findOrFail($this->settingId);
        $this->validate();
  
        $new = 'logo_' . time();
        $filename = $new . '.' . $this->file->getClientOriginalName();
        
        if ($this->settingId) {
            if ($setting) {
               // delete image
			    $this->deleteImage($this->settingId);
                $filePath = $this->file->storeAs(Setting::UPLOAD_DIR, $filename, 'public');
                $resizedImage = $this->_resizeImage($this->file, $filename, Setting::UPLOAD_DIR);

                $setting->update([
                    'original' => $filePath,
                    'medium' => $resizedImage['medium'],
                    'small' => $resizedImage['small'],
                ]);
                
            }
        }

        $this->reset();
        $this->showSettingModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Logo updated successfully']);
    }

    public function updateSetting()
    {
        $this->validate();

        $new = 'icon_' . time();
        $filename = $new . '.' . $this->file->getClientOriginalName();
        $filePath = $this->file->storeAs(Setting::UPLOAD_DIR_ICON, $filename, 'public');

        Setting::create([
            'title' => $this->title,
            'meta_description' => $this->metaDescription,
            'meta_keyword' => $this->metaKeyword,
            'short_des' => $this->shortDes,
            'description' => $this->description,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'icon' => $filePath,
        ]);

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Setting updated successfully']);
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.setting-index');
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

        // SMALL
		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Setting::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		$mediumImageFilePath = $folder . '/medium/' . $fileName;
		$size = explode('x', Setting::MEDIUM);
		list($width, $height) = $size;

		$mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
			$resizedImage['medium'] = $mediumImageFilePath;
		}

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Setting::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Setting::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $articleImage = Setting::where(['id' => $id])->first();
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
