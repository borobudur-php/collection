<?php
/**
 * This file is part of the Borobudur package.
 *
 * (c) 2017 Borobudur <http://borobudur.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Borobudur\Component\Collection;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Collection extends ArrayCollection implements CollectionInterface
{
    /**
     * {@inheritdoc}
     *
     * @return CollectionInterface|static
     */
    public function chunk(int $size): CollectionInterface
    {
        if ($size <= 0) {
            return new static();
        }

        $chunks = [];

        foreach (array_chunk($this->getValues(), $size, true) as $chunk) {
            $chunks[] = new static($chunk);
        }

        return new static($chunks);
    }
}
