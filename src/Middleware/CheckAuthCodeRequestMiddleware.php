<?php

/*
 * This file is part of OAuth 2.0 Laravel.
 *
 * (c) Luca Degasperi <packages@lucadegasperi.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LucaDegasperi\OAuth2Server\Middleware;

use Closure;
use LucaDegasperi\OAuth2Server\Authorizer;

/**
 * This is the check auth code request middleware class.
 *
 * @author Luca Degasperi <packages@lucadegasperi.com>
 */
class CheckAuthCodeRequestMiddleware
{
    /**
     * The authorizer instance.
     *
     * @var \LucaDegasperi\OAuth2Server\Authorizer
     */
    protected $authorizer;

    /**
     * @param Authorizer $authorizer
     */
    public function __construct(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    public function handle($request, Closure $next)
    {
        $this->authorizer->checkAuthCodeRequest();

        return $next($request);
    }
}
