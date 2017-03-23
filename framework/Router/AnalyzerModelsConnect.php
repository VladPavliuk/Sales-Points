<?php

/**
 * Trait AnalyzerModelsConnect
 *
 * Require array of models file name
 * Include all models from models folder
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
    private $coreModelFileError = "Файлу із головною моделлю не знайдено";
    private $modelFileError = "Файлу із моделлю не знайдено";
    private $DataBaseFileError = "Файлу із доступом до бази даних не знайдено";
    //<

    public function defineModels()
    {
        // Include parent model.
        $this->includeCoreModelFile();

        // Include all models.
        $this->includeModelsFile($this->modelsFolderPath);

        // Include class which connects to data base.
        $this->includeDataBaseFile($this->dataBaseFile);
    }

    /**
     * Include file with parent model class
     * which will extends to every controller class
     *
     */
    private function includeCoreModelFile()
    {
        // Define full path
        $coreModelFile = $this->modelsFolderPath . 'Model.php';

        if (file_exists($coreModelFile)) {

            include($coreModelFile);
        } else {
            // Some went wrong!
            Router::showErrorPage($this->coreModelFileError);
        }
    }

    /**
     * Include all files from models folder.
     *
     * @param $modelsFolderPath
     */
    private function includeModelsFile($modelsFolderPath)
    {
        foreach (glob("{$modelsFolderPath}*.php") as $modelFileName) {
            if ($modelFileName == "{$modelsFolderPath}Model.php") {
                continue;
            }

            include($modelFileName);
        }
    }

    /**
     * Include file where defines connection to data base.
     *
     * @param $dataBaseFile
     */
    private function includeDataBaseFile($dataBaseFile)
    {
        if (file_exists($dataBaseFile)) {
            require_once($dataBaseFile);
        } else {
            // Some went wrong!
            Router::showErrorPage($this->DataBaseFileError);
        }
    }
}