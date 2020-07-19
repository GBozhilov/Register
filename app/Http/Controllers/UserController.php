<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function uploadAvatar(Request $request): RedirectResponse
    {
        if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
            $this->deleteOldImage();
            $request->image->storeAs('images', $fileName, 'public');
            auth()->user()->update(['avatar' => $fileName]);

            return redirect()->back()->with('message', 'Image successfully uploaded');
        }

        return redirect()->back()->with('error', 'Please select a photo');
    }

    private function deleteOldImage(): void
    {
        $avatar = auth()->user()->avatar;

        if ($avatar) {
            $deleted = Storage::delete('/public/images/' . $avatar);
        }
    }
}
