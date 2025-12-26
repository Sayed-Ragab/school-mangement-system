<?php

namespace App\Providers;

use App\Repository\QuizzRepository;
use App\Repository\LibraryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\QuizzRepositoryInterface;
use App\Repository\LibraryRepositoryInterface;

class RepositProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Repository\StudentRepositoryInterface','App\Repository\StudentRepository');
        $this->app->bind('App\Repository\StudentPromotionRepositoryInterface','App\Repository\StudentPromotionRepository');
        $this->app->bind('App\Repository\StudentGraduatedRepositoryInterface','App\Repository\StudentGraduatedRepository');
        $this->app->bind('App\Repository\FeesRepositoryInterface','App\Repository\FeesRepository');
        $this->app->bind('App\Repository\FeesInvoicesRepositoryInterface','App\Repository\FeesInvoicesRepository');
        $this->app->bind('App\Repository\ReceiptStudentsRepositoryInterface', 'App\Repository\ReceiptStudentsRepository');
        $this->app->bind('App\Repository\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
        $this->app->bind('App\Repository\PaymentRepositoryInterface','App\Repository\PaymentRepository');
        $this->app->bind('App\Repository\AttendanceRepositoryInterface','App\Repository\AttendanceRepository');
        $this->app->bind('App\Repository\SubjectRepositoryInterface','App\Repository\SubjectRepository');
        $this->app->bind(QuizzRepositoryInterface::class,QuizzRepository::class);
        $this->app->bind('App\Repository\QuestionRepositoryInterface', 'App\Repository\QuestionRepository');
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);
    }
}
