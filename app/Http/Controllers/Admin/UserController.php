<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //list users
    public function index(Request $request)
    {
        $authUserId = Auth::id();

        $search = $request->input('search');

        $users = User::query()
            ->where('id', '!=', $authUserId)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                });
            })
            ->paginate(10)
            ->withQueryString();

        return view('admin.users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show_user', compact('user'));
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->getRawOriginal('image') && file_exists(public_path('uploads/profile_images/' . $user->getRawOriginal('image')))) {
                unlink(public_path('uploads/profile_images/' . $user->getRawOriginal('image')));
            }
            $user->delete();
            return redirect('user-list')->with('success', 'User deleted successfully');
        } else {
            return redirect('user-list')->withErrors(['error' => 'User not found']);
        }
    }
}
