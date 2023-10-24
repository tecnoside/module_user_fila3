<?php

declare(strict_types=1);

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\Request;
use Webmozart\Assert\Assert;
use Illuminate\Http\JsonResponse;
use Modules\Xot\Datas\JsonResponseData;
use Modules\Xot\Http\Controllers\XotBaseController;

class GetLoggedUserController extends XotBaseController
{
    /**
     * Login api.
     */
    public function __invoke(Request $request): JsonResponse
    {
        Assert::notNull($user = $request->user());

        return JsonResponseData::from([
            'message' => 'logged user',
            'data' => $user->toArray(),
        ])->response();
    }
}
