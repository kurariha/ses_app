<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('notice'))
                <div class="bg-blue-100 border-blue-500 text-blue-700 border-l-4 p-4 my-2">
                    {!! session('notice') !!}
                </div>
            @endif

            <div class="bg-yellow-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <div><p>案件名:{{ $project->project_name }}</p></div>
                    <div><a href="{{ route('projects.index') }}">戻る <i class="fa-solid fa-rotate-left"></i></a></div>
                </div>
            </div>
            <div class="">
                案件更新日 : {{ $project->email_received_at }}<br>
                案件期限 : {{ $project->project_deadline }}<br>
                <br>
                <p>必須スキル</p>
                &emsp;【スキル名】{{ $project->required_tech_stack_1 }}&emsp;【詳細】{{ $project->required_skills_detail_1 }}<br>
                &emsp;【スキル名】{{ $project->required_tech_stack_2 }}&emsp;【詳細】{{ $project->required_skills_detail_2 }}<br>
                &emsp;【スキル名】{{ $project->required_tech_stack_3 }}&emsp;【詳細】{{ $project->required_skills_detail_3 }}<br>
                &emsp;【スキル名】{{ $project->required_tech_stack_4 }}&emsp;【詳細】{{ $project->required_skills_detail_4 }}<br>
                &emsp;【スキル名】{{ $project->required_tech_stack_5 }}&emsp;【詳細】{{ $project->required_skills_detail_5 }}<br>
                <br>
                <p>歓迎スキル</p>
                &emsp;【スキル名】{{ $project->preferred_tech_stack_1 }}&emsp;【詳細】{{ $project->preferred_skills_detail_1 }}<br>
                &emsp;【スキル名】{{ $project->preferred_tech_stack_2 }}&emsp;【詳細】{{ $project->preferred_skills_detail_2 }}<br>
                &emsp;【スキル名】{{ $project->preferred_tech_stack_3 }}&emsp;【詳細】{{ $project->preferred_skills_detail_3 }}<br>
                &emsp;【スキル名】{{ $project->preferred_tech_stack_4 }}&emsp;【詳細】{{ $project->preferred_skills_detail_4 }}<br>
                &emsp;【スキル名】{{ $project->preferred_tech_stack_5 }}&emsp;【詳細】{{ $project->preferred_skills_detail_5 }}<br>
                <br>
                <p>勤務条件</p>
                &emsp;勤務地 : {{ $project->work_location }}<br>
                &emsp;就業形態 : {{ $project->employment_type }}<br>
                &emsp;就業時間 : {{ $project->working_hours }}<br>
                &emsp;契約期間 : {{ $project->start_date }}<br>
                <br>
                <p>条件</p>
                &emsp;年齢 : {{ $project->age }}<br>
                &emsp;外国籍の可否 : {{ $project->foreign_nationality }}<br>
                &emsp;報酬 : {{ $project->adjusted_salary }}<br>
                &emsp;精算幅 : {{ $project->time_adjustment }}<br>
                &emsp;募集人数 : {{ $project->number_of_positions }}<br>
                &emsp;服装 : {{ $project->dress_code }}<br>
                <br>
                <p>主な開発環境</p>
                {{ $project->main_development_environment }}
                <br>
                <br>
                <p>補足</p>
                {{ $project->notes }}
            </div>
            <div class="flex justify-center">
                <a href="{{ route('projects.contacts.create', $project) }}" class="bg-yellow-300 hover:bg-yellow-200 text-gray font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline block mt-4">案件申し込み</a>
            </div>
        </div>
    </div>
</x-app-layout>
