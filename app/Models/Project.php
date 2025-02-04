<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_name', 'email_sender', 'email_received_at',
        'days_until_deadline', 'project_deadline', 'job_description',
        'required_tech_stack_1', 'required_skills_detail_1',
        'required_tech_stack_2', 'required_skills_detail_2',
        'required_tech_stack_3', 'required_skills_detail_3',
        'required_tech_stack_4', 'required_skills_detail_4',
        'required_tech_stack_5', 'required_skills_detail_5',
        'preferred_tech_stack_1', 'preferred_skills_detail_1',
        'preferred_tech_stack_2', 'preferred_skills_detail_2',
        'preferred_tech_stack_3', 'preferred_skills_detail_3',
        'preferred_tech_stack_4', 'preferred_skills_detail_4',
        'preferred_tech_stack_5', 'preferred_skills_detail_5',
        'work_location', 'employment_type', 'working_hours', 'start_date',
        'age', 'foreign_nationality', 'salary', 'adjusted_salary',
        'time_adjustment', 'payment_terms', 'dress_code', 'number_of_positions',
        'contract', 'business_flow', 'interview_count', 'interview_method',
        'pc_provided', 'main_development_environment', 'notes'
    ];

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
