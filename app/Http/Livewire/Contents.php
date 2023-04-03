<?php

namespace App\Http\Livewire;

use App\Models\Content;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Contents extends Component
{

    public $data = [];
    public $menu;

    protected $listeners = [
        'onSelectedItem' => 'handleSelectedItem'
    ];

    protected $rules = [
        'menu.title' => 'required',
        'menu.content_title' => 'required',
        'menu.content_description' => 'required'
    ];

    protected $messages;

    public function __construct()
    {
        $this->messages =  [
            'menu.title' => 'The content is required',
            'menu.content_title.required' => "The title is required",
            'menu.content_description.required' => "The description is required"
        ];
    }

    public function render()
    {
        return view('livewire.contents');
    }

    public function mount()
    {
        $this->data = Content::get();
    }

    public function handleSelectedItem($id)
    {
        if ($id) {
            $this->menu = Content::where('id', $id)->first();
        } else {
            $this->menu = null;
        }
    }

    public function updateContent()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $menu = Content::find($this->menu->id);
            $menu = $this->menu;
            $menu->save();

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
