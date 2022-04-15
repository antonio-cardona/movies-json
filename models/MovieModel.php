<?php

class MovieModel
{
    private string $id;

    private string $title;

    private string $year;

    private string $type;

    private string $poster;

    public function __construct(
        $title,
        $year,
        $type,
        $poster,
        $id = ''
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->year = $year;
        $this->type = $type;
        $this->poster = $poster;
    }
}