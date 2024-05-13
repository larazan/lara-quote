<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class TermCondition extends Component
{
    public $body;
    public $trixId;

    public function mount()
    {
        $data = BusinessSetting::where(['key' => 'terms_and_conditions'])->first();
        if ($data) {
            $this->body = $data->value;
        } else {
            $this->body = $data;
        }
    }

    // public function updatedTermsConditions()
    // {
    //     dd($this->termsConditions);
    // }

    public function updateTermsConditions()
    {

        // dd($this->body);
        // BusinessSetting::where(['key' => 'terms_and_conditions'])->update([
        //     'value' => $this->termsConditions,
        // ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'terms_and_conditions'], [
            'value' => $this->body,
        ]);

        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'terms and conditions updated successfully']);
    }
    
    public function render()
    {
        return view('livewire.admin.term-condition');
    }
}
