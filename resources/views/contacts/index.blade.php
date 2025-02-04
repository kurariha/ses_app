<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <div>
                        <p>申し込み済みプロジェクト一覧</p>
                    </div>
                    <div><a href="{{ route('projects.index') }}">戻る <i class="fa-solid fa-rotate-left"></i></a></div>
                </div>
            </div>
            <x-validation-errors :errors="$errors" />

            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            @if ($contacts->isEmpty())
                <p>申し込み済みのプロジェクトはありません。</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>案件名</th>
                            <th>申込日</th>
                            <th>自己PR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>
                                    <a href="{{ route('projects.show', $contact->project) }}" class="hover:text-gray-500 underline">{{ $contact->project->project_name }}</a>
                                </td>
                                <td>{{ $contact->created_at }}</td>
                                <td>{{ $contact->body }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
</x-app-layout>
