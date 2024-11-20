<?php

use Illuminate\Support\Facades\Route;


Route::get('certificate/validate/{hash}', \App\Livewire\CertificateValidation::class)->name('certificate.validate');
