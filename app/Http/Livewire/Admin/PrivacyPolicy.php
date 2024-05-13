<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class PrivacyPolicy extends Component
{
    public $body;
    public $trixId;

    public function mount()
    {
        $data = BusinessSetting::where(['key' => 'privacy_policy'])->first();
        if ($data) {
            $this->body = $data->value;
        } else {
            $this->body = $data;
        }
    }

    public function updatePrivacyPolicy()
    {

        // dd($this->body);
        // BusinessSetting::where(['key' => 'privacy_policy'])->update([
        //     'value' => $this->privacyPolicy,
        // ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'privacy_policy'], [
            'value' => $this->body,
        ]);

        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Privacy Policy updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.privacy-policy');
    }
}
