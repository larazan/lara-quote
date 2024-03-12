<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class AboutUs extends Component
{

    public $about;

    public function mount()
    {
        $data = BusinessSetting::where(['key' => 'about_us'])->first();
        $this->about = $data;
    }

    // public function updatedAbout()
    // {
    //     dd($this->about);
    // }

    public function updateAbout()
    {

        // dd($this->about);
        // BusinessSetting::where(['key' => 'about_us'])->update([
        //     'value' => $this->about,
        // ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'about_us'], [
            'value' => $this->about,
        ]);

        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'About us updated successfully']);
    }
    
    public function render()
    {
        return view('livewire.admin.about-us');
    }
}
