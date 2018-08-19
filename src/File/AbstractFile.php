<?php
declare(strict_types=1);

namespace Dixmod\File;

use Symfony\Component\Filesystem\{
    Exception\FileNotFoundException,
    Filesystem
};

abstract class AbstractFile implements FileInterface
{
    /** @var  string */
    private $fileName;

    /** @var  string */
    private $dir;

    /**
     * AbstractFile constructor.
     * @param string $fileName
     * @throws \Exception
     */
    public function __construct(string $fileName)
    {
        if (!is_file($fileName)) {
            throw new \Exception('Not found file');
        }

        $this->setFileName(basename($fileName));
        $this->setDir(realpath(dirname($fileName)));
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param $fileName
     * @return string
     */
    public function getExtension(string $fileName = null): string
    {
        return strtolower(substr($fileName ?? $this->fileName, -4));
    }

    /**
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     */
    public function setDir(string $dir)
    {
        $this->dir = $dir;
    }
}