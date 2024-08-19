<?php

namespace App\Http\Livewire\Admin;

use App\Models\Person;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image;

class PersonIndex extends Component
{
    use WithFileUploads, WithPagination;
    
    public $showPersonModal = false;
    public $name;
    public $bio;
    public $personId;
    public $authorId;
    public $file;
    public $oldImage;

    public $personStatus = 'inactive';
    public $statuses = [
        'active',
        'inactive'
    ];
    
    public $letter = 'a';
    public $letters = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z' 
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
        $this->showPersonModal = true;
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
        Person::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Person deleted successfully']);
    }

    public function createPerson()
    {
        $this->validate();
        
        // Person::create([
        //   'name' => $this->name,
        //   'slug' => Str::slug($this->name),
        //   'author_id' => Str::random(12),
        //   'bio' => $this->bio,
        // ]);

        $new = Str::slug($this->name) . '_' . time();

        $person = new Person();
        $person->name = $this->name;
        $person->slug = Str::slug($this->name);
        $person->author_id = Str::random(12);
        $person->bio = $this->bio;

        if (!empty($this->file)) {
            $filename = $new . '.' . $this->file->getClientOriginalName();
            $filePath = $this->file->storeAs(Person::UPLOAD_DIR, $filename, 'public');
            // $resizedImage = $this->_resizeImage($this->file, $filename, Person::UPLOAD_DIR);

            $person->image = $filePath;
        }

        $person->save();

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Person created successfully']);
    }

    public function showEditModal($personId)
    {
        $this->reset(['name']);
        $this->personId = $personId;
        $person = Person::find($personId);
        $this->name = $person->name;
        $this->bio = $person->bio;
        $this->oldImage = $person->image;
        $this->authorId = $person->author_id;
        $this->showPersonModal = true;
    }
    
    public function updatePerson()
    {
        $this->validate();

        $person = Person::findOrFail($this->personId);
        // $person->update([
        //     'name' => $this->name,
        //     'slug'     => Str::slug($this->name),
        //     'author_id' => Str::random(12),
        //     'bio' => $this->bio,
        // ]);

        $new = Str::slug($this->name) . '_' . time();

        if ($this->personId) {
            if ($person) {
                $person->name = $this->name;
                $person->slug = Str::slug($this->name);
                $person->author_id = Str::random(12);
                $person->bio = $this->bio;

                if (!empty($this->file)) {
                    // delete image
                    $this->deleteImage($this->personId);

                    $filename = $new . '.' . $this->file->getClientOriginalName();
                    $filePath = $this->file->storeAs(Person::UPLOAD_DIR, $filename, 'public');
                    // $resizedImage = $this->_resizeImage($this->file, $filename, Person::UPLOAD_DIR);

                    $person->image = $filePath;
                }

                $person->save();
            }
        }

        $this->reset();
        $this->showPersonModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Person updated successfully']);
    }

    public function deletePerson($personId)
    {
        $person = Person::findOrFail($personId);
        $person->delete();
        
        // delete image
        $this->deleteImage($personId);

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Person deleted successfully']);
    }

    public function closePersonModal()
    {
        $this->showPersonModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset(['personId']);
    }
    
    public function render()
    {
        $key = explode(' ', $this->search);
        $persons = Person::where(function ($q) use ($key) {
            foreach ($key as $value) {
                $q->orWhere('name', 'like', "%{$value}%");
            }
        })->orderBy('name', $this->sort)->paginate($this->perPage);

        return view('livewire.admin.person-index', [
            'persons' => $persons,
            // 'persons' => Person::search('name', $this->search)->orderBy('name', $this->sort)->paginate($this->perPage)
        ]);
    }

    public function routeToDetail($personId)
    {
        return redirect('/admin/persons/'.$personId);
    }

    private function _resizeImage($image, $fileName, $folder)
	{
		$resizedImage = [];

        // SMALL
		$smallImageFilePath = $folder . '/small/' . $fileName;
		$size = explode('x', Person::SMALL);
		list($width, $height) = $size;

		$smallImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $smallImageFilePath, $smallImageFile)) {
			$resizedImage['small'] = $smallImageFilePath;
		}
		
        // MEDIUM
		$mediumImageFilePath = $folder . '/medium/' . $fileName;
		$size = explode('x', Person::MEDIUM);
		list($width, $height) = $size;

		$mediumImageFile = Image::make($image)->fit($width, $height)->stream();
		if (Storage::put('public/' . $mediumImageFilePath, $mediumImageFile)) {
			$resizedImage['medium'] = $mediumImageFilePath;
		}

        // LARGE
		// $largeImageFilePath = $folder . '/large/' . $fileName;
		// $size = explode('x', Person::LARGE);
		// list($width, $height) = $size;

		// $largeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $largeImageFilePath, $largeImageFile)) {
		// 	$resizedImage['large'] = $largeImageFilePath;
		// }

        // EXTRA_LARGE
		// $extraLargeImageFilePath  = $folder . '/xlarge/' . $fileName;
		// $size = explode('x', Person::EXTRA_LARGE);
		// list($width, $height) = $size;

		// $extraLargeImageFile = Image::make($image)->fit($width, $height)->stream();
		// if (Storage::put('public/' . $extraLargeImageFilePath, $extraLargeImageFile)) {
		// 	$resizedImage['extra_large'] = $extraLargeImageFilePath;
		// }

		return $resizedImage;
	}

    public function deleteImage($id = null) {
        $personImage = Person::where(['id' => $id])->first();
		$path = 'storage/';

        if (Storage::exists($path.$personImage->original)) {
            Storage::delete($path.$personImage->original);
		}
		
        // if (Storage::exists($path.$personImage->small)) {
        //     Storage::delete($path.$personImage->small);
        // }   

		// if (Storage::exists($path.$personImage->medium)) {
        //     Storage::delete($path.$personImage->medium);
        // }

             
        return true;
    }
}
