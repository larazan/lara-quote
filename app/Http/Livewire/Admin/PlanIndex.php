<?php

namespace App\Http\Livewire\Admin;

use App\Models\Plan;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\Component;

class PlanIndex extends Component
{
    use WithPagination;

    public $showPlanModal = false;
    public $planId;
    public $name;
    public $stripeName;
    public $stripeId;
    public $price;
    public $abbreviation;
    public $features;
    public $tags = [];
    public $type = 'inactive';
    public $types = [
        'free',
        'paid'
    ];

    public $search = '';
    public $sort = 'asc';
    public $perPage = 10;

    public $showConfirmModal = false;
    public $deleteId = '';

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function showCreateModal()
    {
        $this->showPlanModal = true;
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
        Plan::find($this->deleteId)->delete();
        $this->showConfirmModal = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Plan deleted successfully']);
    }

    public function createPlan()
    {
        // dd($this->tags);
        // dd($this->body);
        $this->validate();
  
        $plan = new Plan();
        $plan->name = $this->name;
        $plan->slug = Str::slug($this->title);
        $plan->stripe_name = $this->stripeName;
        $plan->stripe_id = $this->stripeId;
        $plan->price = $this->price;
        $plan->abbreviation = $this->abbreviation;
        $plan->features = implode(',', $this->tags);
        $plan->type = $this->type;

        $plan->save();

        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Plan created successfully']);
    }

    public function showEditModal($planId)
    {
        $this->reset(['title']);
        $this->planId = $planId;
        $plan = Plan::find($planId);
        $this->name = $plan->name;
        $this->stripeName = $plan->stripe_name;
        $this->stripeId = $plan->stripe_id;
        $this->price = $plan->price;
        $this->abbreviation = $plan->abbreviation;
        $this->features = $plan->features;
        $this->tags = isset($this->features) ? explode(',', $this->features) : [];
        $this->type = $plan->type;

        $this->showPlanModal = true;
    }
    
    public function updatePlan()
    {
        $this->validate();

        $plan = Plan::findOrFail($this->planId);
  
        $new = Str::slug($this->title) . '_' . time();
        
        if ($this->planId) {
            if ($plan) {

                $plan->name = $this->name;
                $plan->slug = Str::slug($this->title);
                $plan->stripe_name = $this->stripeName;
                $plan->stripe_id = $this->stripeId;
                $plan->price = $this->price;
                $plan->abbreviation = $this->abbreviation;
                $plan->features = implode(',', $this->tags);
                $plan->type = $this->type;

                $plan->save();
            }
        }

        $this->reset();
        $this->showPlanModal = false;
        $this->dispatchBrowserEvent('banner-message', ['style' => 'success', 'message' => 'Plan updated successfully']);
    }

    public function deletePlan($planId)
    {
        $plan = Plan::findOrFail($planId);
        $plan->delete();
        $this->reset();
        $this->dispatchBrowserEvent('banner-message', ['style' => 'danger', 'message' => 'Plan deleted successfully']);
    }

    public function closePlanModal()
    {
        $this->showPlanModal = false;
        $this->reset();
    }

    public function resetFilters()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.plan-index', [
            'plans' => Plan::orderBy('id', $this->sort)->paginate($this->perPage)
        ]);
    }
}
