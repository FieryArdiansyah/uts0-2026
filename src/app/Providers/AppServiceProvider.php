<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\ActivityPolicy;
use Filament\Actions\MountableAction;
use Filament\Notifications\Livewire\Notifications;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Super Admin Access
        |--------------------------------------------------------------------------
        | Untuk project lokal/UTS, email di bawah ini akan dianggap punya semua akses.
        | Ini membantu ketika menu Filament hilang karena role/permission belum ke-assign.
        */
        Gate::before(function (User $user, string $ability): ?bool {
            $superAdminEmails = [
                'admin@admin.com',
            ];

            return in_array($user->email, $superAdminEmails, true)
                ? true
                : null;
        });

        Gate::policy(Activity::class, ActivityPolicy::class);

        Page::formActionsAlignment(Alignment::Right);

        Notifications::alignment(Alignment::End);
        Notifications::verticalAlignment(VerticalAlignment::End);

        Page::$reportValidationErrorUsing = function (ValidationException $exception): void {
            Notification::make()
                ->title($exception->getMessage())
                ->danger()
                ->send();
        };

        MountableAction::configureUsing(function (MountableAction $action): void {
            $action->modalFooterActionsAlignment(Alignment::Right);
        });
    }
}