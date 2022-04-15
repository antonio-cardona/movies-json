<?php

class Json
{
    /**
     * @param string $filePrefix
     * @return array
     * @throws JsonException
     */
    public function read(string $filePrefix): array
    {
        $filename = 'data/' . $filePrefix . '.json';
        $fileContent = file_get_contents($filename);
        return json_decode($fileContent, true, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $filePrefix
     * @param array $data
     * @return false|int
     * @throws JsonException
     */
    public function write(string $filePrefix, array $data)
    {
        $jsonData = json_encode($data, JSON_THROW_ON_ERROR);
        return file_put_contents('data/' . $filePrefix . '.json', $jsonData);
    }

    /**
     * @param $column
     * @param $value
     * @return array
     */
    public function search($column, $value): array
    {
        $this->read()
    }
}