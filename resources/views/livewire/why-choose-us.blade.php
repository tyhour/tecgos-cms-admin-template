<div x-data="{
    isEdit: false,
    modalValue: {
        id: null,
        title: null
    }
}">
    <x-admin.list-container title='Why Choose Us'
        add_new="isEdit = false;
        modalValue= {
            id: null,
            title: null
        };
        openModal();">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4 w-9">
                            No
                        </th>
                        <th scope="col" class="px-4 py-3 w-44">
                            Content
                        </th>
                        <th scope="col" class="w-full px-4 py-3">
                            Title
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Active
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody wire:sortable="updateChooseUsOrder">
                    @foreach ($data as $key => $chooseUs)
                        <tr draggable="true" wire:sortable.item="{{ $chooseUs->id }}"
                            wire:key="chooseUs-{{ $chooseUs->id }}"
                            class="w-9/12 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td wire:sortable.handle class="px-6 py-4 cursor-move w-9">
                                {{ $key + 1 }}
                            </td>
                            <td wire:sortable.handle class="px-6 py-4 font-bold cursor-move w-44">
                                {{ $chooseUs->content->title }}
                            </td>
                            <td wire:sortable.handle class="w-full px-6 py-4 font-bold cursor-move">
                                <p class="line-clamp-2">
                                    {{ $chooseUs->title }}
                                </p>
                            </td>
                            <td class="w-12 px-10 py-4 text-center">
                                <input disabled type="checkbox" @if ($chooseUs->active) checked @endif
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="sr-only">checkbox</label>
                            </td>
                            <td class="w-12 px-6 py-4 text-center">
                                <div class="flex gap-4">
                                    <!-- Modal toggle -->
                                    <button type="button"
                                        @click="
                                    isEdit=true;
                                    modalValue={
                                        id:{{ $chooseUs->content_id }},
                                        title:'{{ $chooseUs->content->title }}'
                                    };
                                    openModal({{ $chooseUs->id }});"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                    <button type="button" onclick="openModalDelete({{ $chooseUs->id }})"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Edit Choose Us modal -->
        <x-admin.modal id="editChooseUs" event="updateChooseUs" x-title="isEdit ? 'Edit' : 'Create'"
            onClose="closeModal()">
            <div class="col-span-6 sm:col-span-4">
                <x-admin.input-popup type="text" name="title" title="Title" placeholder="Enter Title"
                    value="{{ @$chooseUs->title }}" model="chooseUs.title" required />
            </div>

            <x-admin.dropdown class="col-span-6 sm:col-span-2" title="Content" placeholder="Select Content"
                :list="$contents" model="chooseUs.content_id" required event="onSelectedContent"
                icon="w-5 h-5 mt-[1.5px]" />

            <x-admin.checkbox name="active" title="Active" value="{{ @$chooseUs->active }}" model="chooseUs.active" />
        </x-admin.modal>

        <!-- Delete Modal -->
        <x-admin.confirm-modal id="deleteChooseUs" event="deleteChooseUs" description="Do you want to delete this item?"
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

        var $form = $("#form-editChooseUs")
        $form.validate({
            rules: {},
            errorPlacement: function(error, element) {
                return true;
            }
        });

        var $formDelete = $("#form-deleteChooseUs")
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

        var $targetEl = document.getElementById('editChooseUs');
        var modal = new Modal($targetEl, options);

        function openModal(id) {
            livewire.emit('onSelectedItem', id ?? null)
            modal.show()
        }

        function closeModal() {
            modal.hide()
        }


        var $targetElDelete = document.getElementById('deleteChooseUs');
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
