<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
            <p class="flex justify-center mb-6">案件一覧</p>
            <!-- 🔍 検索フォーム -->
            <form method="GET" action="{{ route('projects.index') }}" class="flex justify-center mb-6 ">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードを入力"
                    class="rounded-full mx-4">
                <button type="submit"
                    class="bg-yellow-300 hover:bg-yellow-200 text-gray font-bold rounded-full px-4 py-1">検索</button>
                <!-- 案件リスト -->
                @if ($projects->count() > 0)
                @else
                    <div class="flex items-center ml-5">
                        <b class="text-red-500">該当する案件が見つかりませんでした。</b>
                    </div>
                @endif
            </form>
            <table>
                <thead>
                    <tr>
                        <th>案件名</th>
                        <th>必須スキル</th>
                        <th>勤務形態</th>
                        <th>金額</th>
                        <th>案件更新日時</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->project_name }}</td>
                            <td>
                                @php
                                    $requiredSkills = array_filter([
                                        $project->required_tech_stack_1,
                                        $project->required_tech_stack_2,
                                    ]);
                                    echo implode(', ', $requiredSkills);
                                @endphp</td>
                            <td>{{ $project->employment_type }}</td>
                            <td>{{ $project->adjusted_salary }}</td>
                            <td>{{ $project->email_received_at }}</td>
                            <td><button onclick='location.href="{{ route('projects.show', $project) }}"'
                                    class="bg-yellow-300 hover:bg-yellow-200 text-gray-700 font-bold rounded-full px-4 py-1"><i
                                        class="fa-solid fa-arrow-right text-gray-600"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- ページネーション -->
            {{ $projects->links() }}
            <div class="flex justify-center">
                <a href="{{ route('projects.create') }}"
                    class="bg-yellow-300 hover:bg-yellow-200 text-gray-700 font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline block mt-4">案件登録</a>
            </div>
        </div>
    </div>
</x-app-layout>
