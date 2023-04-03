<div class="bg-white">
    <div x-data="{
        image: {
            width: null,
            height: null
        },
        fileChoosen(event) {
            this.fileToDataUrl(event)
        },

        fileToDataUrl(event) {
            if (!event.target.files.length) return

            let file = event.target.files[0],
                reader = new FileReader()
            reader.readAsDataURL(file)

            reader.onload = e => {
                let img = new Image();
                img.onload = () => {
                    this.image.width = img.width;
                    this.image.height = img.height;
                    if (this.image.width !== 853 || this.image.height !== 853) {
                        livewire.emit('fileUpload', '', 'Size should be 853x853px')
                    } else {
                        livewire.emit('fileUpload', e.target.result, '')
                    }
                }
                img.src = e.target.result;
            }
        },
    }">
        <x-admin.form formId="companyProfile" title='Company Profile' event='updateCompany' submit="Update">
            <x-admin.input type="text" name="company_name" title="Company Name" placeholder="Enter Company Name"
                value="{{ $company->company_name }}" model="company.company_name" required />

            <x-admin.input type="email" name="email" title="Email" placeholder="Enter Email"
                value="{{ $company->email }}" model="company.email" required />

            <x-admin.input type="tel" name="hotline" title="Hotline" placeholder="Enter Hotline"
                value="{{ $company->hotline }}" model="company.hotline" required />
            <x-admin.input type="tel" name="phone_number" title="Phone Number" placeholder="Enter Phone Number"
                value="{{ $company->phone_number }}" model="company.phone_number" required />

            <div>
                <div class="mb-4">
                    <x-admin.input type="text" name="wechat_id" title="Wechat
                ID"
                        placeholder="Enter Wechat
                ID" value="{{ $company->wechat_id }}"
                        model="company.wechat_id" required />
                </div>
                <x-admin.image-upload name="wechat" title="Wechat QR (853px x 853px)" event="fileChoosen"
                    error="{{ $errorQrImage }}" image="{{ $qrImage }}" width="190" height="190" required />
            </div>
            <x-admin.textarea name="about_us" title="About Us" rows="{{ $qrImage ? 14 : 5 }}"
                height="{{ $qrImage ? 'min-h-[330px]' : 'min-h-[132px]' }}" placeholder="Write About Us..."
                value="{{ $company->about_us }}" model="company.about_us" required />

            <x-admin.textarea name="address" title="Address" rows="5" placeholder="Enter Address..."
                value="{{ $company->address }}" model="company.address" required />

            <div>
                <div class="mb-4">
                    <x-admin.input type="text" name="latitude" title="Latitude" placeholder="Enter Latitude"
                        value="{{ $company->latitude }}" model="company.latitude" required />
                </div>
                <x-admin.input type="text" name="longitude" title="Longitude" placeholder="Enter Longitude"
                    value="{{ $company->longitude }}" model="company.longitude" required />
            </div>
            <x-admin.textarea name="contact_us" title="Contact Us" rows="5" placeholder="Enter Contact Us..."
                value="{{ $company->contact_us }}" model="company.contact_us" required />
            <div>
                <div class="mb-4">
                    <x-admin.input type="text" name="question_title" title="Question Title"
                        placeholder="Enter Question Title" value="{{ $company->question_title }}"
                        model="company.question_title" required />
                </div>
                <x-admin.input type="text" name="question_description" title="Question Description"
                    placeholder="Enter Question Description" value="{{ $company->question_description }}"
                    model="company.question_description" required />

            </div>
            <x-admin.textarea name="service_description" title="Service Description" rows="5"
                placeholder="Enter Service Description..." value="{{ $company->service_description }}"
                model="company.service_description" required />
            <x-admin.textarea name="why_choose_us" title="Why Choose Us" rows="5"
                placeholder="Enter Why Choose Us..." value="{{ $company->why_choose_us }}"
                model="company.why_choose_us" required />

        </x-admin.form>
    </div>
</div>
@push('scripts')
    <script>
        var $form = $("#companyProfile")
        $form.validate({
            rules: {},
            errorPlacement: function(error, element) {
                return true;
            }
        });
    </script>
@endpush
