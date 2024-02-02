<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Egea\Models\MobileDeviceUser;
use Modules\User\Actions\Socialite\LogoutUserAction;
use Modules\User\Models\OauthRefreshToken;
use Modules\Xot\Datas\JsonResponseData;
use Modules\Xot\Http\Controllers\XotBaseController;
use Webmozart\Assert\Assert;

class LogoutController extends XotBaseController
{
    /**
     * Login api.
     */
    public function __invoke(Request $request): JsonResponse
    {
        Assert::notNull($user = $request->user());
        app(LogoutUserAction::class)->execute($user);
        /*
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->delete();
        */

        /*
        Assert::notNull($accessToken = $user->token());
        // Assert::methodExists($accessToken, 'delete');
        if (method_exists($accessToken, 'getKey')) {
            OauthRefreshToken::where('access_token_id', $accessToken->getKey())->delete();
        }
        if (method_exists($accessToken, 'delete')) {
            $accessToken->delete();
            // $user->token()?->delete();
        }

        MobileDeviceUser::where('user_id', $user->id)->update(['logout_at' => now()]);
        */
        /*
        return response()->json([
            'message' => 'Successfully logged out',
            'session' => session()->all(),
        ]);
        */

        return JsonResponseData::from(
            [
                'message' => 'logout succefully',
                // 'data' => $user->toArray(),
                'data' => session()->all(),
            ]
        )->response();
    }
}
