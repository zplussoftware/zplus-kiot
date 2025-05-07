<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserStatusController extends Controller
{
    /**
     * Toggle the user's active status.
     */
    public function update(Request $request, User $user)
    {
        // Prevent changing own status
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Bạn không thể thay đổi trạng thái của chính mình.');
        }

        try {
            // Toggle user active status
            $user->update([
                'active' => !$user->active
            ]);

            $statusText = $user->active ? 'kích hoạt' : 'vô hiệu hóa';
            
            return back()->with('success', "Tài khoản của {$user->name} đã được {$statusText} thành công.");
        } catch (\Exception $e) {
            return back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}
