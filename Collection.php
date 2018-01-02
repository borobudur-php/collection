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

use Closure;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Collection implements CollectionInterface
{
    /**
     * @var ArrayCollection
     */
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = new ArrayCollection($data);
    }

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

        foreach (array_chunk($this->data->getValues(), $size, true) as $chunk) {
            $chunks[] = new static($chunk);
        }

        return new static($chunks);
    }

    /**
     * {@inheritdoc}
     */
    public function add($element): void
    {
        $this->data->add($element);
    }

    /**
     * {@inheritdoc}
     */
    public function clear(): void
    {
        $this->data->clear();
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty(): bool
    {
        return $this->data->isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function remove(int $index): void
    {
        $this->data->remove($index);
    }

    /**
     * {@inheritdoc}
     */
    public function removeElement($element): void
    {
        $this->data->removeElement($element);
    }

    /**
     * {@inheritdoc}
     */
    public function contains($element): bool
    {
        return $this->data->contains($element);
    }

    /**
     * {@inheritdoc}
     */
    public function get(int $index)
    {
        return $this->data->get($index);
    }

    /**
     * {@inheritdoc}
     */
    public function set(int $key, $value): void
    {
        $this->data->set($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function first()
    {
        return $this->data->first();
    }

    /**
     * {@inheritdoc}
     */
    public function last()
    {
        return $this->data->first();
    }

    /**
     * {@inheritdoc}
     */
    public function filter(Closure $predicate): CollectionInterface
    {
        return new static($this->data->filter($predicate)->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function map(Closure $mapper): CollectionInterface
    {
        return new static($this->data->map($mapper)->toArray());
    }

    /**
     * {@inheritdoc}
     */
    public function indexOf($element): int
    {
        return $this->data->indexOf($element);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return $this->data->count();
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return $this->data->getIterator();
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return $this->data->offsetExists($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->data->offsetGet($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $this->data->offsetSet($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $this->data->offsetUnset($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function matching(Criteria $criteria): CollectionInterface
    {
        return new static($this->data->matching($criteria)->toArray());
    }
}
