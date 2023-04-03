<x-app-layout background="bg-white">
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">

        <div class="max-w-2xl m-auto mt-16">

            <div class="px-4 text-center">
                <div class="inline-flex mb-8">
                    <img src="{{ asset('images/404-illustration.svg') }}" width="176" height="176"
                        alt="404 illustration" />
                </div>
                <div class="mb-6">Hmm...this page doesn’t exist. Try searching for something else!</div>
                <a href="{{ route('admin.admin_dashboard') }}"
                    class="text-white bg-indigo-500 btn hover:bg-indigo-600">Back To Dashboard</a>
            </div>

        </div>

    </div>
</x-app-layout>
