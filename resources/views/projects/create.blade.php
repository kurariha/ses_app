<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
            <p class="flex justify-center mb-6">案件登録</p>
        </div>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    {{-- Geminiの結果がない場合（フォーム表示） --}}
    @empty($project)
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <label for="email_content">メール本文:</label><br>
            <textarea name="email_content" id="email_content" rows="10" required>{{ old('email_content') }}</textarea><br><br>
            <button type="submit" class="bg-yellow-300 hover:bg-yellow-200 text-glay rounded-full px-4 py-1">書き換え</button>
        </form>
    @endempty

    </div>
</x-app-layout>
