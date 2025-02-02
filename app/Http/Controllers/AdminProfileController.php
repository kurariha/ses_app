<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            // 管理者認証用ガードを利用してログイン中の管理者情報を取得
            'admin' => Auth::guard('admin')->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(AdminProfileUpdateRequest $request): RedirectResponse
    {
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();

        // return Redirect::route('profile.edit')->with('status', 'profile-updated');

        // 管理者認証用ガードを利用してログイン中の管理者を取得
        $admin = Auth::guard('admin')->user();

        // リクエストで検証済みのデータで更新
        $admin->fill($request->validated());

        // メールアドレスが変更された場合は、再認証のためにメール検証日時をリセット
        if ($admin->isDirty('email')) {
            $admin->email_verified_at = null;
        }

        $admin->save();

        return Redirect::route('admin.profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // $request->validateWithBag('userDeletion', [
        //     'password' => ['required', 'current_password'],
        // ]);

        // $user = $request->user();

        // Auth::logout();

        // $user->delete();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        // return Redirect::to('/');
        
        // バリデーション用のエラーバッグ名を管理者用に変更（必要に応じて）
        $request->validateWithBag('adminDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $admin = Auth::guard('admin')->user();

        // 管理者ガードでログアウト
        Auth::guard('admin')->logout();

        // 管理者アカウントの削除
        $admin->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 管理者用のトップページなどにリダイレクト
        return Redirect::to('/admin');
    }
}
