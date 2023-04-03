<div>
    <x-admin.list-container title='Messages'>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4 w-6">
                            No
                        </th>
                        <th scope="col" class="w-full px-4 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3 !min-w-[250px]">
                            Subject
                        </th>
                        <th scope="col" class="px-4 py-3 text-center !min-w-[150px]">
                            Sent Date
                        </th>
                        <th scope="col" class="px-4 py-3 !min-w-[150px]">
                            Email
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Seen
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr
                            class="w-9/12 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-4 w-6">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-4 py-4 font-bold w-full">
                                {{ $item->full_name }}
                            </td>
                            <td class="px-4 py-4 font-bold !min-w-[250px]">
                                {{ $item->subject }}
                            </td>
                            <td class="w-full px-4 py-4 text-center font-bold !min-w-[150px]">
                                {{ date('d-m-Y', strtotime($item->sent_date)) }}
                            </td>
                            <td class="px-4 py-4 font-bold !min-w-[150px]">
                                {{ $item->email }}
                            </td>
                            <td class="w-12 px-10 py-4 text-center">
                                <input disabled type="checkbox" @if ($item->is_seen) checked @endif
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="sr-only">checkbox</label>
                            </td>
                            <td class="w-12 px-4 py-3 text-center">
                                <!-- Modal toggle -->
                                <button type="button" @click="openModal({{ $item->id }});"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- view message modal -->
        <x-admin.modal id="viewMessage" x-title="'View Message'"
            onClose="{{ @$message->is_seen ? 'closeModal();' : 'location.reload();closeModal();' }}" hideSave="true">
            <x-admin.input-popup type="text" name="full_name" title="Name" value="{{ @$message->full_name }}"
                readonly />

            <x-admin.input-popup type="text" name="email" title="Email" value="{{ @$message->email }}" readonly />

            <x-admin.input-popup type="text" name="sent_date" title="Sent Date"
                value="{{ date('d-m-Y', strtotime(@$message->sent_date)) }}" readonly />

            <x-admin.input-popup type="text" name="subject" title="Subject" value="{{ @$message->subject }}"
                readonly />

            <div class="col-span-12 sm:col-span-6">
                <x-admin.textarea name="message" title="Message" rows="12" value="{{ @$message->message }}"
                    readonly required />
            </div>
        </x-admin.modal>
</div>
@push('scripts')
    <script>
        // options with default values
        var options = {
            placement: 'bottom-right',
            backdrop: 'static',
            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            closable: true
        };

        var $targetEl = document.getElementById('viewMessage');
        var modal = new Modal($targetEl, options);

        function openModal(id) {
            livewire.emit('onSelectedItem', id ?? null)
            modal.show()
        }

        function closeModal() {
            livewire.emit('onRefresh')
            modal.hide()
        }
    </script>
@endpush
</x-admin.list-container>
