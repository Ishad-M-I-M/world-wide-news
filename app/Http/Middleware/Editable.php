<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;

class Editable
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
        if(Article::all()->where('id', '=', $request->id)
                ->where('reporter_id','=',$request->user()->id)
                ->where('status', '!=', 'Approved')
                ->first() === null)
            abort('401');
        return $next($request);
    }
}
