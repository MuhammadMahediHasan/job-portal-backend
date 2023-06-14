<?php

namespace App\Actions;

use App\Models\JobSkill;

class JobSkillAction
{
    public static function attach($skills, $job): void
    {
        if (!$skills) {
            return;
        }
        $job->skills()->delete();
        $data = array();
        foreach ($skills as $skill) {
            $data[] = [
                'skill_id' => $skill,
                'job_id' => $job->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        JobSkill::query()->insert($data);
    }
}
