<?php

use App\Http\Controllers\CandidateController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\userTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\ElectionPositionController;

Route::resource('departments', DepartmentController::class);

    Route::view('/', view: 'homepage')->name('homepage');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/signup', [StudentRegistrationController::class, 'index'])->name('show.signup');
    Route::post('/signup', [StudentRegistrationController::class, 'store'])->name('signup-submit');

    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout.subit');


    Route::middleware(['auth', 'userType:2'])->group(function () {


        // Department Admin Routes
        Route::delete('/departments/{department_id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
        Route::post('/create', [DepartmentController::class, 'store'])->name('departments.store');
        Route::get('/show/{department_id}', [DepartmentController::class, 'show'])->name('departments.show');
        Route::get('/index', [DepartmentController::class, 'index'])->name('departments.index');
        Route::get('/edit/{department_id}', [DepartmentController::class, 'edit'])->name('departments.edit');
        Route::put('/put/{department_id}', [DepartmentController::class, 'update'])->name('departments.update');

                //UserType Routes
        Route::delete('/userTypes/{userType_id}', [UserTypeController::class, 'destroy'])->name('userTypes.destroy');
        Route::post('/userTypes', [UserTypeController::class, 'store'])->name('userTypes.store');
        Route::get('/userTypes/{userType_id}', [UserTypeController::class, 'show'])->name('userTypes.show');
        Route::get('/userTypes', [UserTypeController::class, 'index'])->name('userTypes.index');
        Route::get('/userTypes/edit/{userType_id}', [UserTypeController::class, 'edit'])->name('userTypes.edit');
        Route::put('/userTypes/{userType_id}', [UserTypeController::class, 'update'])->name('userTypes.update');

                        // User Routes
        Route::get('/manage-users', [UserController::class, 'index'])->name('view-users');
        Route::post('/create-users', [UserController::class, 'store'])->name('create-user');



    });

        
        
    Route::middleware(['auth', 'userType:1'])->group(function () {

            // Voter Routes
    Route::view('/voter-election', 'voter.election')->name('election');
    Route::view('/voter-candidates', 'voter.manageAcc')->name('manageAcc-voter');

    //apply Candidate 
    Route::get('/election', [CandidateController::class, 'showElections'])->name('showElections');
    Route::get('/applyCandidate/{election}',[CandidateController::class, 'manageCandidacy'])->name('manageCandidacy');
    Route::post('/candidates/{electionPositionId}', [CandidateController::class, 'store'])->name('candidates.store');



    });

    Route::middleware(['auth', 'userType:3'])->group(function () {

    //Election controller
    Route::get('/elections', [ElectionController::class, 'index'])->name('view-election');
    Route::post('/elections', [ElectionController::class, 'store'])->name('create-election');
    Route::get('/elections/{election}', [ElectionController::class, 'manageElection'])->name('manage-election');

    

    // Department Admin Routes
    Route::view('/voters', 'department-admin.voters')->name('voters-DeptAdmin');
    Route::view('/candidates', 'department-admin.candidates')->name('candidates-DeptAdmin');
    Route::view('/DeptAdmin-elections', 'department-admin.elections')->name('elections-DeptAdmin');
    Route::view('/DeptAdmin-ManageAcc', 'department-admin.manageAccount')->name('manageAcc-DeptAdmin');
    Route::get('/voters-only', [UserController::class, 'showVoterOnly'])->name('voters-only');

    //Student registration
    Route::delete('/approveVoters/{student_id}', [StudentRegistrationController::class, 'destroy'])->name('declineVoter');
    Route::get('/approveVoters', [StudentRegistrationController::class, 'showAllNeedsApproval'])->name('approveVoters');
    Route::post('/approveVoter/{student_id}', [StudentRegistrationController::class, 'approve'])->name('approveUser');

    //Position controller
    Route::post('/positions/{election_id}', [ElectionPositionController::class, 'store'])->name('save');

    

});





        










    //not final 
    Route::view('/users', 'admin.users')->name('manage-users');


    Route::view('/election-admin', 'admin.election-admin')->name('election-admin');
    








