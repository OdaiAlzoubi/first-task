<?php

namespace App\Services;

use App\Constants\User\UserRoleConstants;
use App\Constants\User\UserStatusConstants;
use App\Models\User;
use App\Models\Subject;

class DashboardService
{
    public function studentTable()
    {
        return [
            'first_table' => $this->getTableHeadersStudentFirst(),
            'second_table' => $this->getTableHeadersStudentSecond(),
        ];
    }
    private function getTableHeadersStudentFirst()
    {
        return ['username', 'email'];
    }
    private function getTableHeadersStudentSecond()
    {
        return ['subject', 'pass mark', 'mark'];
    }

    public function adminTable()
    {
        return [
            'headers' => $this->getTableHeadersStudent(),
        ];
    }
    private function getTableHeadersStudent()
    {
        return ['id', 'username', 'email'];
    }
    private function getActions()
    {
        return ['edit', 'delete'];
    }


    public function formUser()
    {
        return [
            [
                'label' => 'Name',
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'placeholder' => 'Enter Name',
            ],
            [
                'label' => 'Email',
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'placeholder' => 'Enter Email',
            ],
            [
                'label' => 'UserName',
                'type' => 'text',
                'name' => 'username',
                'id' => 'username',
                'placeholder' => 'Enter UserName',
            ],
            [
                'label' => 'Password',
                'type' => 'password',
                'name' => 'password',
                'id' => 'password',
                'placeholder' => 'Enter Password',
            ],
            [
                'label' => 'password confirmation',
                'type' => 'password',
                'name' => 'password_confirmation',
                'id' => 'password_confirmation',
                'placeholder' => 'Enter password confirmation',
            ],
            [
                'label' => 'Role',
                'type' => 'select',
                'name' => 'role',
                'options' => UserRoleConstants::ROLES,
                'id' => 'role',
                'placeholder' => 'Select Role',
                'class' => '',
            ],
            [
                'label' => 'Status',
                'type' => 'select',
                'name' => 'status',
                'options' => UserStatusConstants::STATUS,
                'id' => 'status',
                'placeholder' => 'Select Status',
                'class' => '',
            ],
        ];
    }

    public function formSubject()
    {
        return [
            [
                'label' => 'Subject Name',
                'type' => 'text',
                'name' => 'name',
                'id' => 'name',
                'placeholder' => 'Enter Subject Name',
            ],
            [
                'label' => 'Pass Mark',
                'type' => 'number',
                'name' => 'pass_mark',
                'id' => 'pass_mark',
                'placeholder' => 'Enter Subject Mark',
            ],
        ];
    }

    public function formMark()
    {
        return [

            [
                'label' => 'Student',
                'type' => 'select',
                'name' => 'student_id',
                'options' => User::where('role', UserRoleConstants::STUDENT)->pluck('name','id'),
                'id' => 'student_id',
                'class' => 'getSubject',
                'data' => 'data-url="' . route('subject.getSubjectsFromUser',['id'=>':id']) . '"',
                'placeholder' => 'Select student',
            ],
            [
                'label' => 'Subject',
                'type' => 'select',
                'name' => 'subject_id',
                'options' => Subject::all(),
                'id' => 'subject_id',
                'class'=>'getMark',
                'placeholder' => 'Select subject',
                'hide' => 'd-none select-d-none',
            ],
            [
                'label' => 'Mark',
                'type' => 'text',
                'name' => 'mark',
                'id' => 'mark',
                'placeholder' => 'Enter Mark',
                'hide' => 'd-none input-d-none',
            ],
        ];
    }

    public function fromStudentToSubject()
    {
        return [
            [
                'label' => 'Student',
                'type' => 'select',
                'name' => 'student_id',
                'options' => User::where('role', UserRoleConstants::STUDENT)->pluck('name','id'),
                'id' => 'student_id',
                'placeholder' => 'Select student',
                'class' => 'getSubject',
                'data' => 'data-url="' . route('subject.getNotSubjectsFromUser',['id'=>':id']) . '"',
            ],
            [
                'label' => 'subject',
                'type' => 'select',
                'name' => 'subject_id',
                'id' => 'subject_id',
                'options' => Subject::all()->pluck('name','id'),
                'placeholder' => 'Select subject',
                'class' => '',
                'hide' => 'd-none select-d-none',
            ],
        ];
    }
}
