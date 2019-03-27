<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palindrome extends Model
{
    protected $fillable = [
        'string', 'start', 'end'
    ];


    public static function wordIsPalindrome(string $word) :bool
    {
        if (mb_strlen($word) < 2) {
            return false;
        }

        $lowerWord = mb_strtolower($word);

        return $lowerWord == implode(array_reverse(self::splittedWord($lowerWord)));
    }

    public static function splittedWord(string $word) :array
    {
        return preg_split('//u', $word, -1,PREG_SPLIT_NO_EMPTY);
    }


    public static function palindromesOfString(string $string)
    {
        $stringChars = collect(self::splittedWord($string));

        $chars = collect();
        $palindromes = collect();

        $stringChars->each(function ($char, $index) use ($chars) {

            if (preg_match('/[a-zа-я]/', $char)) {

                $chars->push([
                    'char' => $char,
                    'realIndex' => $index
                ]);

            }
        });

        $chars->each(function ($char, $index) use ($chars, $palindromes) {


            for ($i = 1; $i <= $chars->count() - $index; $i++) {

                $tempChars = $chars->slice($index, $i);

                $tempString = $tempChars->map(function ($char) {
                        return $char['char'];
                    })->implode('');


                if (self::wordIsPalindrome($tempString)) {
                    $palindromes->push([
                        'string' => $tempString,
                        'realStart' => $char['realIndex'],
                        'realEnd' => $tempChars->last()['realIndex']
                    ]);
                }

            }


        });


        return $palindromes->map(function ($palindrome) {
            return new self([
                'string' => $palindrome['string'],
                'start' => $palindrome['realStart'],
                'end' => $palindrome['realEnd']
            ]);
        });
    }
}
