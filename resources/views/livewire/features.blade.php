<x-admin.list-container title='Features'>
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
                    <th scope="col" class="px-4 py-3 w-80">
                        Title
                    </th>
                    <th scope="col" class="w-full px-4 py-3">
                        Description
                    </th>
                    <th scope="col" class="w-12 px-4 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody wire:sortable="updateFeatureOrder">
                @foreach ($data as $key => $feature)
                    <tr draggable="true" wire:sortable.item="{{ $feature->id }}" wire:key="feature-{{ $feature->id }}"
                        class="w-9/12 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td wire:sortable.handle class="px-6 py-4 w-9 cursor-move">
                            {{ $key + 1 }}
                        </td>
                        <td wire:sortable.handle class="w-1/12 py-4 text-gray-900 cursor-move dark:text-white">
                            @if (@$feature->icon)
                                <img src="{{ $feature->iconPath }}" class="object-cover w-12 h-12 rounded-full">
                            @endif
                        </td>
                        <td wire:sortable.handle class="px-6 py-4 font-bold w-2/12 cursor-move">
                            <p class="line-clamp-2">
                                {{ $feature->feature_title }}
                            </p>
                        </td>
                        <td wire:sortable.handle class="w-full px-6 py-4 font-bold cursor-move">
                            {{ $feature->feature_description }}
                        </td>
                        <td class="w-12 px-6 py-4 text-center">
                            <!-- Modal toggle -->
                            <button type="button" onclick="openModal({{ $feature->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Edit feature modal -->
    <x-admin.modal id="editFeature" event="updateFeature" title="Edit" onClose="closeModal()">
        <x-admin.input-popup type="text" name="feature_title" title="Title" placeholder="Enter Title"
            value="{{ @$feature->feature_title }}" model="feature.feature_title" required />

        <x-admin.input-popup type="text" name="feature_description" title="Description"
            placeholder="Enter Description" value="{{ @$feature->feature_description }}"
            model="feature.feature_description" required />

    </x-admin.modal>

    @push('scripts')
        <script>
            window.addEventListener('alert', event => {
                if (event.detail.type === 'success') {
                    modal.hide()
                }
            })

            var $form = $("#form-editFeature")
            $form.validate({
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

            var $targetEl = document.getElementById('editFeature');
            var modal = new Modal($targetEl, options);

            function openModal(id) {
                livewire.emit('onSelectedItem', id ?? null)
                modal.show()
            }

            function closeModal() {
                modal.hide();
            }
        </script>
    @endpush
</x-admin.list-container>
