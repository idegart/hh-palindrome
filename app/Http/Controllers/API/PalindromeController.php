<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Palindrome\SearchRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\PalindromResource;
use App\Models\Palindrome;

class PalindromeController extends Controller
{
    /**
     * Поиск палиндромов в строке
     *
     * @param SearchRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function search(SearchRequest $request)
    {
        $validated = $request->validated();

        $q = $validated['q'];

        $palindromes = Palindrome::palindromesOfString($q);

        return PalindromResource::collection($palindromes);
    }
}
