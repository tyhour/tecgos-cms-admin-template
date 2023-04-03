<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Messages extends Component
{
    public $data = [];
    public $message;

    protected $listeners = [
        'onSelectedItem' => 'handleSelectedItem',
        'onRefresh' => 'mount'
    ];

    public function render()
    {
        return view('livewire.messages');
    }

    public function mount()
    {
        $this->data = Message::orderBy('sent_date', 'desc')->get();
    }


    public function handleSelectedItem($id)
    {
        if ($id) {
            Message::where('id', $id)->update(['is_seen' => 1]);
            $this->message = Message::where('id', $id)->first();
        } else {
            $this->message = null;
        }
    }
}
