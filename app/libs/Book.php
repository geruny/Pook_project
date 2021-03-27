<?php

namespace Libs;

class Book
{
    public $bookTitle;
    private $bookDate;
    private $bookDescription;
    private $bookPic;
    private $bookGenre;
    private $bookWriterName;
    private $writerMiddleName;

    static function getBookInfo($book)
    {
        $bookTitle = $book['title'];
    }

    static function getWriterInfo($data)
    {
    }

    static function getBookTitle()
    {
        if (isset($bookTitle))
            return $bookTitle;
        else
            return false;
    }

    static function getBookDate()
    {
    }

    static function getBookDescription()
    {
    }

    static function getBookPic()
    {
    }

    static function getBookGenre()
    {
    }

    static function getBookWriterName()
    {
    }

    static function getBookWriterMiddleName()
    {
    }
}
