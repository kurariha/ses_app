<x-admin-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                </div>
                <div class="bg-green-200 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex justify-between">
                        <div>
                            <p>案件登録</p>
                        </div>
                        <div><a href="{{ route('admin.projects.index') }}">戻る <i class="fa-solid fa-rotate-left"></i></a></div>
                    </div>
                </div>

                @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                @endif

                @if (session('error'))
                    <p style="color: red;">{{ session('error') }}</p>
                @endif

                {{-- Geminiの結果がない場合（フォーム表示） --}}
                @empty($project)
                    <form action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf
                        <textarea name="email_content" id="email_content" rows="10" placeholder="メールをChatGPTで変換したjsonファイルを貼り付ける" required
                            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full mt-4 py-2 px-3">{{ old('email_content') }}</textarea><br><br>
                        <div class="flex justify-center">
                            <button type="submit"
                                class="bg-green-300 hover:bg-yellow-200 text-gray-700 font-bold rounded-full px-4 py-1">登録</button>
                        </div>
                    </form>
                @endempty

            </div>
        </div>
</x-admin-layout>
