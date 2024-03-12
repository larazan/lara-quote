<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\BusinessSetting;

class TermCondition extends Component
{
    public $termsConditions;

    public function mount()
    {
        $data = BusinessSetting::where(['key' => 'terms_and_conditions'])->first();
        $this->termsConditions = $data;
    }

    // public function updatedTermsConditions()
    // {
    //     dd($this->termsConditions);
    // }

    public function updateTermsConditions()
    {

        dd($this->termsConditions);
        // BusinessSetting::where(['key' => 'terms_and_conditions'])->update([
        //     'value' => $this->termsConditions,
        // ]);

        DB::table('business_settings')->updateOrInsert(['key' => 'terms_and_conditions'], [
            'value' => $this->termsConditions,
        ]);

        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'terms and conditions updated successfully']);
    }
    
    public function render()
    {
        return view('livewire.admin.term-condition');
    }
}
