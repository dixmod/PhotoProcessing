<?php

namespace Dixmod\File;

use Dixmod\{
    Filters,
    Filters\FilterInterface
};

class Photo extends AbstractFile
{
    /** @var resource */
    protected $image;

    /**
     * Photo constructor.
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        parent::__construct($fileName);
        $this->setImage($fileName);
    }

     public function setFilter(string $filterName)
    {
        $filter = $this->getFilter($filterName);
        $this->image = $filter->processing($this->getImage());
    }

    /**
     * The strategic method of selecting a filter for photos
     * @param $filterName
     * @return FilterInterface
     * @throws \Exception
     */
    private function getFilter(string $filterName): FilterInterface
    {
        switch ($filterName) {
            case 'sepia':
                return new Filters\Sepia();
            case 'negate':
                return new Filters\Negate();
            case 'grayscale':
                return new Filters\Grayscale();
            case 'emboss':
                return new Filters\Emboss();
            case 'mean_removal':
                return new Filters\MeanRemoval();
            case 'gaussian_blur':
                return new Filters\GaussianBlur();
            default:
                throw new \Exception('Filter not found');
        }
    }
    
    /**
     * @param $photographName
     * @return resource
     */
    public function setImage($photographName)
    {
        switch ($this->getExtension()) {
            case '.jpg':
                $this->image = imageCreateFromJpeg($photographName);
                break;
            case '.png':
                $this->image = imageCreateFrompng($photographName);
                break;
            case '.gif':
                $this->image = imageCreateFromGif($photographName);
                break;
            default:
                $this->image = imageCreateFromJpeg($photographName);
                break;
        }
    }

    /**
     * @param string $filePath
     */
    public function save(string $filePath)
    {
        switch ($this->getExtension()) {
            case '.jpg':
                imagejpeg($this->image, $filePath);
                break;
            case '.png':
                imagepng($this->image, $filePath);
                break;
            case '.gif':
                imageGif($this->image, $filePath);
                break;
            default:
                imagejpeg($this->image, $filePath);
                break;
        }
    }

    /**
     *
     */
    public function outputToBrowser(): void
    {
        switch ($this->getExtension()) {
            // send to browser with proper header
            case '.jpg':
                header('Content-Type: image/jpeg');
                imagejpeg($this->image);
                break;
            case '.png':
                header('Content-Type: image/png');
                imagepng($this->image);
                break;
            case '.gif':
                header('Content-Type: image/gif');
                imageGif($this->image);
                break;
            default:
                header('Content-Type: image/jpeg');
                imagejpeg($this->image);
                break;
        }
    }

    public function __destruct()
    {
        imagedestroy($this->image);
    }

    /**
     * @return resource
     */
    public function getImage()
    {
        return $this->image;
    }   
}
