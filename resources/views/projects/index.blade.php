<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
            <!-- 🔍 検索フォーム -->
            <form method="GET" action="{{ route('projects.index') }}" class="flex justify-center mb-6 ">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードを入力" class="rounded-full mx-4">
                <button type="submit"
                    class="bg-yellow-300 hover:bg-yellow-200 text-glay rounded-full px-4 py-1">検索</button>
                <!-- 案件リスト -->
                @if ($projects->count() > 0)

                @else
                    <p>該当する案件が見つかりませんでした。</p>
                @endif
            </form>
            <table>
                <thead>
                    <tr>
                        <th>案件名</th>
                        <th>必須スキル</th>
                        <th></th>
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
                            <td>{{ $project->required_tech_stack_1 }}</td>
                            <td>{{ $project->required_tech_stack_2 }}</td>
                            <td>{{ $project->employment_type }}</td>
                            <td>{{ $project->adjusted_salary }}</td>
                            <td>{{ $project->email_received_at }}</td>
                            <td><button onclick='location.href="{{ route('projects.show', $project) }}"'
                                    class="bg-yellow-300 hover:bg-yellow-200 text-glay rounded-full px-4 py-1"><i
                                    class="fa-solid fa-arrow-right"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- ページネーション -->
            {{ $projects->links() }}
        </div>
    </div>
</x-app-layout>
