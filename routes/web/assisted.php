<?php

// Assisted routes
Route::group(['middleware' => ['permission:register-assisted']], function () {
    Route::get('/create', 'AssistedCreate')->name('assisteds.create');
    Route::post('/', 'AssistedStore')->name('assisteds.store');

    Route::get('/{assisted}/assets/create', 'Asset\AssetCreate')->name('assisteds.asset.create');
    Route::post('/{assisted}/assets', 'Asset\AssetStore')->name('assisteds.assets.store');
});

Route::group(['middleware' => ['permission:update-assisted']], function () {
    Route::get('/{assisted}/edit', 'AssistedEdit')->name('assisteds.edit');
    Route::put('/{assisted}', 'AssistedUpdate')->name('assisteds.update');

    Route::get('/{assisted}/familyIncome', 'AssistedFamilyIncomeEdit')->name('assistedsFamilyIncomes.edit');
    Route::put('/{assisted}/familyIncome', 'AssistedFamilyIncomeUpdate')->name('assistedsFamilyIncomes.update');

    Route::get('/{assisted}/housingSituation', 'AssistedHousingSituationEdit')->name('assistedsHousingSituation.edit');
    Route::put('/{assisted}/housingSituation', 'AssistedHousingSituationUpdate')->name('assistedsHousingSituation.update');

    Route::get('/{assisted}/asset/{asset}/edit', 'Asset\AssetEdit')->name('assisteds.assets.edit');
    Route::put('/{assisted}/asset/{asset}', 'Asset\AssetUpdate')->name('assisteds.assets.update');
});

Route::group(['middleware' => ['permission:read-assisted']], function () {
    Route::get('/list', 'AssistedIndex')->name('assisteds.index');
    Route::get('/{assisted}', 'AssistedShow')->name('assisteds.show');

    Route::get('/{assisted}/assets/list', 'Asset\AssetIndex')->name('assisteds.assets.index');
});

Route::group(['middleware' => ['permission:delete-assisted']], function () {
    Route::delete('/{assisted}', 'AssistedDestroy')->name('assisteds.destroy');

    Route::delete('/{assisted}/assets/{asset}', 'Asset\AssetDestroy')->name('assisteds.assets.destroy');
});
