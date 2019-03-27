<?php

namespace Tests\Feature;

use Tests\TestCase;

class PalindromeTest extends TestCase
{
    /**
     * Проверяем что есть параметр "q"
     *
     * @test
     */
    public function check_valid_has_q()
    {
        $this->postJson(route('palindrome.search'))
            ->assertJsonMissingValidationErrors(['q']);
    }


    /**
     * Проверяем что параметр "q" - строка
     *
     * @test
     */
    public function check_valid_q_is_string()
    {
        $this->postJson(route('palindrome.search'), [
            'q' => []
        ])
            ->assertJsonValidationErrors(['q']);
    }


    /**
     * Проверяем что параметр длина строки "q" - больше 1
     *
     * @test
     */
    public function check_valid_q_is_more_than_one()
    {
        $this->postJson(route('palindrome.search'), [
            'q' => 'a'
        ])
            ->assertJsonValidationErrors(['q']);
    }


    /**
     * Проверяем что параметр длина строки "q" - больше 1
     *
     * @test
     */
    public function check_valid_q_is_less_than_300()
    {
        $this->postJson(route('palindrome.search'), [
            'q' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'
        ])
            ->assertJsonValidationErrors(['q']);
    }


    /**
     * Проверяем что функция не находит палиндром если его нет
     *
     * @test
     */
    public function check_valid_not_found_palindrome()
    {
        $this->postJson(route('palindrome.search'), [
            'q' => 'Это не палиндром'
        ])
            ->assertJsonCount(0, 'data');
    }


    /**
     * Проверяем что функция находит палиндром если он есть
     *
     * @test
     */
    public function check_valid_found_palindrome()
    {
        $this->postJson(route('palindrome.search'), [
            'q' => 'ара'
        ])
            ->assertJsonCount(1, 'data');
    }
}
