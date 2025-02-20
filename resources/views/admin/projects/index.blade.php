<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
            <p class="flex justify-center mb-6">案件一覧</p>
            <!-- 🔍 検索フォーム -->
            <form method="GET" action="{{ route('admin.projects.index') }}" class="flex justify-center mb-6 ">
                <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="キーワードを入力"
                    class="rounded-full mx-4">
                <button type="submit"
                    class="bg-green-300 hover:bg-green-200 text-gray font-bold rounded-full px-4 py-1">検索</button>
                <!-- 案件リスト -->
                @if ($projects->count() > 0)
                @else
                    <div class="flex items-center ml-5">
                        <b class="text-red-500">該当する案件が見つかりませんでした。</b>
                    </div>
                @endif
            </form>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>案件名</th>
                        <th>必須スキル</th>
                        <th>勤務形態</th>
                        <th>金額</th>
                        <th>案件送信元</th>
                        <th>案件更新日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td><a href="{{ route('admin.projects.show', $project) }}" class="hover:text-gray-500 underline">{{ $project->project_name }}</a></td>
                            <td>
                                @php
                                    $requiredSkills = array_filter([
                                        $project->required_tech_stack_1,
                                        $project->required_tech_stack_2,
                                    ]);
                                    echo implode(', ', $requiredSkills);
                                @endphp</td>
                            <td>{{ $project->employment_type }}</td>
                            <td>{{ $project->salary }}</td>
                            <td>{{ $project->email_sender }}</td>
                            <td>{{ $project->created_at }}
                                <span
                                    class="text-red-400 font-bold">{{ date('Y-m-d H:i:s', strtotime('-1 day')) < $project->created_at ? 'NEW' : '' }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- ページネーション -->
            {{ $projects->links() }}
        </div>
    </div>
</x-admin-layout>
