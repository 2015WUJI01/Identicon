<?php

namespace Identicon\Tests;

use Identicon\Generator\ImageMagickGenerator;
use Identicon\Generator\SvgGenerator;
use Identicon\Identicon;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
class IdenticonTest extends \PHPUnit_Framework_TestCase
{
    protected $faker;
    protected $identicon;

    protected function setUp()
    {
        $this->faker = \Faker\Factory::create();
        $this->identicon = new Identicon();
    }

    /**
     * @dataProvider gdResultDataProvider
     */
    public function testGdResult($string, $imageData)
    {
        $this->assertEquals($imageData, $this->identicon->getImageDataUri($string));
    }

    public function gdResultDataProvider()
    {
        return [
            ['Benjamin', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAlUlEQVRoge3YwQmAQAwFUVcszNK2NEuzhY8EHD7zzmFhyCXs2vc+AvvJxv547UyG4GxgsIHBBgYbGGxgaGhY4Vx4fs0KT8OGPdjAYAODDQw2MNjA0NCwZo+52Q+8UMMebGCwgcEGBhsYbGBoaBi++X7RsAcbGGxgsIHBBgYbGBoartnn/Of7yAYGGxhsYLCBwQaGhoYXxcATQQHji8YAAAAASUVORK5CYII='],
            ['8.8.8.8', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAlElEQVRoge3ZwQ2AIBAFUTEUZgmWYimUYgmWZgv/QGTczDtvCBMuBNqWuceRjJ3X8/1qezIEZwODDQw2MNjAYANDhYYeXr+WCPdW4RxsYLCBwQYGGxhsYLCBwQYGGxhsYLCBwQYGGxh6OLfk09Z3vl+xgcEGBhsYbGCwgaHNXW7unS9U4RxsYLCBwQYGGxhsYKjQ8ALz9xKFMt4jEAAAAABJRU5ErkJggg=='],
            ['8.8.4.4', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAjElEQVRoge3YQQ2AMBAFUUoQgASkIa3SkIAELOxhgcnPvHPT7KSXTcd5X0vB3I/KsV7F2daXx/iCDQw2MNjAYAODDQwJDZIkSco3ev/5frktYfe2gcEGBhsYbGCwgSGhYRTPkVfDhHewgcEGBhsYbGCwgSGhYeu9rrjM9Up4BxsYbGCwgcEGBhsYEhoeQmYV+Lw+DlQAAAAASUVORK5CYII='],
            ['yzalis', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAApElEQVRoge3YwQ2DMBAFUUwllEJJKYWSUkpKoYV/WMLoa97ZAo/2svLaMr/vFZ4cdJyf5Nj+9D3+wAYGGxhsYLCBwQaGhoY1+7lwNQyXuVDDHGxgsIHBBgYbGGxgaGhYsw944TI3+9OGOdjAYAODDQw2MNjA0NCQ7nyzL3Oh8G4Nc7CBwQYGGxhsYLCBoaFh+J3vFQ1zsIHBBgYbGGxgsIGhoeEGheQTDhfmg8cAAAAASUVORK5CYII='],
            ['benjaminAtYzalisDotCom', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBCAIAAAABlV4SAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAAlUlEQVRoge3ZwQmAMBAFUWNFlmIJlmYJKcWSbOEfgoyfeeclMOxlIWPLXPNIxu7z+f61PRmCs4HBBgYbGGxgsIGhoWGQj7nwtYY92MBgA4MNDDYw2MDQ0JDefKG1x1yoYQ82MNjAYAODDQw2MDQ0jHBu7ZUW8m/3V2xgsIHBBgYbGGxg8G+XwQYGGxhsYLCBwQaGhoYXS88cPpLHUdMAAAAASUVORK5CYII='],
        ];
    }

    /**
     * @dataProvider imageMagickResultDataProvider
     */
    public function testImageMagickResult($string, $imageData)
    {
        $this->identicon->setGenerator(new ImageMagickGenerator());
        // $this->assertEquals($imageData, $this->identicon->getImageDataUri($string));
    }

    public function imageMagickResultDataProvider()
    {
        return [
            ['Benjamin', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBAgMAAADzmSHWAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACVBMVEUAAACAQID///8oxzV4AAAAAXRSTlMAQObYZgAAAAFiS0dEAmYLfGQAAAA8SURBVDjLYwgNDXVgYGANDQ1hYGAAc4axCAoASjMwiMK5DFAwDEQwfQqhAxgYGIejCKZPR47IYIsLikUAXrQYrSbv5GcAAAAASUVORK5CYII='],
            ['8.8.8.8', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBAgMAAADzmSHWAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACVBMVEUAAACwkED////TBaOKAAAAAXRSTlMAQObYZgAAAAFiS0dEAmYLfGQAAAA9SURBVDjLY2BgYBANDQ1gYGAMDQ1lgIJhKRIKBlARIHAYFRkmIggAFnFgYGANDQ2BRPnwFYEAqAgSGOIiAB3H0FdakQbSAAAAAElFTkSuQmCC'],
            ['8.8.4.4', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBAgMAAADzmSHWAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACVBMVEUAAABg8OD///8VYtHtAAAAAXRSTlMAQObYZgAAAAFiS0dEAmYLfGQAAAA3SURBVDjLYwgNDXVggAEwZ+SIDFcA8RxraGgIqt+HpQgKAMepaGhoAAMDI5ALC5BhIwIFw1kEAMDHlqDrjun5AAAAAElFTkSuQmCC'],
            ['yzalis', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBAgMAAADzmSHWAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACVBMVEUAAADgwJD////BzN0vAAAAAXRSTlMAQObYZgAAAAFiS0dEAmYLfGQAAAA4SURBVDjLY2BgYBANhQEGKBg5IkDAGhoawoAChrpIKBpwgIoEMDAwjgARBwakgBhGIljjdNiJAAAFB94SnyJ2kgAAAABJRU5ErkJggg=='],
            ['benjaminAtYzalisDotCom', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEEAAABBAgMAAADzmSHWAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAACVBMVEUAAACQoHD///+Fo+abAAAAAXRSTlMAQObYZgAAAAFiS0dEAmYLfGQAAAApSURBVDjLYwhFAw4MI00kgIGBcVRkKIsgxykQiMK5DFAwDEQwfTpMRQAjXjJt/R2NWQAAAABJRU5ErkJggg=='],
        ];
    }

    /**
     * @dataProvider svgResultDataProvider
     */
    public function testSvgResult($string, $imageData)
    {
        $this->identicon->setGenerator(new SvgGenerator());
        $this->assertEquals($imageData, $this->identicon->getImageData($string));
    }

    public function svgResultDataProvider()
    {
        return [
            ['Benjamin', '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="65" height="65" viewBox="0 0 65 65"><rect width="65" height="65" fill="#FFF" stroke-width="0"/><path fill="#804080" stroke-width="0" d="M0,0h13v13h-13v-13M26,0h13v13h-13v-13M52,0h13v13h-13v-13M13,13h13v13h-13v-13M26,13h13v13h-13v-13M39,13h13v13h-13v-13M0,26h13v13h-13v-13M13,26h13v13h-13v-13M39,26h13v13h-13v-13M52,26h13v13h-13v-13M0,39h13v13h-13v-13M13,39h13v13h-13v-13M26,39h13v13h-13v-13M39,39h13v13h-13v-13M52,39h13v13h-13v-13M0,52h13v13h-13v-13M13,52h13v13h-13v-13M39,52h13v13h-13v-13M52,52h13v13h-13v-13"/></svg>'],
            ['8.8.8.8', '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="65" height="65" viewBox="0 0 65 65"><rect width="65" height="65" fill="#FFF" stroke-width="0"/><path fill="#B09040" stroke-width="0" d="M13,0h13v13h-13v-13M39,0h13v13h-13v-13M0,13h13v13h-13v-13M13,13h13v13h-13v-13M39,13h13v13h-13v-13M52,13h13v13h-13v-13M0,26h13v13h-13v-13M13,26h13v13h-13v-13M39,26h13v13h-13v-13M52,26h13v13h-13v-13M0,39h13v13h-13v-13M26,39h13v13h-13v-13M52,39h13v13h-13v-13M26,52h13v13h-13v-13"/></svg>'],
            ['8.8.4.4', '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="65" height="65" viewBox="0 0 65 65"><rect width="65" height="65" fill="#FFF" stroke-width="0"/><path fill="#60F0E0" stroke-width="0" d="M0,0h13v13h-13v-13M52,0h13v13h-13v-13M0,26h13v13h-13v-13M26,26h13v13h-13v-13M52,26h13v13h-13v-13M13,39h13v13h-13v-13M39,39h13v13h-13v-13M13,52h13v13h-13v-13M26,52h13v13h-13v-13M39,52h13v13h-13v-13"/></svg>'],
            ['yzalis', '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="65" height="65" viewBox="0 0 65 65"><rect width="65" height="65" fill="#FFF" stroke-width="0"/><path fill="#E0C090" stroke-width="0" d="M13,0h13v13h-13v-13M26,0h13v13h-13v-13M39,0h13v13h-13v-13M26,13h13v13h-13v-13M0,26h13v13h-13v-13M13,26h13v13h-13v-13M39,26h13v13h-13v-13M52,26h13v13h-13v-13M0,39h13v13h-13v-13M52,39h13v13h-13v-13M0,52h13v13h-13v-13M13,52h13v13h-13v-13M26,52h13v13h-13v-13M39,52h13v13h-13v-13M52,52h13v13h-13v-13"/></svg>'],
            ['benjaminAtYzalisDotCom', '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="65" height="65" viewBox="0 0 65 65"><rect width="65" height="65" fill="#FFF" stroke-width="0"/><path fill="#60B030" stroke-width="0" d="M13,0h13v13h-13v-13M39,0h13v13h-13v-13M0,13h13v13h-13v-13M26,13h13v13h-13v-13M52,13h13v13h-13v-13M0,26h13v13h-13v-13M13,26h13v13h-13v-13M39,26h13v13h-13v-13M52,26h13v13h-13v-13M13,39h13v13h-13v-13M26,39h13v13h-13v-13M39,39h13v13h-13v-13M0,52h13v13h-13v-13M26,52h13v13h-13v-13M52,52h13v13h-13v-13"/></svg>'],
        ];
    }
}
