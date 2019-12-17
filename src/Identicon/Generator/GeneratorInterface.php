<?php

namespace Identicon\Generator;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
interface GeneratorInterface
{
    /**
     * @param string       $string
     * @param int          $size
     * @param array|string $color
     * @param array|string $backgroundColor
     * @param int          $margin
     *
     * @return mixed
     */
    public function getImageBinaryData($string, $size = null, $color = null, $backgroundColor = null, $margin = null);

    /**
     * @param string       $string
     * @param int          $size
     * @param array|string $color
     * @param array|string $backgroundColor
     * @param int          $margin
     *
     * @return string
     */
    public function getImageResource($string, $size = null, $color = null, $backgroundColor = null, $margin = null);

    /**
     * Return the mime-type of this identicon.
     *
     * @return string
     */
    public function getMimeType();

	/**
	 * Return the color of the created identicon.
	 *
	 * @return array
	 */
	public function getColor();
}
