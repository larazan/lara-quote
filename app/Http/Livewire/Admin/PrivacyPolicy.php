<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class PrivacyPolicy extends Component
{
    public $privacyPolicy;

    public function mount()
    {
        $data = BusinessSetting::where(['key' => 'privacy_policy'])->first();
        $this->privacyPolicy = $data;
    }

    // public function updatedPrivacyPolicy()
    // {
    //     dd($this->privacyPolicy);
    // }

    public function updatePrivacyPolicy()
    {

        dd($this->privacyPolicy);
        // BusinessSetting::where(['key' => 'privacy_policy'])->update([
        //     'value' => $this->privacyPolicy,
        // ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'privacy_policy'], [
            'value' => $this->privacyPolicy,
        ]);

        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Privacy Policy updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.privacy-policy');
    }
}
