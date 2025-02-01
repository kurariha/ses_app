<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">案件申し込み</h2>

        <div class="bg-yellow-200 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 flex justify-between">
                <div>
                    <p>案件名:{{ $project->project_name }}</p>
                </div>
                <div><a href="{{ route('projects.index') }}">戻る <i class="fa-solid fa-rotate-left"></i></a></div>
            </div>
        </div>
        <x-validation-errors :errors="$errors" />

        <form action="{{ route('projects.contacts.store', $project) }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="name">
                    氏名
                </label>
                <input type="text" name="name"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required placeholder="氏名" value="{{ old('name') }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="email">
                    email
                </label>
                <input type="text" name="email"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required placeholder="email" value="{{ old('email') }}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm mb-2" for="body">
                    自己PR
                </label>
                <textarea name="body" rows="10"
                    class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full py-2 px-3"
                    required placeholder="案件に対する自己PRをご記入ください。">{{ old('body') }}</textarea>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="登録"
                    class="bg-yellow-300 hover:bg-yellow-200 text-gray font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</x-app-layout>
