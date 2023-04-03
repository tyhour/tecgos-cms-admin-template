<div class="bg-white border border-gray-200 rounded-sm shadow-lg col-span-full xl:col-span-12">
    <header class="px-5 py-4 border-b border-gray-100">
        <h2 class="font-semibold text-gray-800">Messages Today</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4 w-6">
                            No
                        </th>
                        <th scope="col" class="w-full px-4 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3 !min-w-[100px]">
                            Email
                        </th>
                        <th scope="col" class="px-4 py-3 !min-w-[150px]">
                            Subject
                        </th>
                        <th scope="col" class="px-4 py-3 !min-w-[300px] truncate">
                            Message
                        </th>
                        <th scope="col" class="w-12 px-4 py-3 text-center">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attributes['messages'] as $key => $message)
                        <tr
                            class="w-9/12 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-4 w-6">
                                {{ $key + 1 }}
                            </td>
                            <td class="px-4 py-4 font-bold w-full">
                                {{ $message->full_name }}
                            </td>
                            <td class="px-4 py-4 font-bold !min-w-[100px]">
                                {{ $message->email }}
                            </td>
                            <td class="px-4 py-4 font-bold !min-w-[150px]">
                                {{ $message->subject }}
                            </td>
                            <td class="px-4 py-4 font-bold !min-w-[300px]">
                                {{ $message->message }}
                            </td>
                            <td class="w-12 px-4 py-3 text-center">
                                <!-- Modal toggle -->
                                <a href="{{ route('admin.message-detail', ['id' => $message->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
