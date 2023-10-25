<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Egea\Models\MobileDeviceUser;
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
        Assert::notNull($accessToken = $user->token());
        /*
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->delete();
        */
        OauthRefreshToken::where('access_token_id', $accessToken->getKey())->delete();
        $user->token()?->delete();

        MobileDeviceUser::where('user_id', $user->id)->update(['logout_at' => now()]);

        /*
        return response()->json([
            'message' => 'Successfully logged out',
            'session' => session()->all(),
        ]);
        */

        return JsonResponseData::from([
            'message' => 'logout succefully',
            // 'data' => $user->toArray(),
            'data' => session()->all(),
        ])->response();
    }
}
