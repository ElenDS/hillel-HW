<?php
declare(strict_types=1);
class Color {
    public int $red;
    public int $green;
    public int $blue;
    public function __construct(int $red, int $green, int $blue)
    {
        $this->red = $this->setColor($red);
        $this->green = $this->setColor($green);
        $this->blue = $this->setColor($blue);
    }
    private function setColor(int $colorValue): int
    {
        if (filter_var($colorValue, FILTER_VALIDATE_INT, ['options'=>["min_range"=>0, "max_range"=>255]]) === false) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid color value', $colorValue));
        }
        return $colorValue;
    }
    public function mixColor(Color $objColor): self
    {
        $this->red = intval(round(($this->red + $objColor->red)/2));
        $this->green = intval(round(($this->green + $objColor->green)/2));
        $this->blue = intval(round(($this->blue + $objColor->blue)/2));

        return $this;
    }
    public function getColor(): string
    {
        return $this->red . ' ' . $this->green . ' ' . $this->blue;
    }
}

$color1 = new Color(90, 180, 70);
$color2 = new Color(100, 10, 20);
$color2->mixColor($color1);

?>

<body style="background-color: rgb(<?= $color2->getColor() ?>);"></body>
