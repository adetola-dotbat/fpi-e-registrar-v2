<?php

namespace App\Http\Controllers;

use App\Helper\FileHelper;
use App\Http\Requests\SettingsRequest;
use App\Models\Settings;
use App\Services\SettingsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(protected SettingsService $settingsService) {}

    public function getSettings(): JsonResponse
    {
        return $this->settingsService->getSettings();
    }
    public function update(SettingsRequest $request): JsonResponse
    {
        return $this->settingsService->update($request->validated());
    }

    public function updateSettings(Request $request)
    {
        $validatedData = $request->validate([
            'btc_rate' => 'nullable|sometimes',
            'eth_rate' => 'nullable|sometimes',
            'btc_wallet_address' => 'nullable|string',
            'eth_wallet_address' => 'nullable|string',
            'btc_qr_code' => 'required|sometimes|file|image',
            'eth_qr_code' => 'required|sometimes|file|image',
        ]);

        $settings = Settings::first();

        if (!$settings) {
            return response()->json(['message' => 'Settings not found'], 404);
        }

        $settings->btc_rate = $validatedData['btc_rate'] ?? $settings->btc_rate;
        $settings->eth_rate = $validatedData['eth_rate'] ?? $settings->eth_rate;
        $settings->btc_wallet_address = $validatedData['btc_wallet_address'] ?? $settings->btc_wallet_address;
        $settings->eth_wallet_address = $validatedData['eth_wallet_address'] ?? $settings->eth_wallet_address;

        if ($request->hasFile('btc_qr_code')) {
            $btcQrCodePath = FileHelper::uploadsImage('btc_qr_code', $request, 'settings');
            $settings->btc_qr_code = $btcQrCodePath;
        }
        if ($request->hasFile('eth_qr_code')) {
            $ethQrCodePath = FileHelper::uploadsImage('eth_qr_code', $request, 'settings');
            $settings->eth_qr_code = $ethQrCodePath;
        }

        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}
