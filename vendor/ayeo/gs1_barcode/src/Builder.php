<?php
namespace Ayeo\Barcode;

use Ayeo\Barcode\Model\Rgb;
use Ayeo\Barcode\Response\Png;
use Ayeo\Barcode\SaveFile\SaveToFile;

class Builder
{
    private $width = 500;

    private $height = 150;

    private $fontPath = 'FreeSans.ttf';

    private $fontSize = 10;

    private $filename = 'barcode.png';

    private $imageFormat = 'png';

    private $supportedBarcodeTypes = [
        'gs1-128' => '\\Ayeo\\Barcode\\Barcode\\Gs1_128'
    ];

    private $imagesFormats = [
        'png' => '\\Ayeo\\Barcode\\Response\\Png',
        'jpeg' => '\\Ayeo\\Barcode\\Response\\Jpeg',
    ];

    /**
     * @var Rgb
     */
    private $paintColor;

    /**
     * @var Rgb
     */
    private $backgroundColor;

    /**
     * @var integer
     */
    private $scale;

    public function __construct()
    {
        $this->paintColor = new Rgb(0, 0, 0);
        $this->backgroundColor = new Rgb(255, 255, 255);
    }

    public static function build()
    {
        return new self;
    }

    protected function getPrinter ()
    {
        $printer = new Printer($this->width, $this->height, $this->fontPath);
        $printer->setBackgroundColor($this->backgroundColor);
        $printer->setPrintColor($this->paintColor);
        $printer->setFontSize($this->fontSize);

        if (is_null($this->scale) === false) {
            $printer->imposeScale($this->scale);
        }

        return $printer;
    }

    public function output($text)
    {
        $printer = $this->getPrinter();
        $response = new Png($printer);
        
        return $response->output($text, $this->filename);
    }

    public function getBase64($text)
    {
        return $this->getPrinter()->getBase64($text);
    }

    public function saveImage($text)
    {
        $printer = $this->getPrinter();
        $saveFile = new SaveToFile($printer);

        return $saveFile->output($text, $this->filename);
    }

    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    public function setBarcodeType($type)
    {
        if (array_key_exists($type, $this->supportedBarcodeTypes)) {
            $this->type = $type;

            return $this;
        }

        throw new \LogicException('Unsupported barcode format');
    }

    public function setBackgroundColor($r, $g, $b)
    {
        $this->backgroundColor = new Rgb($r, $g, $b);

        return $this;
    }

    public function setPaintColor($r, $g, $b)
    {
        $this->paintColor = new Rgb($r, $g, $b);

        return $this;
    }

    public function setFontPath($path)
    {
        //todo: file exists;
        $this->fontPath = $path;
    }

    public function setFontSize($size)
    {
        //todo: must be integer
        $this->fontSize = $size;
    }

    public function setImageFormat($format)
    {
        if (array_key_exists($format, $this->imagesFormats))
        {
            $this->imageFormat = $format;

            return $this;
        }

        throw new \LogicException('Unsupported image format');
    }

    public function setFilename($filename)
    {
        //check extension
        $this->filename = $filename;
    }

    public function imposeScale($scale)
    {
        //todo: must be between 1-5, integer
        $this->scale = $scale;
    }

}
