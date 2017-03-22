<?php

class Language extends Model
{
    public function getLanguagesList()
    {
        $sqlResponse = $this->dataBase->query("SELECT * FROM `languages`");

        $languagesList = [];
        while($row = $sqlResponse->fetch()) {
            $languagesList[] = $row;
        }

        return $languagesList;
    }
}