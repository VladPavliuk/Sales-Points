<?php

/**
 * Trait AnalyzerModelsConnect
 *
 * Require array of models file name
 * Include all models from array
 * Connect to database
 *
 */
trait AnalyzerModelsConnect
{
    // Path to folder with models
    private $modelsFolderPath = MODELS_PATH;

    // Path to Data Base file
    private $dataBaseFile = DB_CONNECT_PATH;

    //> List of error messages
    private $modelFileError = "Файлу із моделлю не знайдено";
    private $DataBaseFileError = "Файлу із доступом до бази даних не знайдено";
    //<

    public function defineModels($modelsArray)
    {
        if (isset($modelsArray)) {
            $modelsArray = explode(',', $modelsArray);

            foreach ($modelsArray as $model) {
                $model = ucfirst($model) . ".php";
                $modelFile = $this->modelsFolderPath . $model;
                $this->includeModelFile($modelFile);
            }

            $this->includeDataBaseFile($this->dataBaseFile);
        }
    }

    /**
     * Check and include single file with model class
     *
     * @param $modelFile
     */
    private function includeModelFile($modelFile)
    {
        if (file_exists($modelFile)) {
            require_once($modelFile);
        } else {
            // Some went wrong!
            self::showErrorPage($this->modelFileError);
        }
    }

    /**
     * Include file where you can define connection to data base
     *
     * @param $dataBaseFile
     */
    private function includeDataBaseFile($dataBaseFile)
    {
        if (file_exists($dataBaseFile)) {
            require_once($dataBaseFile);
        } else {
            // Some went wrong!
            self::showErrorPage($this->DataBaseFileError);
        }
    }
}