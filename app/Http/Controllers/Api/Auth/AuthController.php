<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\GeneralException;
use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Services\AccountService;
use Carbon\Carbon;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Socialite\Facades\Socialite;

/**
 * Class AuthController
 * @package App\Http\Controllers\Api\Auth
 */
class AuthController extends ApiBaseController
{

    /**
     * @var AccountService
     */
    protected $accountService;

    /**
     * AuthController constructor.
     * @param AccountService $accountService
     */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $appId       = $request->get('app_uid');
        $provider    = $request->get('authentication_type');
        $accessToken = $request->get('access_token');

        // try {
        //     $userFromToken = Socialite::driver($provider)->userFromToken($accessToken);

        //     if ($userFromToken->id !== $appId) {
        //         return $this->errorResponse('User information doesn\'t match', Response::HTTP_FORBIDDEN);
        //     }

        //     $user = $this->accountService->findOrCreateProvider($userFromToken, $provider);
        // } catch (ClientException | GeneralException $e) {
        //     return $this->errorResponse($e->getMessage(), Response::HTTP_FORBIDDEN);
        // }

        $account = $this->accountService->findById(1);
        $tokenResult = $this->accountService->createAccessToken($account);

        return $this->successResponse([
            'auth' => [
                'access_token' => $tokenResult->plainTextToken,
                'token_type'   => 'Bearer',
                'expires_at'   => Carbon::now()->addDays(14)->format('Y-m-d H:i:s')
            ]
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param UserRepository $userRepository
     * @param                $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            Auth::user()->currentAccessToken()->delete();

            return $this->successResponse(['message' => 'Logout successful!']);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}
