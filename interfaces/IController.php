<?php

namespace app\interfaces;

interface IController
{
    /**
     * Отдаёт нужное имя папки с шаблонами для контроллера
     * @return string
     */
    public function getTplFolderName(): string;

    /**
     * Делает правильный путь до шаблона
     * @param string $template имя шаблона
     * @return string
     */
    public function getCorrectTplPath(string $template): string;

}