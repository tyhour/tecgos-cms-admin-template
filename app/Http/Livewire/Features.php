<?php

namespace App\Http\Livewire;

use App\Models\Feature;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Features extends Component
{

    public $data = [];
    public $feature;

    protected $listeners = [
        'onSelectedItem' => 'handleSelectedItem'
    ];

    protected $rules = [
        'feature.feature_title' => 'required',
        'feature.feature_description' => 'required'
    ];

    protected $messages;

    public function __construct()
    {
        $this->messages =  [
            'feature.feature_title.required' => "The title is required",
            'feature.feature_description.required' => "The description is required"
        ];
    }

    public function render()
    {
        return view('livewire.features');
    }

    public function mount()
    {
        $this->data = Feature::orderBy('sort_order')->get();
    }

    public function handleSelectedItem($id)
    {
        if ($id) {
            $this->feature = Feature::where('id', $id)->first();
        } else {
            $this->feature = null;
        }
    }

    public function updateFeatureOrder($list)
    {
        DB::beginTransaction();
        try {
            foreach ($list as $item) {
                $feature = Feature::find($item['value']);
                $feature->sort_order = $item['order'];
                $feature->save();
                DB::commit();

                $this->mount();
            }
        } catch (\Exception $error) {
            DB::rollback();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' => 'Updated Incompleted!']
            );
        }
    }


    public function updateFeature()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $feature = Feature::find($this->feature->id);
            $feature = $this->feature;
            $feature->save();

            DB::commit();

            $this->mount();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success', 'message' => 'Updated Successfully!']
            );
        } catch (\Exception $error) {
            DB::rollback();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' => 'Updated Incompleted!']
            );
        }
    }
}
