<div x-data="{
    isEdit: false,
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
                if (this.image.width !== 512 || this.image.height !== 512) {
                    livewire.emit('fileUpload', '', 'Size should be 512x512px')
                } else {
                    livewire.emit('fileUpload', e.target.result, '')
                }
            }
            img.src = e.target.result;
        }
    },
}">
    <x-admin.list-container title='Customer Reviews' add_new="isEdit = false;openModal()">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4 w-9">
                            No
                        </th>
                        <th scope="col" class="w-1/12 px-2 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-4 py-3 w-44">
                            Name
                        </th>
                        <th scope="col" class="w-full px-4 py-3">
                            Comment
                        </th>

                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Rating
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Active
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody wire:sortable="updateReviewOrder">
                    @foreach ($data as $key => $review)
                        <tr draggable="true" wire:sortable.item="{{ $review->id }}"
                            wire:key="review-{{ $review->id }}"
                            class="w-9/12 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td wire:sortable.handle class="px-6 py-4 cursor-move w-9">
                                {{ $key + 1 }}
                            </td>
                            <td wire:sortable.handle class="w-1/12 py-4 text-gray-900 cursor-move dark:text-white">
                                @if (@$review->image)
                                    <img src="{{ $review->imagePath }}" class="object-cover w-12 h-12 rounded-full">
                                @endif
                            </td>
                            <td wire:sortable.handle class="px-6 py-4 font-bold cursor-move w-44">
                                {{ $review->customer_name }}
                            </td>
                            <td wire:sortable.handle class="w-full px-6 py-4 font-bold cursor-move">
                                <p class="line-clamp-2">
                                    {{ $review->comment }}
                                </p>
                            </td>
                            <td wire:sortable.handle class="w-12 px-6 py-4 font-bold text-center cursor-move">
                                <div class="flex">
                                    @php $rating = round($review->rating_value * 2) / 2; @endphp
                                    @foreach (range(1, 5) as $i)
                                        @if ($rating > 0.5)
                                            <x-frontend.icon name='fas-star' class="w-4 h-4" />
                                        @elseif ($rating <= 0)
                                            <x-frontend.icon name='far-star' class="w-4 h-4" />
                                        @else
                                            <x-frontend.icon name='fas-star-half-alt' class="w-4 h-4" />
                                        @endif
                                        @php
                                            $rating--;
                                        @endphp
                                    @endforeach
                                </div>
                            </td>
                            <td class="w-12 px-10 py-4 text-center">
                                <input disabled type="checkbox" @if ($review->active) checked @endif
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="sr-only">checkbox</label>
                            </td>
                            <td class="w-12 px-6 py-4 text-center">
                                <div class="flex gap-4">
                                    <!-- Modal toggle -->
                                    <button type="button" @click="isEdit=true;openModal({{ $review->id }});"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                    <button type="button" onclick="openModalDelete({{ $review->id }})"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Edit review modal -->
        <x-admin.modal id="editReview" event="updateReview" x-title="isEdit ? 'Edit' : 'Create'" onClose="closeModal()">
            <div class="col-span-6 sm:col-span-3">
                <div class="mb-4">
                    <x-admin.input-popup type="text" name="customer_name" title="Name" placeholder="Enter Name"
                        value="{{ @$review->customer_name }}" model="review.customer_name" required />
                </div>
                <x-admin.input-popup type="text" name="rating" title="Rating Value" placeholder="Enter Name"
                    value="{{ @$review->rating_value }}" model="review.rating_value" required />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-admin.image-upload name="image" title="Image (512px x 512px)" event="fileChoosen"
                    error="{{ $errorImage }}" image="{{ $image }}" width="80" height="80" required />
            </div>
            <x-admin.input-popup class="col-span-12 sm:col-span-6" type="text" name="comment" title="Comment"
                placeholder="Enter Comment" value="{{ @$review->comment }}" model="review.comment" required />

            <x-admin.checkbox name="active" title="Active" value="{{ @$review->active }}" model="review.active" />
        </x-admin.modal>

        <!-- Delete Modal -->
        <x-admin.confirm-modal id="deleteReview" event="deleteReview" description="Do you want to delete this item?"
            onClose="closeModalDelete()" />
</div>
@push('scripts')
    <script>
        window.addEventListener('alert', event => {
            if (event.detail.type === 'success') {
                modal.hide()
                modalDelete.hide()
            }
        })

        var $form = $("#form-editReview")
        $form.validate({
            rules: {},
            errorPlacement: function(error, element) {
                return true;
            }
        });

        var $formDelete = $("#form-deleteReview")
        $formDelete.validate({
            rules: {},
            errorPlacement: function(error, element) {
                return true;
            }
        });

        // options with default values
        var options = {
            placement: 'bottom-right',
            backdrop: 'static',
            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            closable: true
        };

        var $targetEl = document.getElementById('editReview');
        var modal = new Modal($targetEl, options);

        function openModal(id) {
            livewire.emit('onSelectedItem', id ?? null)
            modal.show()
        }

        function closeModal() {
            modal.hide()
        }


        var $targetElDelete = document.getElementById('deleteReview');
        var modalDelete = new Modal($targetElDelete, options);

        function openModalDelete(id) {
            livewire.emit('onSelectedItem', id ?? null)
            modalDelete.show()
        }

        function closeModalDelete() {
            modalDelete.hide()
        }
    </script>
@endpush
</x-admin.list-container>
