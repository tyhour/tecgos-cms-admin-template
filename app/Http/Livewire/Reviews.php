<?php

namespace App\Http\Livewire;

use App\Models\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Reviews extends Component
{
    public $data = [];
    public $review;
    public $image;
    public $errorImage = '';

    protected $listeners = [
        'fileUpload' => 'handleFileUpload',
        'onSelectedItem' => 'handleSelectedItem'
    ];

    protected $rules = [
        'review.customer_name' => 'required',
        'review.rating_value' => 'required',
        'review.comment' => 'required',
        'review.active' => 'nullable',
    ];

    protected $messages;

    public function __construct()
    {
        $this->messages =  [
            'review.customer_name.required' => "The customer name is required",
            'review.rating_value.required' => "The rating value is required",
            'review.comment.required' => "The comment is required"
        ];
    }

    public function render()
    {
        return view('livewire.reviews');
    }

    public function mount()
    {
        $this->data = Review::orderBy('sort_order')->get();
        $this->image = null;
        $this->errorImage = '';
    }

    public function handleFileUpload($image, $error)
    {
        if ($error) {
            $this->image = '';
            $this->errorImage = $error;
        } else {
            $this->errorImage = '';
            $this->image = $image;
        }
    }

    public function handleSelectedItem($id)
    {
        if ($id) {
            $this->review = Review::where('id', $id)->first();
            $this->image = $this->review['imagePath'];
        } else {
            $this->review = null;
            $this->image = null;
        }
    }

    public function updateReviewOrder($list)
    {
        DB::beginTransaction();
        try {
            foreach ($list as $item) {
                $review = Review::find($item['value']);
                $review->sort_order = $item['order'];
                $review->save();
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

    public function updateReview()
    {
        if (!@$this->review->id)
            $this->review['image'] = $this->image;

        $this->validate();

        DB::beginTransaction();
        try {
            $oldImage = null;
            if ($this->image !== @$this->review['imagePath']) {
                $oldImage = $this->review['image'];
                $this->review['image'] = storeImage('images/reviews/', $this->image);
            }

            if (@$this->review->id) {
                $review = Review::find($this->review->id);
                $review = $this->review;
                $review->save();
            } else {
                Review::create($this->review);
            }

            DB::commit();

            //Remove old image
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $this->mount();

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success', 'message' => @$this->review->id ? 'Updated Successfully!' : 'Created Successfully']
            );
        } catch (\Exception $error) {
            DB::rollback();
            if (@$this->review['image']) {
                Storage::disk('public')->delete(@$this->review['image']);
            }
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' => @$this->review->id ? 'Updated Incompleted!' : 'Created Incompleted!']
            );
        }
    }

    public function deleteReview()
    {

        if (@$this->review->id) {
            $review = Review::find($this->review->id);
            $review->delete();

            //Remove old image
            if (@$this->review['image']) {
                Storage::disk('public')->delete($this->review['image']);
            }

            $this->mount();

            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success', 'message' => 'Deleted Successfully']
            );

            $this->review = null;
        } else
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'error', 'message' => 'Deleted Incompleted!']
            );
    }
}
