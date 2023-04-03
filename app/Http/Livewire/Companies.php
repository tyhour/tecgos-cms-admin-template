<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Companies extends Component
{
    public Company $company;
    public $qrImage;
    public $errorQrImage = '';

    protected $listeners = [
        'fileUpload' => 'handleFileUpload'
    ];

    protected $rules = [
        'company.company_name' => 'required',
        'company.email' => 'required|email',
        'company.hotline' => 'required',
        'company.phone_number' => 'required',
        'company.wechat_id' => 'required',
        'company.wechat' => 'required',
        'company.about_us' => 'required',
        'company.address' => 'required',
        'company.latitude' => 'required',
        'company.longitude' => 'required',
        'company.contact_us' => 'required',
        'company.question_title' => 'required',
        'company.question_description' => 'required',
        'company.service_description' => 'required',
        'company.why_choose_us' => 'required'
    ];

    public function mount()
    {
        $this->company = Company::where('id', 1)->first();
        $this->qrImage = $this->company['wechatPath'];
    }

    public function render()
    {
        return view('livewire.companies');
    }

    public function handleFileUpload($image, $error)
    {
        if ($error) {
            $this->qrImage = '';
            $this->errorQrImage = $error;
        } else {
            $this->errorQrImage = '';
            $this->qrImage = $image;
        }
    }

    public function updateCompany()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $oldImage = null;
            if ($this->qrImage !== $this->company['wechatPath']) {
                $oldImage = $this->company['wechat'];
                $this->company['wechat'] = storeImage('images/social/', $this->qrImage);
            }
            $company = Company::where('id', 1)->first();
            $company = $this->company;
            $company->save();
            DB::commit();

            //Remove old image
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

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
            if (@$this->company['wechat']) {
                Storage::disk('public')->delete(@$this->company['wechat']);
            }
        }
    }
}
