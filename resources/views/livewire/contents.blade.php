<x-admin.list-container title='Contents'>
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
                    <th scope="col" class="px-4 py-3 w-80">
                        Title
                    </th>
                    <th scope="col" class="flex-1 px-4 py-3">
                        Description
                    </th>
                    <th scope="col" class="w-12 px-4 py-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $content)
                    <tr
                        class="w-9 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 w-9">
                            {{ $key + 1 }}
                        </td>
                        <td class="px-6 py-4 font-bold w-44">
                            <p class="line-clamp-2">
                                {{ $content->title }}
                            </p>
                        </td>
                        <td class="px-6 py-4 font-bold w-80">
                            <p class="line-clamp-2">
                                {{ $content->content_title }}
                            </p>
                        </td>
                        <td class="flex-1 px-6 py-4 font-bold">
                            {{ $content->content_description }}
                        </td>
                        <td class="w-12 px-6 py-4 text-center">
                            <!-- Modal toggle -->
                            <button type="button" onclick="openModal({{ $content->id }})"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Edit content modal -->
    <x-admin.modal id="editContent" event="updateContent" title="Edit" onClose="closeModal()">
        <x-admin.input-popup type="text" name="title" title="Content" placeholder="Enter Content"
            value="{{ @$menu->title }}" readonly model="menu.title" required />

        <x-admin.input-popup type="text" name="content_title" title="Title" placeholder="Enter Title"
            value="{{ @$menu->content_title }}" model="menu.content_title" required />

        <x-admin.input-popup class="col-span-12 sm:col-span-6" type="text" name="content_description"
            title="Description" placeholder="Enter Description" value="{{ @$menu->content_description }}"
            model="menu.content_description" required />

    </x-admin.modal>

    @push('scripts')
        <script>
            window.addEventListener('alert', event => {
                if (event.detail.type === 'success') {
                    modal.hide()
                }
            })

            var $form = $("#form-editContent")
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

            var $targetEl = document.getElementById('editContent');
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
