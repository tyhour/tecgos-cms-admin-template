<?php

namespace App\Http\Livewire;

use App\Models\SocialMedia;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SocialMedias extends Component
{
    public $data = [];
    public $socialMedia;

    protected $listeners = [
        'onSelectedItem' => 'handleSelectedItem'
    ];

    protected $rules = [
        'socialMedia.title' => 'required',
        'socialMedia.link' => 'required',
        'socialMedia.profile_id' => 'required',
        'socialMedia.active' => 'required',
    ];

    public function render()
    {
        return view('livewire.social-media');
    }

    public function mount()
    {
        $this->data = SocialMedia::orderBy('sort_order')->get();
    }

    public function updateSocialMediaOrder($list)
    {
        DB::beginTransaction();
        try {
            foreach ($list as $item) {
                $social = SocialMedia::find($item['value']);
                $social->sort_order = $item['order'];
                $social->save();
                DB::commit();

                $this->mount();

                $this->socialMedia = null;
            }
        } catch (\Exception $error) {
            DB::rollback();
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' => 'Updated Incompleted!']
            );
        }
    }

    public function handleSelectedItem($id)
    {
        if ($id) {
            $this->socialMedia = SocialMedia::where('id', $id)->first();
        } else {
            $this->socialMedia = null;
        }
    }

    public function updateSocialMedia()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $social = SocialMedia::find($this->socialMedia->id);
            $social = $this->socialMedia;
            $social->save();

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
