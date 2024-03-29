<?php

namespace App\Http\Middleware;
use App\Models\logAcesso;

use Closure;
use Illuminate\Http\Request;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);
        
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();

        LogAcesso::create(["log" => "IP $ip requisitou a rota $rota"]);
        
        $resposta = $next($request);
        $resposta->setStatusCode(201, "O status da resposta e o texto da resposta foram alterados!!");
        return $resposta;
    }
}
