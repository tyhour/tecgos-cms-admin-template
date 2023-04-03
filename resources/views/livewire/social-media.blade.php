<x-admin.list-container title='Social Media'>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 w-6">
                        No
                    </th>
                    <th scope="col" class="w-12 px-4 py-3 text-center">
                        Icon
                    </th>
                    <th scope="col" class="w-full px-4 py-3">
                        Title
                    </th>
                    <th scope="col" class="w-12 px-4 py-3">
                        Link
                    </th>
                    <th scope="col" class="w-12 px-4 py-3">
                        Profile ID
                    </th>
                    <th scope="col" class="w-10 px-4 py-3 text-center">
                        Active
                    </th>
                    <th scope="col" class="w-12 px-4 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody wire:sortable="updateSocialMediaOrder">
                @foreach ($data as $key => $social)
                    <tr draggable="true" wire:sortable.item="{{ $social->id }}" wire:key="social-{{ $social->id }}"
                        class="w-9/12 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td wire:sortable.handle class="px-4 py-4 cursor-move w-6">
                            {{ $key + 1 }}
                        </td>
                        <td wire:sortable.handle class="w-12 px-4 py-4 text-gray-900 cursor-move dark:text-white">
                            @if (@$social->icon_name)
                                <x-frontend.icon name='{{ $social->icon_name }}' class="w-12 h-12" />
                            @endif
                        </td>
                        <td wire:sortable.handle class="w-full font-bold cursor-move">
                            <p class="line-clamp-2 ">
                                {{ $social->title }}
                            </p>
                        </td>
                        <td wire:sortable.handle class="w-12 px-4 py-4 font-bold cursor-move">
                            <p class="line-clamp-2">
                                {{ $social->link }}
                            </p>
                        </td>
                        <td wire:sortable.handle class="w-12 px-4 py-4 font-bold cursor-move">
                            {{ $social->profile_id }}
                        </td>
                        <td class="w-12 px-10 py-4 text-center">
                            <input disabled type="checkbox" @if ($social->active) checked @endif
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label class="sr-only">checkbox</label>
                        </td>
                        <td class="w-10 px-4 py-4 text-center">
                            <!-- Modal toggle -->
                            <button type="button" onclick="openModal({{ $social->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Edit social modal -->
    <x-admin.modal id="editSocial" event="updateSocialMedia" title="Edit" onClose="closeModal()">
        <x-admin.input-popup type="text" name="title" title="Title" placeholder="Enter Title"
            value="{{ @$socialMedia->title }}" readonly model="socialMedia.title" required />

        <x-admin.input-popup type="text" name="link" title="Link" placeholder="Enter Link"
            value="{{ @$socialMedia->link }}" readonly model="socialMedia.link" required />

        <x-admin.input-popup class="col-span-12 sm:col-span-6" type="text" name="profile_id" title="Profile ID"
            placeholder="Enter Profile ID" value="{{ @$socialMedia->profile_id }}" model="socialMedia.profile_id"
            required />

        <x-admin.checkbox name="active" title="Active" value="{{ @$socialMedia->active }}"
            model="socialMedia.active" />
    </x-admin.modal>

    @push('scripts')
        <script>
            window.addEventListener('alert', event => {
                if (event.detail.type === 'success') {
                    modal.hide()
                }
            })

            var $form = $("#form-editSocial")
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

            var $targetEl = document.getElementById('editSocial');
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
