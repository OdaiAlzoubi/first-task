<?php

namespace App\Http\Controllers;

use App\Constants\User\UserRoleConstants;
use App\Models\User;
use App\Services\DashboardService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService) {}
    public function index()
    {
        if (Auth::user()->role == UserRoleConstants::ADMIN) {
            $users = User::where('role', '1')->get();
            $table = $this->dashboardService->adminTable();
            return view('admin', [
                'users' => $users,
                'table' => $table,
                'formUser' => $this->dashboardService->formUser(),
                'formSubject' => $this->dashboardService->formSubject(),
                'formMark' => $this->dashboardService->formMark(),
                'fromStudentToSubject' => $this->dashboardService->fromStudentToSubject()
            ]);
        }
        $user = Auth::user();
        $tables = $this->dashboardService->studentTable();
        return view('dashboard', ['user' => $user, 'tables' => $tables]);
    }
}
