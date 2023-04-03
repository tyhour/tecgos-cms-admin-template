<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChooseUs extends Component
{
    public $data = [];
    public $chooseUs;
    public $contents = [];

    protected $listeners = [
        'onSelectedItem' => 'handleSelectedItem',
        'onSelectedContent' => 'handleSelectedContent',
    ];

    protected $rules = [
        'chooseUs.title' => 'required',
        'chooseUs.content_id' => 'required',
        'chooseUs.active' => 'nullable',
    ];

    protected $messages;

    public function __construct()
    {
        $this->messages =  [
            'chooseUs.title.required' => "The title is required",
            'chooseUs.content_id.required' => "The content is required"
        ];
    }

    public function render()
    {

        return view('livewire.why-choose-us');
    }

    public function mount()
    {
        $this->data = WhyChooseUs::orderBy('sort_order')->get();
        $this->contents = Content::where('is_why_choose_us', 1)->get();
    }


    public function handleSelectedItem($id)
    {
        if ($id) {
            $this->chooseUs = WhyChooseUs::where('id', $id)->first();
        } else {
            $this->chooseUs = null;
        }
    }

    public function handleSelectedContent($id)
    {
        $this->chooseUs["content_id"] = $id;
    }

    public function updateChooseUsOrder($list)
    {
        DB::beginTransaction();
        try {
            foreach ($list as $item) {
                $chooseUs = WhyChooseUs::find($item['value']);
                $chooseUs->sort_order = $item['order'];
                $chooseUs->save();
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

    public function updateChooseUs()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            if (@$this->chooseUs->id) {
                $chooseUs = WhyChooseUs::find($this->chooseUs->id);
                $chooseUs = $this->chooseUs;
                $chooseUs->save();
            } else {
                WhyChooseUs::create($this->chooseUs);
            }

            DB::commit();

            $this->mount();

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success', 'message' => @$this->chooseUs->id ? 'Updated Successfully!' : 'Created Successfully']
            );
        } catch (\Exception $error) {
            DB::rollback();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' =>  @$this->chooseUs->id ? 'Updated Incompleted!' : 'Created Incompleted!']
            );
        }
    }

    public function deleteChooseUs()
    {

        if (@$this->chooseUs->id) {
            $chooseUs = WhyChooseUs::find($this->chooseUs->id);
            $chooseUs->delete();

            $this->mount();

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success', 'message' => 'Deleted Successfully']
            );

            $this->chooseUs = null;
        } else
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' => 'Deleted Incompleted!']
            );
    }
}
