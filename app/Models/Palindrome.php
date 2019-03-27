<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Palindrome extends Model
{
    protected $fillable = [
        'string', 'start', 'end'
    ];


    /**
     * Проверяем является ли определенный набор симвалов палидромом
     *
     * @param string $word
     * @return bool
     */
    public static function wordIsPalindrome(string $word) :bool
    {
        if (mb_strlen($word) < 2) {
            return false;
        }

        $lowerWord = mb_strtolower($word);

        return $lowerWord == implode(array_reverse(self::splittedWord($lowerWord)));
    }


    /**
     * Вычленяем массив симвалов из строки
     * (Обычный str_split не корректно работает с русскими символами)
     *
     * @param string $word
     * @return array
     */
    public static function splittedWord(string $word) :array
    {
        return preg_split('//u', $word, -1,PREG_SPLIT_NO_EMPTY);
    }


    /**
     * Проверяем строку на палиндромы
     *
     * @param string $string
     * @return \Illuminate\Support\Collection
     */
    public static function palindromesOfString(string $string)
    {
        // Разбиваем строку на символы
        $stringChars = collect(self::splittedWord($string));

        // Тут будут храниться символы
        $chars = collect();

        // Тут будут хранится палиндромы
        $palindromes = collect();


        // Добавляем в хранилище симвалов только буквы, а так же их реальные координаты
        // (позицию в строке)
        $stringChars->each(function ($char, $index) use ($chars) {

            if (preg_match('/[a-zа-я]/', $char)) {

                $chars->push([
                    'char' => $char,
                    'realIndex' => $index
                ]);

            }
        });


        // Проходим циклом по всем симвалом
        $chars->each(function ($char, $index) use ($chars, $palindromes) {

            // Смотрим встречаются ли после этого символа палиндромы
            for ($i = 1; $i <= $chars->count() - $index; $i++) {


                // Временно берем символы после символа их цикла
                $tempChars = $chars->slice($index, $i);

                // Преобразуем временные символы в строку
                $tempString = $tempChars->map(function ($char) {
                        return $char['char'];
                    })->implode('');

                // Если строка - палиндром, то добавляем в массив полиндромов
                // вместе с координатами начала и конца полиндрома
                if (self::wordIsPalindrome($tempString)) {
                    $palindromes->push([
                        'string' => $tempString,
                        'realStart' => $char['realIndex'],
                        'realEnd' => $tempChars->last()['realIndex']
                    ]);
                }

            }

        });


        // Выводим массив палиндромов
        return $palindromes->map(function ($palindrome) {
            return new self([
                'string' => $palindrome['string'],
                'start' => $palindrome['realStart'],
                'end' => $palindrome['realEnd']
            ]);
        });
    }
}
