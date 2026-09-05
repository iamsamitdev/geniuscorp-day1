<?php

use App\Http\Controllers\Api\V1\ArticleController;
use App\Http\Controllers\Api\V1\PortfolioController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\TeamMemberController;
use Illuminate\Support\Facades\Route;

// ทุก endpoint ของเนื้อหาอยู่หลัง Sanctum: Astro ต้องส่ง Bearer Token ตอน build
Route::prefix('v1')
    ->middleware(['auth:sanctum', 'ability:content:read'])
    ->group(function () {
        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

        Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
        Route::get('/portfolios/{portfolio}', [PortfolioController::class, 'show'])->name('portfolios.show');

        Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
        Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

        Route::get('/team', [TeamMemberController::class, 'index'])->name('team.index');
    });

// Health check ไม่ต้องใช้ token (ใช้ตรวจว่า API ขึ้นแล้วตอน deploy)
Route::get('/health', fn () => response()->json(['ok' => true, 'time' => now()->toIso8601String()]));
