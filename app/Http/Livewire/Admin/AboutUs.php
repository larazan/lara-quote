<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class AboutUs extends Component
{
    public $body;
    public $trixId;

    public function mount()
    {
        $data = BusinessSetting::where(['key' => 'about_us'])->first();
        if ($data) {
            $this->body = $data->value;
        } else {
            $this->body = $data;
        }
    }

    public function updateAbout()
    {
        // dd($this->body);
        // BusinessSetting::where(['key' => 'about_us'])->update([
        //     'value' => $this->about,
        // ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'about_us'], [
            'value' => $this->body,
        ]);

        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'About us updated successfully']);
    }
    
    public function render()
    {
        return view('livewire.admin.about-us');
    }
}
